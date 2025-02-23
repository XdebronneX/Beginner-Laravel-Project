@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create New Consultation</h2>

        <ul class="text-red-500 mb-4">
            @foreach($errors->all() as $message)
                <li><p>{{ $message }}</p></li>
            @endforeach
        </ul>

        <form method="post" action="{{ route('consult.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="pet_id" class="block text-gray-700 font-medium">Pet Name</label>
                {!! Form::select('pet_id', $pets, null, [
                    'placeholder' => '******Please Choose!******',
                    'class' => 'mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200'
                ]) !!}
                @if($errors->has('pet_id'))
                    <small class="text-red-500">{{ $errors->first('pet_id') }}</small>
                @endif
            </div>

            <div>
                <label for="disease_id" class="block text-gray-700 font-medium">Disease or Injuries</label>
                {!! Form::select('disease_id', $diseases, null, [
                    'placeholder' => '******Please Choose!******',
                    'class' => 'mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200'
                ]) !!}
                @if($errors->has('disease_id'))
                    <small class="text-red-500">{{ $errors->first('disease_id') }}</small>
                @endif
            </div>

            <div>
                <label for="observation" class="block text-gray-700 font-medium">Observation</label>
                <input type="text" id="observation" name="observation" value="{{ old('observation') }}" 
                       class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" 
                       placeholder="Observation">
                @if($errors->has('observation'))
                    <small class="text-red-500">{{ $errors->first('observation') }}</small>
                @endif
            </div>

            <div>
                <label for="consult_cost" class="block text-gray-700 font-medium">Consult Cost</label>
                <input type="number" id="consult_cost" name="consult_cost" value="{{ old('consult_cost') }}" 
                       class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200" 
                       placeholder="Cost">
                @if($errors->has('consult_cost'))
                    <small class="text-red-500">{{ $errors->first('consult_cost') }}</small>
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
