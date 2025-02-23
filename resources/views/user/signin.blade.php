@extends('layouts.master')
@section('content')

<div class="flex justify-center items-center min-h-screen bg-gray-100 px-4">
    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Sign In</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                @foreach ($errors->all() as $error)
                    <p class="text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('user.signin') }}" method="post" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-600">Email</label>
                <input type="text" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter email">
            </div>

            <div>
                <label class="block text-gray-600">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Enter password">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">Sign In</button>
        </form>
    </div>
</div>

@endsection
