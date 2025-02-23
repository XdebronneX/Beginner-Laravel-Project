@extends('layouts.master')

@section('content')

<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Available Services</h2>

    @foreach($services->chunk(10) as $itemservice)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($itemservice as $service)
                <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col items-center transform transition hover:scale-105">
                    <!-- Service Image -->
                    <img src="{{ asset('images/'.$service->img_path) }}" 
                        alt="Service Image" 
                        class="w-44 h-44 object-cover rounded-full shadow-md">

                    <!-- Service Name -->
                    <h3 class="mt-4 text-lg font-semibold text-gray-800 text-center">
                        {{ $service->service_name }}
                    </h3>

                    <!-- View Details Button -->
                    <p class="text-lg font-bold text-green-600">₱{{ number_format($service->service_cost, 2) }}</p>
                    <a href="{{ route('reviews.showServices', $service->service_id) }}" 
                        class="mt-3 px-4 py-2 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 transition">
                        View Details
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach
</div>

@endsection
