@extends('layouts.master')
@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl">
        <div class="flex flex-col md:flex-row items-center">
            <!-- Profile Image -->
            <div class="md:w-1/3 flex justify-center">
                <img src="{{ asset('images/'.$employee->img_path) }}" 
                    class="w-72 h-72 rounded-full object-cover border-4 border-gray-300 shadow-md" 
                    alt="Profile Picture">
            </div>

            <!-- Profile Details -->
            <div class="md:w-2/3 mt-6 md:mt-0 md:ml-6">
                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-semibold text-gray-800">Fullname: <span class="text-blue-500">{{ $employee->fname }} {{ $employee->lname }}</span></h2>
                 <h2 class="text-xl font-medium text-gray-700 mt-2">Email: <span class="text-gray-600">{{ $employee->user_email ?? 'No email found' }}</span></h2>

                    <h2 class="text-xl font-medium text-gray-700 mt-2">Address: <span class="text-gray-600">{{ $employee->addressline }}</span></h2>
                    <h2 class="text-xl font-medium text-gray-700 mt-2">Town: <span class="text-gray-600">{{ $employee->town }}</span></h2>
                    <h2 class="text-xl font-medium text-gray-700 mt-2">Zipcode: <span class="text-gray-600">{{ $employee->zipcode }}</span></h2>
                    <h2 class="text-xl font-medium text-gray-700 mt-2">Phone: <span class="text-gray-600">{{ $employee->phone }}</span></h2>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
