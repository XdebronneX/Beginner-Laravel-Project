@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-lg p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Consultation</h2>

        {!! Form::model($consultations, ['route' => ['consult.update', $consultations->consult_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'space-y-4']) !!}

        <!-- Pet Selection -->
        <div>
            <label for="pets" class="block text-gray-700 font-medium">Pet Name</label>
            {!! Form::select('pet_id', $pets, $consultations->pet_id, ['class' => 'mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200']) !!}
            @if($errors->has('pet_id'))
                <small class="text-red-500">{{ $errors->first('pet_id') }}</small>
            @endif
        </div>

        <!-- Disease Selection -->
        <div>
            <label for="diseases" class="block text-gray-700 font-medium">Common Disease/Injuries</label>
            {!! Form::select('disease_id', $diseases, $consultations->disease_id, ['class' => 'mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200']) !!}
            @if($errors->has('disease_id'))
                <small class="text-red-500">{{ $errors->first('disease_id') }}</small>
            @endif
        </div>

        <!-- Observation -->
        <div>
            <label for="observation" class="block text-gray-700 font-medium">Observation</label>
            {!! Form::text('observation', $consultations->observation, ['class' => 'mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200', 'placeholder' => 'Enter observations...']) !!}
            @if($errors->has('observation'))
                <small class="text-red-500">{{ $errors->first('observation') }}</small>
            @endif
        </div>

        <!-- Consultation Cost -->
        <div>
            <label for="consult_cost" class="block text-gray-700 font-medium">Consultation Cost</label>
            {!! Form::text('consult_cost', $consultations->consult_cost, ['class' => 'mt-1 p-2 w-full border border-gray-300 rounded-lg focus:ring focus:ring-blue-200', 'placeholder' => 'Enter cost...']) !!}
            @if($errors->has('consult_cost'))
                <small class="text-red-500">{{ $errors->first('consult_cost') }}</small>
            @endif
        </div>

        <!-- Buttons -->
        <div class="flex justify-between mt-4">
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
