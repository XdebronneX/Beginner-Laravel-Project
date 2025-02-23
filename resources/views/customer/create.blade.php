@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-4xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create New Customer</h2>

        <form method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-2 gap-6">
                {{-- Left Column --}}
                <div class="space-y-4">
                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-gray-700 font-medium mb-1">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter title">
                        @if ($errors->has('title'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('title') }}</p>
                        @endif
                    </div>

                    {{-- First Name --}}
                    <div>
                        <label for="fname" class="block text-gray-700 font-medium mb-1">First Name</label>
                        <input type="text" id="fname" name="fname" value="{{ old('fname') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter first name">
                        @if ($errors->has('fname'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('fname') }}</p>
                        @endif
                    </div>

                    {{-- Last Name --}}
                    <div>
                        <label for="lname" class="block text-gray-700 font-medium mb-1">Last Name</label>
                        <input type="text" id="lname" name="lname" value="{{ old('lname') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter last name">
                        @if ($errors->has('lname'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('lname') }}</p>
                        @endif
                    </div>

                    {{-- Address --}}
                    <div>
                        <label for="address" class="block text-gray-700 font-medium mb-1">Address</label>
                        <input type="text" id="address" name="addressline" value="{{ old('addressline') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter address">
                        @if ($errors->has('addressline'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('addressline') }}</p>
                        @endif
                    </div>
                </div>

                {{-- Right Column --}}
                <div class="space-y-4">
                    {{-- Town --}}
                    <div>
                        <label for="town" class="block text-gray-700 font-medium mb-1">Town</label>
                        <input type="text" id="town" name="town" value="{{ old('town') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter town">
                        @if ($errors->has('town'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('town') }}</p>
                        @endif
                    </div>

                    {{-- Zipcode --}}
                    <div>
                        <label for="zipcode" class="block text-gray-700 font-medium mb-1">Zipcode</label>
                        <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter zipcode">
                        @if ($errors->has('zipcode'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('zipcode') }}</p>
                        @endif
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label for="phone" class="block text-gray-700 font-medium mb-1">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400"
                            placeholder="Enter phone">
                        @if ($errors->has('phone'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>

                    {{-- Customer Image --}}
                    <div>
                        <label for="image" class="block text-gray-700 font-medium mb-1">Customer Image</label>
                        <input type="file" id="image" name="image"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
                        @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-between mt-6">
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
