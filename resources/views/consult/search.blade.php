@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gray-100 py-10 px-6">
    <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold text-blue-600 border-b-4 border-blue-400 pb-2 shadow-md mb-6 text-center">
            Pet Details
        </h2>

        @foreach($pet as $pets)
        <div class="flex flex-col md:flex-row items-center bg-gray-50 p-6 rounded-lg shadow-md mb-8">
            <div class="w-full md:w-1/3 flex justify-center">
                <img src="{{ asset('images/'.$pets->img_path) }}" class="w-64 h-64 object-cover rounded-lg shadow-lg" />
            </div>
            <div class="w-full md:w-2/3 mt-6 md:mt-0 px-6">
                <p class="text-gray-700"><span class="font-semibold text-lg text-blue-500">Pet ID:</span> {{ $pets->pet_id }}</p>
                <p class="text-gray-700"><span class="font-semibold text-lg text-blue-500">Pet Name:</span> {{ $pets->pname }}</p>
                <p class="text-gray-700"><span class="font-semibold text-lg text-blue-500">Owner Name:</span> {{ $pets->fname }}</p>
                <p class="text-gray-700"><span class="font-semibold text-lg text-blue-500">Breed:</span> {{ $pets->pbreed }}</p>
                <p class="text-gray-700"><span class="font-semibold text-lg text-blue-500">Gender:</span> {{ $pets->gender }}</p>
                <p class="text-gray-700"><span class="font-semibold text-lg text-blue-500">Age:</span> {{ $pets->age }}</p>
            </div>
        </div>
        @endforeach

        <h2 class="text-3xl font-bold text-blue-600 border-b-4 border-blue-400 pb-2 shadow-md mt-10 text-center">
            Medical History
        </h2>

        <div class="overflow-x-auto mt-6">
            <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-green-500 text-white text-left">
                        <th class="py-3 px-6">Record #</th>
                        <th class="py-3 px-6">Veterinarian Name</th>
                        <th class="py-3 px-6">Disease or Injuries</th>
                        <th class="py-3 px-6">Observation</th>
                        <th class="py-3 px-6">Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultations as $consultation)
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="py-3 px-6">{{ $consultation->consult_id }}</td>
                        <td class="py-3 px-6">{{ $consultation->lname }}</td>
                        <td class="py-3 px-6">{{ $consultation->disease_name }}</td>
                        <td class="py-3 px-6">{{ $consultation->observation }}</td>
                        <td class="py-3 px-6 text-green-600 font-semibold">${{ $consultation->consult_cost }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8 flex justify-center">
            <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                Back
            </a>
        </div>
    </div>
</div>

@endsection
