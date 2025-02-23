@extends('layouts.master')
@section('content')

{{-- <div class="min-h-screen bg-gray-100 flex flex-col items-center py-6 px-4">
    <div class="container mx-auto">
  <div class="flex justify-between items-center mb-4"> --}}
          <div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Employee List</h2>
            <a href="{{ route('employee.create') }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition flex items-center">
                <span class="fas fa-user-plus mr-2"></span> Add Employee
            </a>
        </div>
    {{-- @if ($message = Session::get('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            <strong>{{ $message }}</strong>
        </div>
    @endif --}}

    <!-- Employee Table -->
       <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-green-500 text-white">
                <tr>
                    <th class="px-4 py-2 border">Employee ID</th>
                    <th class="px-4 py-2 border">Firstname</th>
                    <th class="px-4 py-2 border">Lastname</th>
                    <th class="px-4 py-2 border">Address</th>
                    <th class="px-4 py-2 border">Town</th>
                    <th class="px-4 py-2 border">Phone</th>
                    <th class="px-4 py-2 border">Zipcode</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Image</th>
                    <th class="px-4 py-2 border">Show</th>
                    <th class="px-4 py-2 border">Edit</th>
                    <th class="px-4 py-2 border">Delete</th>
                    <th class="px-4 py-2 border">Restore</th>
                </tr>
            </thead>
            <tbody class="bg-gray-100">
                @foreach($employees as $employee)
                <tr class="border-b border-gray-300 text-center">
                    <td class="px-4 py-2">{{ $employee->emp_id }}</td>
                    <td class="px-4 py-2">{{ $employee->fname }}</td>
                    <td class="px-4 py-2">{{ $employee->lname }}</td>
                    <td class="px-4 py-2">{{ $employee->addressline }}</td>
                    <td class="px-4 py-2">{{ $employee->town }}</td>
                    <td class="px-4 py-2">{{ $employee->phone }}</td>
                    <td class="px-4 py-2">{{ $employee->zipcode }}</td>
                    <td class="px-4 py-2">{{ $employee->email }}</td>
                    <td class="px-4 py-2">
                        <img src="{{ asset('images/'.$employee->img_path) }}" class="w-16 h-16 rounded-full border">
                    </td>

                    <!-- Show Icon -->
                    <td class="px-4 py-2">
                        @if($employee->deleted_at)
                            <i class="fas fa-eye text-gray-400 text-lg"></i>
                        @else
                            <a href="{{ route('employee.show', $employee->emp_id) }}">
                                <i class="fas fa-eye text-blue-500 text-lg hover:text-blue-700"></i>
                            </a>
                        @endif
                    </td>

                    <!-- Edit Icon -->
                    <td class="px-4 py-2">
                        @if($employee->deleted_at)
                            <i class="fas fa-user-edit text-gray-400 text-lg"></i>
                        @else
                            <a href="{{ route('employee.edit', $employee->emp_id) }}">
                                <i class="fas fa-user-edit text-yellow-500 text-lg hover:text-yellow-700"></i>
                            </a>
                        @endif
                    </td>

                    <!-- Delete Icon -->
                    <td class="px-4 py-2">
                        @if(!$employee->deleted_at)
                            {!! Form::open(['route' => ['employee.destroy', $employee->emp_id], 'method' => 'DELETE']) !!}
                                <button type="submit">
                                    <i class="fas fa-user-times text-red-500 text-lg hover:text-red-700"></i>
                                </button>
                            {!! Form::close() !!}
                        @else
                            <i class="fas fa-user-times text-gray-400 text-lg"></i>
                        @endif
                    </td>

                    <!-- Restore Icon -->
                    <td class="px-4 py-2">
                        @if($employee->deleted_at)
                            <a href="{{ route('employee.restore', $employee->emp_id) }}">
                                <i class="fa fa-undo text-green-500 text-lg hover:text-green-700"></i>
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

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
            {{ $employees->links('pagination::tailwind') }}
        </div>
</div>

@endsection
