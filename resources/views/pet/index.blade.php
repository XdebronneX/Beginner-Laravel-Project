@extends('layouts.master')

@section('content')
{{-- 
<div class="min-h-screen bg-gray-100 flex flex-col items-center py-6 px-4">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-4"> --}}
                <div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Pet List</h2>
            <a href="{{ route('pet.create') }}" 
              class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition flex items-center">
                <i class="fas fa-plus mr-2"></i> Add Pet
            </a>
        </div>

        {{-- Check if there are any pets --}}
        @if ($pets->isEmpty())
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <h2 class="text-xl font-semibold text-gray-700">No data found</h2>
                <p class="text-gray-500">There are no pets added yet. Click the "ADD PET" button to register a new pet.</p>
            </div>
        @else
            {{-- Table --}}
        <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-green-500 text-white">
                        <tr>
                            <th class="px-4 py-2 border">Pet ID</th>
                            <th class="px-4 py-2 border">Customer Name</th>
                            <th class="px-4 py-2 border">Breed</th>
                            <th class="px-4 py-2 border">Pet Name</th>
                            <th class="px-4 py-2 border">Gender</th>
                            <th class="px-4 py-2 border">Age</th>
                            <th class="px-4 py-2 border">Image</th>
                            <th class="px-4 py-2 border">Show</th>
                            <th class="px-4 py-2 border">Edit</th>
                            <th class="px-4 py-2 border">Delete</th>
                            <th class="px-4 py-2 border">Restore</th>
                        </tr>
                    </thead>
                      <tbody class="bg-gray-100">
                        @foreach($pets as $pet)
                            <tr class="border-b border-gray-300 text-center">
                                <td class="px-4 py-2">{{ $pet->pet_id }}</td>
                                <td class="px-4 py-2">{{ $pet->fname }}</td>
                                <td class="px-4 py-2">{{ $pet->pbreed }}</td>
                                <td class="px-4 py-2">{{ $pet->pname }}</td>
                                <td class="px-4 py-2">{{ $pet->gender }}</td>
                                <td class="px-4 py-2">{{ $pet->age }}</td>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('images/'.$pet->img_path) }}" width="80" height="80" class="rounded-full border border-gray-300 shadow-md"/>
                                </td>
                                <td class="py-3 px-4 text-center">
                                    @if($pet->deleted_at)
                                        <i class="fas fa-eye text-gray-400 text-xl"></i>
                                    @else
                                        <a href="{{ route('pet.show', $pet->pet_id) }}">
                                            <i class="fas fa-eye text-blue-500 text-xl"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    @if($pet->deleted_at)
                                        <i class="fas fa-user-edit text-gray-400 text-xl"></i>
                                    @else
                                        <a href="{{ route('pet.edit', $pet->pet_id) }}">
                                           <i class="fas fa-user-edit text-yellow-500 text-lg hover:text-yellow-700"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    @if(!$pet->deleted_at)
                                        {!! Form::open(['route' => ['pet.destroy', $pet->pet_id], 'method' => 'DELETE', 'class' => 'inline']) !!}
                                        <button type="submit">
                                            <i class="fas fa-user-times text-red-500 text-xl"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    @else
                                        <i class="fas fa-user-times text-gray-400 text-xl"></i>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    @if($pet->deleted_at)
                                        <a href="{{ route('pet.restore', $pet->pet_id) }}">
                                            <i class="fa fa-undo text-red-500 text-xl"></i>
                                        </a>
                                    @else
                                        <i class="fa fa-undo text-gray-400 text-xl"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-6 flex justify-center">
            {{ $pets->links('pagination::tailwind') }}
        </div>
        @endif
    </div>
</div>

@endsection
