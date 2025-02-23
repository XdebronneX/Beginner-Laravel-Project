@extends('layouts.master')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="bg-white shadow-lg rounded-lg w-full max-w-3xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Consultation Details</h2>

        @foreach($consultations as $consultation)
        <div class="bg-gray-100 p-6 rounded-lg shadow-md mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                
                <!-- Pet Image -->
                <div class="flex justify-center mb-4 md:mb-0">
                    <img src="{{ asset('images/'.$consultation->img_path) }}" 
                        alt="Pet Image" class="w-40 h-40 object-cover rounded-lg shadow-md">
                </div>

                <!-- Consultation Info -->
                <div class="col-span-2 space-y-4">
                    <p class="text-gray-700"><span class="font-bold">Veterinarian:</span> {{ $consultation->lname }}</p>
                    <p class="text-gray-700"><span class="font-bold">Pet Name:</span> {{ $consultation->pname }}</p>
                    <p class="text-gray-700"><span class="font-bold">Pet Gender:</span> {{ $consultation->gender }}</p>
                    <p class="text-gray-700"><span class="font-bold">Pet Age:</span> {{ $consultation->age }}</p>
                    <p class="text-gray-700"><span class="font-bold">Disease:</span> {{ $consultation->disease_name }}</p>
                    <p class="text-gray-700"><span class="font-bold">Consultation Cost:</span> 
                        <span class="text-green-600 font-semibold">${{ $consultation->consult_cost }}</span>
                    </p>
                    <p class="text-gray-700"><span class="font-bold">Observation:</span> {{ $consultation->observation }}</p>
                </div>

            </div>
        </div>
        @endforeach

        <div class="flex justify-center mt-6">
            <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                Back
            </a>
        </div>
    </div>
</div>
@endsection
