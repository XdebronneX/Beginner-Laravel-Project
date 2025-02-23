@extends('layouts.master')
@section('content')

<div class="flex justify-center items-center min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 px-4">
    <div class="bg-white shadow-2xl rounded-xl p-8 w-full max-w-md text-gray-700">
        <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Sign In</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-4">
                @foreach ($errors->all() as $error)
                    <p class="text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('employee.signin') }}" method="post" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Email Input -->
            <div>
                <label for="email" class="block text-gray-600 font-medium mb-1">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white placeholder-gray-400"
                    placeholder="Enter your email">
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-gray-600 font-medium mb-1">Password</label>
                <input type="password" name="password" id="password" 
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:border-blue-400 bg-white placeholder-gray-400"
                    placeholder="Enter your password">
            </div>

            <!-- Remember Me & Forgot Password -->
            {{-- <div class="flex items-center justify-between text-sm">
                <div>
                    <input type="checkbox" id="remember" name="remember" class="text-blue-500 focus:ring-2 focus:ring-blue-400">
                    <label for="remember" class="text-gray-600">Remember Me</label>
                </div>
                <a href="#" class="text-blue-500 hover:underline">Forgot Password?</a>
            </div> --}}

            <!-- Sign In Button -->
            <button type="submit" 
                class="w-full bg-blue-500 text-white font-semibold py-3 rounded-lg shadow-md hover:bg-blue-600 transition-all duration-200">
                Sign In
            </button>
{{-- 
            <!-- Divider -->
            <div class="flex items-center my-4">
                <hr class="flex-grow border-gray-300">
                <span class="px-2 text-gray-500 text-sm">OR</span>
                <hr class="flex-grow border-gray-300">
            </div> --}}

            {{-- <!-- Social Login Buttons -->
            <div class="space-y-3">
                <button type="button" class="w-full flex items-center justify-center bg-gray-100 text-gray-700 py-2 rounded-lg shadow-md hover:bg-gray-200 transition">
                    <img src="https://img.icons8.com/color/24/000000/google-logo.png" class="mr-2" />
                    Sign in with Google
                </button>
                <button type="button" class="w-full flex items-center justify-center bg-blue-700 text-white py-2 rounded-lg shadow-md hover:bg-blue-800 transition">
                    <img src="https://img.icons8.com/ios-filled/24/ffffff/facebook.png" class="mr-2" />
                    Sign in with Facebook
                </button>
            </div> --}}

            <!-- Sign Up Redirect -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Don't have an account? 
                <a href="{{ route('employee.signup') }}" class="text-blue-500 hover:underline">Sign up here</a>
            </p>
        </form>
    </div>
</div>

@endsection
