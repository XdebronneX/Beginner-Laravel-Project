@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-4xl p-8">
        <div class="flex flex-col md:flex-row items-center md:items-start">
            <!-- Service Image -->
            <div class="md:w-1/3 flex justify-center">
                <img src="{{ asset('images/'.$service->img_path) }}" width="360" height="360" 
                    class="rounded-lg shadow-md">
            </div>

            <!-- Service Details -->
            <div class="md:w-2/3 mt-6 md:mt-0 md:ml-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Service Details</h2>
                <div class="space-y-3">
                    <p class="text-lg"><span class="font-semibold text-gray-700">Service ID:</span> {{ $service->service_id }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-700">Service Name:</span> {{ $service->service_name }}</p>
                    <p class="text-lg"><span class="font-semibold text-gray-700">Service Cost:</span> {{ $service->service_cost }}</p>
                </div>

                <!-- Action Buttons -->
                {{-- <div class="mt-6 flex space-x-4">
                    <a href="{{ route('service.edit', $service->service_id) }}" 
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>

                    {!! Form::open(['route' => ['service.destroy', $service->service_id], 'method' => 'DELETE', 'class' => 'inline-block']) !!}
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                            <i class="fas fa-trash-alt mr-2"></i>Delete
                        </button>
                    {!! Form::close() !!}

                    <a href="{{ route('service.index') }}" 
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                        <i class="fas fa-arrow-left mr-2"></i>Back
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
