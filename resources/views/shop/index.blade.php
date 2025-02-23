@extends('layouts.master')

@section('title', 'Laravel Shopping Cart')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex flex-col items-center p-6">
    <div class="w-full max-w-6xl">
        @if($transacts->isEmpty())
            <!-- No available service message -->
            <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <h2 class="text-2xl font-semibold text-gray-800">No available service</h2>
                <p class="text-gray-600 mt-2">There are no services at the moment. Please check back later.</p>
            </div>
        @else
            @foreach($transacts->chunk(10) as $itemtransact)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($itemtransact as $transact)
                        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col h-full items-center text-center">
                            <!-- Service Image -->
                            <img src="{{ asset('images/'.$transact->img_path) }}" 
                                class="w-48 h-48 object-cover rounded-full shadow-md">

                            <!-- Service Name -->
                            <h3 class="mt-4 text-xl font-semibold text-gray-800">{{ $transact->service_name }}</h3>

                            <!-- Add to Cart Button -->
                            <div class="mt-auto w-full">
                                <a href="{{ route('service.addToCart', ['id'=>$transact->service_id]) }}" 
                                    class="block w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg shadow-md transition">
                                    <i class="fas fa-cart-plus mr-2"></i> Add to Cart
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
