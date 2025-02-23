@extends('layouts.master')

@section('content')

{{-- <div class="min-h-screen bg-gray-100 flex flex-col items-center py-6 px-4">
     <div class="container mx-auto">
        <div class="flex justify-between items-center mb-4"> --}}
          <div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Customer List</h2>
            <a href="{{ route('customer.create') }}" 
               class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition flex items-center">
                <span class="fas fa-user-plus mr-2"></span> Add Customer
            </a>
        </div>

        {{-- Flash Messages --}}
        {{-- @include('layouts.flash-messages') --}}

        @if($customers->isEmpty())
           <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                <h2 class="text-xl font-semibold text-gray-700">No data found</h2>
                <p class="text-gray-500">There are no customer added yet. Click the "ADD CUSTOMER" button to register a new customer.</p>
            </div>
        @else
  <div class="overflow-x-auto">
                <table class="w-full bg-white border border-gray-300 rounded-lg shadow-sm">
                    <thead class="bg-green-500 text-white">
                        <tr>
                            <th class="px-4 py-2 border">Customer ID</th>
                            <th class="px-4 py-2 border">Title</th>
                            <th class="px-4 py-2 border">Last Name</th>
                            <th class="px-4 py-2 border">First Name</th>
                            <th class="px-4 py-2 border">Address</th>
                            <th class="px-4 py-2 border">Phone</th>
                            <th class="px-4 py-2 border">Zipcode</th>
                            <th class="px-4 py-2 border">Image</th>
                            <th class="px-4 py-2 border">Show</th>
                            <th class="px-4 py-2 border">Edit</th>
                            <th class="px-4 py-2 border">Delete</th>
                            <th class="px-4 py-2 border">Restore</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100">
                        @foreach($customers as $customer)
                       <tr class="border-b border-gray-300 text-center">
                            <td class="px-4 py-2">{{ $customer->customer_id }}</td>
                            <td class="px-4 py-2">{{ $customer->title }}</td>
                            <td class="px-4 py-2">{{ $customer->lname }}</td>
                            <td class="px-4 py-2">{{ $customer->fname }}</td>
                            <td class="px-4 py-2">{{ $customer->addressline }}</td>
                            <td class="px-4 py-2">{{ $customer->phone }}</td>
                            <td class="px-4 py-2">{{ $customer->zipcode }}</td>
                            <td class="px-4 py-2">
                                <img src="{{ asset('images/'.$customer->img_path) }}" class="w-16 h-16 rounded-full border">
                            </td>
                             <td class="py-3 px-4 text-center">
                                    @if($customer->deleted_at)
                                        <i class="fas fa-eye text-gray-400 text-xl"></i>
                                    @else
                                       <a href="{{ route('customer.show', $customer->customer_id) }}" 
                                   class="text-blue-500 hover:text-blue-700">
                                    <i class="fas fa-eye text-xl"></i>
                                </a>
                                    @endif
                                </td>
                                 <td class="py-3 px-4 text-center">
                                    @if($customer->deleted_at)
                                        <i class="fas fa-user-edit text-gray-400 text-xl"></i>
                                    @else
                                       <a href="{{ route('customer.edit', $customer->customer_id) }}" 
                                   class="text-green-500 hover:text-green-700">
                                    <i class="fas fa-user-edit text-yellow-500 text-lg hover:text-yellow-700"></i>
                                </a>
                                    @endif
                                </td>
                                 <td class="py-3 px-4 text-center">
                                    @if(!$customer->deleted_at)
                                        {!! Form::open(['route' => ['customer.destroy', $customer->customer_id], 'method' => 'DELETE']) !!}
                                        <button type="submit">
                                            <i class="fas fa-user-times text-red-500 text-xl"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    @else
                                        <i class="fas fa-user-times text-gray-400 text-xl"></i>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-center">
                                    @if($customer->deleted_at)
                                        <a href="{{ route('customer.restore', $customer->customer_id) }}">
                                            <i class="fa fa-undo text-red-500 text-xl"></i>
                                        </a>
                                    @else
                                        <i class="fa fa-undo text-gray-400 text-xl"></i>
                                    @endif
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
        <div class="mt-6 flex justify-center">
            {{ $customers->links('pagination::tailwind') }}
        </div>

        @endif
    </div>
</div>

@endsection
