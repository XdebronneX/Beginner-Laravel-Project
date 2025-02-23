@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="max-w-4xl bg-white shadow-lg rounded-lg p-8">
        @foreach($pet as $pets)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
            <!-- Pet Image -->
            <div class="flex justify-center">
                <img src="{{ asset('images/'.$pets->img_path) }}" width="360" height="360" 
                    class="rounded-full shadow-md border-4 border-gray-200 object-cover">
            </div>

            <!-- Pet Details -->
            <div class="space-y-4">
                <h2 class="text-2xl font-semibold text-gray-800">Pet Details</h2>
                <div class="grid grid-cols-2 gap-4">
                    <p class="text-lg"><span class="font-semibold text-gray-600">Owner Name:</span> {{ $pets->fname }}</p><br>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Pet ID:</span> {{ $pets->pet_id }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Pet Name:</span> {{ $pets->pname }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Breed:</span> {{ $pets->pbreed }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Gender:</span> {{ $pets->gender }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Age:</span> {{ $pets->age }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
