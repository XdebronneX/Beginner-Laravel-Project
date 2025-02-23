@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create Disease</h2>

        @if ($errors->any())
            <ul class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded-lg">
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('disease.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="disease_name" class="block text-gray-700 font-medium">Disease</label>
                <input type="text" id="disease_name" name="disease_name"
                       value="{{ old('disease_name') }}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                       placeholder="Enter Disease Name">
                @if($errors->has('disease_name'))
                    <small class="text-red-500">{{ $errors->first('disease_name') }}</small>
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
