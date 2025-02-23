@extends('layouts.master')

@section('content')

<div class="min-h-screen bg-gradient-to-b from-blue-900 to-blue-700 flex justify-center items-center p-6">
    <div class="max-w-4xl bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">Edit Pet</h2>

        {{ Form::model($pet,['route' => ['pet.update',$pet->pet_id],'method'=>'PUT','enctype' =>'multipart/form-data']) }}

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Pet Image -->
            <div class="flex flex-col items-center">
                <label class="block text-gray-700 font-medium mb-2">Pet Image</label>
                <img src="{{ asset('images/'.$pet->img_path) }}" width="200" height="200" 
                     class="rounded-full shadow-md border-4 border-gray-200 object-cover mb-4">
                <input type="file" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400" id="image" name="image">
                @if($errors->has('img_path'))
                <p class="text-red-500 text-sm mt-1">{{ $errors->first('img_path') }}</p>
                @endif
            </div>

            <!-- Pet Details -->
            <div class="space-y-4">
                <div>
                    <label for="pname" class="block text-gray-700 font-medium">Pet Name</label>
                    {!! Form::text('pname',$pet->pname,['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400']) !!}
                    @if($errors->has('pname'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('pname') }}</p>
                    @endif
                </div>

                <div>
                    <label for="customer_id" class="block text-gray-700 font-medium">Owner</label>
                    {!! Form::select('customer_id',$customers, $pet->customer_id,['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400']) !!}
                    @if($errors->has('customer'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('customer') }}</p>
                    @endif
                </div>

                <div>
                    <label for="petb_id" class="block text-gray-700 font-medium">Breed</label>
                    {!! Form::select('petb_id',$pet_breed, $pet->petb_id,['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400']) !!}
                    @if($errors->has('petb_id'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('petb_id') }}</p>
                    @endif
                </div>

                <div>
                    <label for="gender" class="block text-gray-700 font-medium">Gender</label>
                    {!! Form::text('gender',$pet->gender,['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400']) !!}
                    @if($errors->has('gender'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('gender') }}</p>
                    @endif
                </div>

                <div>
                    <label for="age" class="block text-gray-700 font-medium">Age</label>
                    {!! Form::text('age',$pet->age,['class' => 'w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400']) !!}
                    @if($errors->has('age'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('age') }}</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                Update
            </button>
            <a href="{{url()->previous()}}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                Cancel
            </a>
        </div>

        {!! Form::close() !!} 
    </div>
</div>

@endsection
