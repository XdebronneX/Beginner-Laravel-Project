@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
  <div class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create New Service</h2>

    <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="service_name" class="block text-gray-700 font-medium">Service Name</label>
            <input type="text" id="service_name" name="service_name" value="{{ old('service_name') }}"
                class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" placeholder="Service name">
            @error('service_name')
            <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="service_cost" class="block text-gray-700 font-medium">Service Cost</label>
            <input type="number" id="service_cost" name="service_cost" value="{{ old('service_cost') }}"
                class="w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" placeholder="Service cost">
            @error('service_cost')
            <small class="text-red-500">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium">Service Image</label>
            <input type="file" id="image" name="image" class="w-full p-2 border border-gray-300 rounded-lg">
            @error('image')
            <small class="text-red-500">{{ $message }}</small>
            @enderror
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
