@extends('layouts.master')
@section('content')

<div class="flex justify-center items-center min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 px-4">
    <div class="bg-white shadow-2xl rounded-xl p-10 w-full max-w-2xl text-gray-700">
        <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Create New User</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-4">
                @foreach ($errors->all() as $message)
                    <p class="text-sm">{{ $message }}</p>
                @endforeach
            </div>
        @endif

        <form method="post" action="{{ route('employee.signup') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-2 gap-6">
                <!-- First Name -->
                <div>
                    <label for="fname" class="block text-gray-600 font-medium mb-1">First Name</label>
                    <input type="text" id="fname" name="fname" value="{{ old('fname') }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white placeholder-gray-400" 
                        placeholder="Enter first name">
                </div>

                <!-- Last Name -->
                <div>
                    <label for="lname" class="block text-gray-600 font-medium mb-1">Last Name</label>
                    <input type="text" id="lname" name="lname" value="{{ old('lname') }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white placeholder-gray-400" 
                        placeholder="Enter last name">
                </div>
            </div>

            <!-- Address -->
            <div>
                <label for="addressline" class="block text-gray-600 font-medium mb-1">Address</label>
                <textarea id="addressline" name="addressline" rows="3"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white resize-y placeholder-gray-400"
                    placeholder="Enter full address">{{ old('addressline') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <!-- Town -->
                <div>
                    <label for="town" class="block text-gray-600 font-medium mb-1">Town</label>
                    <input type="text" id="town" name="town" value="{{ old('town') }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white placeholder-gray-400" 
                        placeholder="Enter town">
                </div>

                <!-- Zipcode -->
                <div>
                    <label for="zipcode" class="block text-gray-600 font-medium mb-1">Zipcode</label>
                    <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode') }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white placeholder-gray-400" 
                        placeholder="Enter zipcode">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-gray-600 font-medium mb-1">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white placeholder-gray-400" 
                        placeholder="Enter phone number">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-600 font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white placeholder-gray-400" 
                        placeholder="Enter email">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-600 font-medium mb-1">Password</label>
                    <input type="password" id="password" name="password" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white placeholder-gray-400" 
                        placeholder="Enter password">
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-gray-600 font-medium mb-1">User Image</label>
                    <input type="file" id="image" name="image" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm bg-white">
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <button type="submit" 
                    class="w-full bg-blue-500 text-white font-semibold py-3 rounded-lg shadow-md hover:bg-blue-600 transition-all duration-200">
                    Save
                </button>

                <a href="{{ url()->previous() }}" 
                    class="w-full ml-4 bg-gray-300 text-gray-700 font-semibold py-3 rounded-lg shadow-md hover:bg-gray-400 transition-all duration-200 text-center">
                    Cancel
                </a>
            </div>

            <!-- Sign In Redirect -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Already have an account? 
                <a href="{{ route('employee.signin') }}" class="text-blue-500 hover:underline">Sign in here</a>
            </p>
        </form>
    </div>
</div>

@endsection
