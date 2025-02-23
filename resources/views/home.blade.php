@extends('layouts.master')
@section('content')

<!-- Hero Banner Section -->
<div class="relative w-full h-[230px] bg-cover bg-center" style="background-image: url('{{ asset('images/banner.jpg') }}');">
    <!-- Subtle Overlay -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Hero Content -->
    <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-6">
        <h1 class="text-5xl font-bold text-white tracking-wide">
            Welcome to ACME Pet Clinic
        </h1>
        <p class="text-lg text-gray-200 mt-3 max-w-2xl">
            Providing quality pet care with love and expertise.  
            Because your pet deserves the best care possible.
        </p>
    </div>
</div>

<!-- Services Section -->
<div class="py-16 bg-gray-100 flex flex-col items-center">
    <div class="w-full max-w-6xl">
        @if($transacts->isEmpty())
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h2 class="text-2xl font-semibold text-gray-800">No available services</h2>
                <p class="text-gray-600 mt-2">We currently have no services available. Please check back soon!</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($transacts as $transact)
                    <div class="bg-white shadow-lg rounded-xl p-6 flex flex-col items-center text-center border border-gray-200 hover:shadow-xl transition-all duration-300">
                        <!-- Service Image with Border -->
                        <div class="relative w-40 h-40">
                            <img src="{{ asset('images/'.$transact->img_path) }}" 
                                class="w-full h-full object-cover rounded-xl border-4 border-gray-300 shadow-md">
                        </div>

                        <!-- Service Name -->
                        <h3 class="mt-4 text-xl font-semibold text-gray-900">{{ $transact->service_name }}</h3>

                        <!-- Description (If Available) -->
                        {{-- @if(!empty($transact->description))
                            <p class="text-gray-600 mt-2 text-sm px-3">
                                {{ Str::limit($transact->description, 80) }}
                            </p>
                        @endif --}}

                        <!-- Price & Button -->
                        <div class="mt-4 w-full">
                            <p class="text-lg font-bold text-green-600">₱{{ number_format($transact->service_cost, 2) }}</p>
                            <a href="{{ route('service.addToCart', ['id'=>$transact->service_id]) }}" 
                                class="mt-3 block w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-all duration-300">
                                <i class="fas fa-cart-plus mr-2"></i> Add to Cart
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection
