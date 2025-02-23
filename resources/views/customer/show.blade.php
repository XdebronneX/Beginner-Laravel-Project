@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="max-w-4xl bg-white shadow-lg rounded-lg p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
            <!-- Profile Image -->
            <div class="flex justify-center">
                <img src="{{ asset('images/'.$customer->img_path) }}" alt="Customer Image" 
                    class="w-64 h-64 object-cover rounded-full shadow-md border-4 border-gray-200">
            </div>

            <!-- Customer Details -->
            <div class="space-y-4">
                <h2 class="text-2xl font-semibold text-gray-800">Customer Details</h2>
                <div class="grid grid-cols-2 gap-4">
                    <p class="text-lg"><span class="font-semibold text-gray-600">Title:</span> {{ $customer->title }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Firstname:</span> {{ $customer->fname }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Lastname:</span> {{ $customer->lname }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Address:</span> {{ $customer->addressline }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Zipcode:</span> {{ $customer->zipcode }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-600">Phone:</span> {{ $customer->phone }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
