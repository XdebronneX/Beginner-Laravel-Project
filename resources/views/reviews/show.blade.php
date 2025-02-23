@extends('layouts.master')

@section('content')

<div class="container mx-auto px-6 py-10">
    <!-- Service Profile Section -->
    <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col md:flex-row items-center gap-6">
        <!-- Service Image -->
        <div class="flex-shrink-0">
            <img src="{{ asset('images/'.$services->img_path) }}" 
                class="w-60 h-60 object-cover rounded-full border-4 border-blue-500 shadow-lg">
        </div>

        <!-- Service Info -->
        <div class="text-center md:text-left">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Service ID: {{ $services->service_id }}</h2>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Service Name: {{ $services->service_name }}</h2>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Service Cost: <span class="text-green-500">${{ $services->service_cost }}</span></h2>
        </div>
    </div>

    <!-- Comments Section -->
    <section id="comments" class="mt-12 bg-gray-100 rounded-lg p-6 shadow">
        <div class="max-w-4xl mx-auto">
            <h3 class="text-2xl font-semibold text-gray-700 mb-4">Leave a Comment</h3>
            
            <!-- Comment Form -->
            <form method="post" action="{{ route('reviews.updateComment', $services->service_id) }}" class="bg-white p-6 rounded-lg shadow">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold">Codename</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name"
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                    @if($errors->has('name'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="mb-4">
                    <label for="comment" class="block text-gray-700 font-semibold">Your Comment</label>
                    <textarea name="comment" id="comment" rows="4" placeholder="Write your comment here..."
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300"></textarea>
                    @if($errors->has('comment'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('comment') }}</p>
                    @endif
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition">
                        Save
                    </button>
                    <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">
                        Cancel
                    </a>
                </div>
            </form>

            <!-- Comments List -->
            <h3 class="text-2xl font-semibold text-gray-700 mt-8 mb-4">1 Million Comments</h3>

            @foreach($servicess as $serve)
            <div class="bg-white p-4 rounded-lg shadow mb-4 flex items-start gap-4">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="w-14 h-14 rounded-full shadow">
                <div>
                    <h4 class="text-lg font-bold text-gray-800">{{ $serve->name }}</h4>
                    <p class="text-gray-600">{{ $serve->comment }}</p>
                    <div class="text-sm text-gray-500 flex gap-4 mt-2">
                        <span><i class="fa fa-calendar"></i> {{ $serve->created_at }}</span>
                        <span><i class="fa fa-thumbs-up"></i> 534,455</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection
