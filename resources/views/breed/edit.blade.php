@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
  <div class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Breed</h2>

    {{ Form::model($breed, ['route' => ['breed.update', $breed->petb_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}

    <div class="mb-4">
        <label for="pbreed" class="block text-gray-700 font-medium">Breed Name</label>
        {{ Form::text('pbreed', null, ['class' => 'w-full p-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200', 'id' => 'pbreed']) }}
        @if($errors->has('pbreed'))
            <small class="text-red-500">{{ $errors->first('pbreed') }}</small>
        @endif
    </div>

    <div class="flex justify-between">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
            Update
        </button>
        <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
            Cancel
        </a>
    </div>

    {!! Form::close() !!}
  </div>
</div>

@endsection
