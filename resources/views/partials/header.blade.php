{{-- <nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-green-600">
            PET<span class="text-blue-500">CLINIC</span>
        </a>

        <div class="hidden md:flex space-x-6">
            <a href="{{ route('customer.index') }}" class="text-gray-700 hover:text-blue-500">Customers</a>
            <a href="{{ route('employee.index') }}" class="text-gray-700 hover:text-blue-500">Employees</a>
            <a href="{{ route('pet.index') }}" class="text-gray-700 hover:text-blue-500">Pets</a>
            <a href="{{ route('transact.index') }}" class="text-gray-700 hover:text-blue-500">Transactions</a>
        </div>

        <div class="flex items-center space-x-4">
            @if (Auth::check())
                <a href="{{ route('service.shoppingCart') }}" class="relative">
                    <i class="fa fa-shopping-cart text-xl text-gray-700"></i>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                        {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
                    </span>
                </a>

                <div class="relative">
                    <button class="text-gray-700 font-medium flex items-center">
                        <i class="fas fa-user mr-2"></i> {{ Auth::User()->name }}
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md">
                        <a href="{{ route('employee.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                        <a href="{{ route('employee.logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            @else
                <a href="{{ route('employee.signup') }}" class="text-blue-500 font-medium">Signup</a>
                <a href="{{ route('employee.signin') }}" class="text-blue-500 font-medium">Signin</a>
            @endif
        </div>

        <button class="md:hidden text-gray-700">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
</nav> --}}


<nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-green-600">
            PET<span class="text-blue-500">CLINIC</span>
        </a>

        <!-- Navigation Links -->
        <div class="hidden md:flex space-x-6">
            <a href="{{ route('customer.index') }}" class="text-gray-700 hover:text-blue-500">Customers</a>
            <a href="{{ route('employee.index') }}" class="text-gray-700 hover:text-blue-500">Employees</a>
            <a href="{{ route('breed.index') }}" class="text-gray-700 hover:text-blue-500">Breeds</a>
            <a href="{{ route('pet.index') }}" class="text-gray-700 hover:text-blue-500">Pets</a>
            <a href="{{ route('disease.index') }}" class="text-gray-700 hover:text-blue-500">Diseases</a>
            <a href="{{ route('service.index') }}" class="text-gray-700 hover:text-blue-500">Services</a>
            <a href="{{ route('service.searchingindex') }}" class="text-gray-700 hover:text-blue-500">Transaction History</a>
            <a href="{{ route('consult.index') }}" class="text-gray-700 hover:text-blue-500">Health Consultation</a>
            <a href="{{ route('comment.index') }}" class="text-gray-700 hover:text-blue-500">Comments</a>
        </div>

        <!-- Right Icons -->
        <div class="flex items-center space-x-4">
            @if (Auth::check())
                <!-- Cart Icon -->
                <a href="{{ route('service.shoppingCart') }}" class="relative">
                    <i class="fas fa-shopping-cart text-xl text-gray-700"></i>
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                        {{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}
                    </span>
                </a>

                <!-- User Dropdown -->
                <div class="relative">
                    <button id="dropdown-btn" class="text-gray-700 font-medium flex items-center">
                        <i class="fas fa-user mr-2"></i> {{ Auth::User()->name }}
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>

                    <!-- Dropdown Menu (Initially Hidden) -->
                    <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md hidden">
                        <a href="{{ route('employee.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">
                            <i class="fas fa-user-circle"></i> Profile
                        </a>
                        <a href="{{ route('employee.logout') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-100">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            @else
                <a href="{{ route('employee.signup') }}" class="text-blue-500 font-medium">Signup</a>
                <a href="{{ route('employee.signin') }}" class="text-blue-500 font-medium">Signin</a>
            @endif
        </div>

        <!-- Mobile Menu Button -->
        <button class="md:hidden text-gray-700">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
</nav>

<!-- JavaScript for Dropdown Toggle -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const dropdownBtn = document.getElementById("dropdown-btn");
    const dropdownMenu = document.getElementById("dropdown-menu");

    dropdownBtn.addEventListener("click", function() {
        dropdownMenu.classList.toggle("hidden");
    });

    // Close dropdown if clicked outside
    document.addEventListener("click", function(event) {
        if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
});
</script>
