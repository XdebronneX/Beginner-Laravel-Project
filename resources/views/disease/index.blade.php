@extends('layouts.master')

@section('content')

<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Disease List</h2>
        <a href="{{ route('disease.create') }}" 
          class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition flex items-center">
            <i class="fas fa-plus mr-2"></i> Add Disease
        </a>
    </div>

    @if($diseases->isEmpty())
        <div class="bg-white shadow-lg rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold text-gray-700">No data found</h2>
            <p class="text-gray-500">There are no diseases added yet. Click the "ADD DISEASE" button to register a new disease.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                <thead class="bg-green-500 text-white">
                    <tr>
                        <th class="px-4 py-2 border">Disease ID</th>
                        <th class="px-4 py-2 border">Disease Name</th>
                        <th class="px-4 py-2 border">Edit</th>
                        <th class="px-4 py-2 border">Delete</th>
                        <th class="px-4 py-2 border">Restore</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-100">
                    @foreach($diseases as $disease)
                    <tr class="border-b border-gray-300 text-center">
                        <td class="px-4 py-2">{{ $disease->disease_id }}</td>
                        <td class="px-4 py-2">{{ $disease->disease_name }}</td>
                        <td class="px-4 py-2">
                            @if($disease->deleted_at)
                                <i class="fas fa-user-edit text-gray-400 text-lg"></i>
                            @else
                                <a href="{{ route('disease.edit', $disease->disease_id) }}" class="text-yellow-500 hover:text-yellow-700">
                                    <i class="fas fa-user-edit text-lg"></i>
                                </a>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if(!$disease->deleted_at)
                                {!! Form::open(['route' => ['disease.destroy', $disease->disease_id], 'method' => 'DELETE', 'class' => 'inline-block']) !!}
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-user-times text-lg"></i>
                                </button>
                                {!! Form::close() !!}
                            @else
                                <i class="fas fa-user-times text-gray-400 text-lg"></i>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if($disease->deleted_at)
                                <a href="{{ route('disease.restore', $disease->disease_id) }}" class="text-red-500 hover:text-red-700">
                                    <i class="fa fa-undo text-lg"></i>
                                </a>
                            @else
                                <i class="fa fa-undo text-gray-400 text-lg"></i>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

       <div class="mt-6 flex justify-center">
            {{ $diseases->links('pagination::tailwind') }}
        </div>
    @endif
</div>

@endsection
