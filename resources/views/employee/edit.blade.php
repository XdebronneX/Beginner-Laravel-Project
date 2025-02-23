@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-4xl p-8 flex flex-col md:flex-row gap-8">
        
        {{-- Left Side (Image Section) --}}
        <div class="w-full md:w-1/3 flex flex-col items-center">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Employee Image</h2>

            {{-- Image Preview --}}
            <div class="w-40 h-40 bg-gray-200 border border-gray-300 rounded-lg flex items-center justify-center overflow-hidden">
                @if ($employee->img_path)
                    <img src="{{ asset('images/'.$employee->img_path) }}" alt="Employee Image" class="object-cover w-full h-full">
                @else
                    <span class="text-gray-500">No Image</span>
                @endif
            </div>

            {{-- Upload Input --}}
            <div class="mt-4">
                <input type="file" id="image" name="image" class="w-full text-sm text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm cursor-pointer">
            </div>
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Right Side (Form Section) --}}
        <div class="w-full md:w-2/3 space-y-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center">Edit Employee</h2>

            {{ Form::model($employee, ['route' => ['employee.update', $employee->emp_id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'space-y-6']) }}

            <div class="grid grid-cols-2 gap-6">
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

                {{-- Email --}}
                {{-- <div class="col-span-2">
                    <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                    {{ Form::text('email', null, ['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400', 'placeholder' => 'Enter email']) }}
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}

                {{-- Password --}}
                {{-- <div class="col-span-2">
                    <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                    {{ Form::password('password', ['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400', 'placeholder' => 'Enter password']) }}
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div> --}}
            </div>

            {{-- Buttons --}}
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
</div>

@endsection
