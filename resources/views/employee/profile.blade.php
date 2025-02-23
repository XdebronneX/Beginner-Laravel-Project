@extends('layouts.master')
@section('content')

<div class="flex justify-center items-center min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 px-4 py-12">
    <div class="bg-white text-gray-900 rounded-3xl shadow-lg p-10 w-full max-w-4xl">
        @foreach($employees as $employee)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                
                <!-- Left Side (Profile Picture) -->
                <div class="flex flex-col items-center">
                    <div class="w-40 h-40 border-4 border-green-600 rounded-full overflow-hidden shadow-lg">
                        <img src="{{ asset('images/'.$employee->img_path) }}" alt="Profile Picture" class="w-full h-full object-cover">
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mt-4">Employee Profile</h2>
                </div>

                <!-- Right Side (Employee Details) -->
                <div class="space-y-4 text-lg">
                    <p>
                        <span class="text-gray-500">Firstname:</span> 
                        <strong class="text-gray-900">{{ $employee->fname }}</strong>
                    </p>
                    
                    <p>
                        <span class="text-gray-500">Lastname:</span> 
                        <strong class="text-gray-900">{{ $employee->lname }}</strong>
                    </p>
                    
                    <p>
                        <span class="text-gray-500">Email:</span> 
                        <strong class="text-gray-900">{{ $employee->email }}</strong>
                    </p>
                    
                    <p>
                        <span class="text-gray-500">Address:</span> 
                        <strong class="text-gray-900">{{ $employee->addressline }}</strong>
                    </p>
                    
                    <p>
                        <span class="text-gray-500">Town:</span> 
                        <strong class="text-gray-900">{{ $employee->town }}</strong>
                    </p>
                    
                    <p>
                        <span class="text-gray-500">Zipcode:</span> 
                        <strong class="text-gray-900">{{ $employee->zipcode }}</strong>
                    </p>
                    
                    <p>
                        <span class="text-gray-500">Phone:</span> 
                        <strong class="text-gray-900">{{ $employee->phone }}</strong>
                    </p>
                </div>
            </div>

            <!-- Back Button -->
            {{-- <div class="mt-6 flex justify-center">
                <a href="{{ url()->previous() }}" 
                   class="px-6 py-3 bg-cyan-500 hover:bg-cyan-600 text-white font-semibold rounded-lg shadow-md transition-all">
                    Back
                </a>
            </div> --}}
        @endforeach
    </div>
</div>

@endsection
