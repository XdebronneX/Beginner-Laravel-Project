@extends('layouts.master')

@section('content')

<div class="container mx-auto p-6">
    <!-- Header and Add Consultation Button -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Consultation List</h2>
        <a href="{{ route('consult.create') }}" 
          class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition flex items-center">
            <i class="fas fa-user-plus mr-2"></i> Add Consultation
        </a>
    </div>

    <!-- Search Form -->
    <div class="mt-6 flex justify-center">
        <form class="flex items-center w-full max-w-lg bg-white p-4 rounded-lg shadow-md" method="GET" action="{{ url('/consultation') }}">
            <input type="search" name="query" placeholder="Search pet name here..." 
                class="w-full px-4 py-2 border rounded-l-lg focus:ring focus:ring-blue-300">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg font-bold transition">
                Search
            </button>
        </form>
    </div>

    @if($consultations->isEmpty())
        <div class="bg-white shadow-lg rounded-lg p-6 text-center mt-6">
            <h2 class="text-xl font-semibold text-gray-700">No data found</h2>
            <p class="text-gray-500">There are no consultations available. Click the "ADD CONSULTATION" button to register a new consultation.</p>
        </div>
    @else
        <!-- Consultations Table -->
        <div class="mt-8 overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                  <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="px-4 py-2 border">Consultation ID</th>
                        <th class="px-4 py-2 border">Veterinarian Name</th>
                        <th class="px-4 py-2 border">Pet Name</th>
                        <th class="px-4 py-2 border">Pet Gender</th>
                        <th class="px-4 py-2 border">Pet Age</th>
                        <th class="px-4 py-2 border">Disease/Injuries</th>
                        <th class="px-4 py-2 border">Observation</th>
                        <th class="px-4 py-2 border">Cost</th>
                        <th class="px-4 py-2 border">Show</th>
                        <th class="px-4 py-2 border">Edit</th>
                        <th class="px-4 py-2 border">Delete</th>
                        <th class="px-4 py-2 border">Restore</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-100 text-center">
                    @foreach($consultations as $consultation)
                    <tr class="border-b border-gray-300">
                        <td class="px-4 py-2">{{ $consultation->consult_id }}</td>
                        <td class="px-4 py-2">{{ $consultation->lname }}</td>
                        <td class="px-4 py-2">{{ $consultation->pname }}</td>
                        <td class="px-4 py-2">{{ $consultation->gender }}</td>
                        <td class="px-4 py-2">{{ $consultation->age }}</td>
                        <td class="px-4 py-2">{{ $consultation->disease_name }}</td>
                        <td class="px-4 py-2">{{ $consultation->observation }}</td>
                        <td class="px-4 py-2 text-gray-500 font-bold">₱ {{ $consultation->consult_cost }}</td>

                        <!-- Show Button -->
                        <td class="px-4 py-2">
                            @if($consultation->deleted_at)
                                <i class="fas fa-eye text-gray-400 text-lg"></i>
                            @else
                                <a href="{{ route('consult.show', $consultation->consult_id) }}" class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-eye text-lg"></i>
                                </a>
                            @endif
                        </td>

                        <!-- Edit Button -->
                        <td class="px-4 py-2">
                            @if($consultation->deleted_at)
                                <i class="fas fa-user-edit text-gray-400 text-lg"></i>
                            @else
                                <a href="{{ route('consult.edit', $consultation->consult_id) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-user-edit text-lg"></i>
                                </a>
                            @endif
                        </td>

                        <!-- Delete Button -->
                        <td class="px-4 py-2">
                            @if(!$consultation->deleted_at)
                                <form method="POST" action="{{ route('consult.destroy', $consultation->consult_id) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-user-times text-lg"></i>
                                    </button>
                                </form>
                            @else
                                <i class="fas fa-user-times text-gray-400 text-lg"></i>
                            @endif
                        </td>

                        <!-- Restore Button -->
                        <td class="px-4 py-2">
                            @if($consultation->deleted_at)
                                <a href="{{ route('consult.restore', $consultation->consult_id) }}" class="text-green-500 hover:text-green-700">
                                    <i class="fa fa-undo text-lg"></i>
                                </a>
                            @else
                                <i class="fa fa-undo text-gray-400 text-lg"></i>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $consultations->links('pagination::tailwind') }}
        </div>
    @endif
</div>

@endsection
