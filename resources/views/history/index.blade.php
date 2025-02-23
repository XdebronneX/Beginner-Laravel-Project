@extends('layouts.master')

@section('content')

<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Transaction List</h2>
            <!-- Enhanced Search Form -->
    <form method="GET" action="{{ url('/search') }}" class="flex flex-wrap justify-center gap-2 mb-6">
        <!-- Search Input -->
        <input type="search" name="search" value="{{ request('search') }}" placeholder="Enter service name..." required
            class="w-full md:w-80 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">

        <!-- Search Button -->
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition">
            Search
        </button>

        <!-- Reset Button (Clears Search & Reloads All Data) -->
        @if(request('search'))
        <a href="{{ url('/search') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg transition">
            Reset
        </a>
        @endif
    </form>
    </div>

    @if($transacts->isEmpty())
        <div class="bg-white shadow-lg rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-700">No transactions found</h2>
            <p class="text-gray-500">There are no transactions recorded yet. Click the "ADD TRANSACTION" button to create one.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="px-4 py-2 border">Grooming ID</th>
                        <th class="px-4 py-2 border">Last Name</th>
                        <th class="px-4 py-2 border">First Name</th>
                        <th class="px-4 py-2 border">Pet Name</th>
                        <th class="px-4 py-2 border">Service Name</th>
                        <th class="px-4 py-2 border">Status</th>
                        <th class="px-4 py-2 border">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-100 text-center">
                    @foreach($transacts as $transact)
                    <tr class="border-b border-gray-300 hover:bg-gray-200 transition">
                        <td class="px-4 py-2">{{ $transact->groominginfo_id }}</td>
                        <td class="px-4 py-2">{{ $transact->lname }}</td>
                        <td class="px-4 py-2">{{ $transact->fname }}</td>
                        <td class="px-4 py-2">{{ $transact->pname }}</td>
                        <td class="px-4 py-2">{{ $transact->service_name }}</td>
                        <td class="px-4 py-2">{{ $transact->status }}</td>
                        <td class="px-4 py-2">{{ $transact->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $transacts->links('pagination::tailwind') }}
        </div>
    @endif
</div>

@endsection
