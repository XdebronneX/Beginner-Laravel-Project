@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-lg p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Create New Pet</h2>

        <form method="post" action="{{ route('pet.store') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf

            {{-- Owner Name --}}
            <div>
                <label for="customer_id" class="block text-gray-700 font-medium mb-1">Owner Name</label>
                {!! Form::select('customer_id', $customers, null, [
                    'placeholder' => 'Select an owner...',
                    'class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400'
                ]) !!}
                @if ($errors->has('customer_id'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('customer_id') }}</p>
                @endif
            </div>

            {{-- Pet Breed --}}
            <div>
                <label for="petb_id" class="block text-gray-700 font-medium mb-1">Pet Breed</label>
                {!! Form::select('petb_id', $pet_breed, null, [
                    'placeholder' => 'Select a breed...',
                    'class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400'
                ]) !!}
                @if ($errors->has('petb_id'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('petb_id') }}</p>
                @endif
            </div>

            {{-- Pet Name --}}
            <div>
                <label for="pname" class="block text-gray-700 font-medium mb-1">Pet Name</label>
                <input type="text" id="pname" name="pname" value="{{ old('pname') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                       placeholder="Enter pet name">
                @if ($errors->has('pname'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('pname') }}</p>
                @endif
            </div>

            {{-- Gender --}}
            <div>
                <label for="gender" class="block text-gray-700 font-medium mb-1">Gender</label>
                <input type="text" id="gender" name="gender" value="{{ old('gender') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                       placeholder="Enter gender">
                @if ($errors->has('gender'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('gender') }}</p>
                @endif
            </div>

            {{-- Age --}}
            <div>
                <label for="age" class="block text-gray-700 font-medium mb-1">Age</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                       placeholder="Enter age">
                @if ($errors->has('age'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('age') }}</p>
                @endif
            </div>

            {{-- Pet Image --}}
            <div>
                <label for="image" class="block text-gray-700 font-medium mb-1">Pet Image</label>
                <input type="file" id="image" name="image"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                    Save
                </button>
                <a href="{{ url()->previous() }}" 
                   class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
