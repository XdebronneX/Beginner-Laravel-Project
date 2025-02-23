@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-4xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Customer</h2>

        {{ Form::model($customer, ['route' => ['customer.update', $customer->customer_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'space-y-6']) }}

        <div class="grid grid-cols-2 gap-6">
            {{-- Left Column --}}
            <div class="space-y-4">
                {{-- Title --}}
                <div>
                    <label for="title" class="block text-gray-700 font-medium mb-1">Title</label>
                    {{ Form::text('title', null, ['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400', 'placeholder' => 'Enter title']) }}
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- First Name --}}
                <div>
                    <label for="fname" class="block text-gray-700 font-medium mb-1">First Name</label>
                    {{ Form::text('fname', null, ['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400', 'placeholder' => 'Enter first name']) }}
                    @error('fname')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Last Name --}}
                <div>
                    <label for="lname" class="block text-gray-700 font-medium mb-1">Last Name</label>
                    {{ Form::text('lname', null, ['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400', 'placeholder' => 'Enter last name']) }}
                    @error('lname')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Address --}}
                <div>
                    <label for="addressline" class="block text-gray-700 font-medium mb-1">Address</label>
                    {{ Form::text('addressline', null, ['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400', 'placeholder' => 'Enter address']) }}
                    @error('addressline')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Right Column --}}
            <div class="space-y-4">
                {{-- Town --}}
                <div>
                    <label for="town" class="block text-gray-700 font-medium mb-1">Town</label>
                    {{ Form::text('town', null, ['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400', 'placeholder' => 'Enter town']) }}
                    @error('town')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Zip Code --}}
                <div>
                    <label for="zipcode" class="block text-gray-700 font-medium mb-1">Zipcode</label>
                    {{ Form::text('zipcode', null, ['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400', 'placeholder' => 'Enter zipcode']) }}
                    @error('zipcode')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label for="phone" class="block text-gray-700 font-medium mb-1">Phone</label>
                    {{ Form::text('phone', null, ['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400', 'placeholder' => 'Enter phone']) }}
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Customer Image --}}
                <div>
                    <label for="image" class="block text-gray-700 font-medium mb-1">Customer Image</label>
                    <input type="file" id="image" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400">
                    <div class="mt-2 flex items-center">
                        <img src="{{ asset('images/'.$customer->img_path) }}" class="w-24 h-24 object-cover rounded-lg shadow-md border border-gray-300">
                    </div>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-between mt-6">
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
