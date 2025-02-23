@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create New Breed</h2>

        <ul class="text-red-500 mb-4">
            @foreach($errors->all() as $message)
                <li><p>{{ $message }}</p></li>
            @endforeach
        </ul>

        <form method="post" action="{{ route('breed.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="pbreed" class="block text-gray-700 font-medium">Breed Name</label>
                <input type="text" id="pbreed" name="pbreed" value="{{ old('pbreed') }}" 
                       class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" 
                       placeholder="Enter Breed Name">
                @if($errors->has('pbreed'))
                    <small class="text-red-500">{{ $errors->first('pbreed') }}</small>
                @endif
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                    Save
                </button>
                <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
