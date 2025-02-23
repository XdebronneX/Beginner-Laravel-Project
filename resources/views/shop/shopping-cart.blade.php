@extends('layouts.master')

@section('title', 'Shopping Cart')

@section('content')

<div class="container mx-auto mt-10 px-4">
    @if(Session::has('cart'))
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
            <!-- Cart Header -->
            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Your Shopping Cart</h2>

            <!-- Pet Selection Form -->
            <form method="post" action="{{ route('service.checkout') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="pet_id" class="block text-lg font-semibold text-gray-700 mb-2">Select Your Pet</label>
                    {!! Form::select('pet_id', $pets, null, ['placeholder' => '****** Please Choose! ******', 'class' => 'w-full p-3 border rounded-lg focus:ring focus:ring-blue-300']) !!}
                    @if($errors->has('pet_id'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('pet_id') }}</p>
                    @endif
                </div>

                <!-- Services List -->
                <div class="space-y-4">
                    @foreach($services as $service)
                        <div class="flex items-center justify-between bg-gray-100 p-4 rounded-lg shadow-sm">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $service['service']['service_name'] }}</h3>
                                <p class="text-sm text-gray-600">Quantity: <span class="font-semibold">{{ $service['qty'] }}</span></p>
                                <p class="text-sm font-bold text-green-600">₱{{ number_format($service['price'], 2) }}</p>
                            </div>
                            <a href="{{ route('service.remove', ['id' => $service['service']['service_id']]) }}"
                            class="text-red-500 hover:text-red-700 text-sm font-semibold">
                                Remove
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- Total Price -->
                <div class="text-center mt-6">
                    <h2 class="text-2xl font-bold text-gray-900">Total: ₱{{ number_format($totalPrice, 2) }}</h2>
                </div>

                <!-- Buttons -->
                <div class="flex justify-center mt-6 space-x-4">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                        Proceed to Checkout
                    </button>
                    <a href="{{ url()->previous() }}" class="px-6 py-3 bg-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-400 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    @else
        <!-- Empty Cart Message -->
        <div class="max-w-2xl mx-auto text-center mt-16 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800">Your Cart is Empty</h2>
            <p class="text-gray-600 mt-2">Looks like you haven't added anything yet.</p>
            <a href="{{ route('transact.index') }}" 
            class="mt-4 inline-block bg-blue-500 text-white px-6 py-3 rounded-md text-lg font-medium hover:bg-blue-700 transition">
                Browse Services
            </a>
        </div>
    @endif
</div>

@endsection
