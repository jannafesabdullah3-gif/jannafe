<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <div class="flex">

                <!-- Logo / Home -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}">
                        <span class="font-bold text-lg">
                            Canteen Ordering System
                        </span>
                    </a>
                </div>

                <!-- Dashboard -->
                @auth
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex items-center">

                        <a href="{{ route('dashboard') }}"
                           class="text-gray-700 hover:text-gray-900">
                            Dashboard
                        </a>

                    </div>
                @endauth

            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                @auth

                    <span class="mr-4 text-gray-700">
                        Welcome, {{ Auth::user()->name }}
                    </span>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                                class="text-gray-700 hover:text-red-600">
                            Logout
                        </button>
                    </form>

                @else

                    <a href="{{ route('login') }}"
                       class="text-gray-700 hover:text-gray-900 mr-4">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="text-gray-700 hover:text-gray-900">
                        Register
                    </a>

                @endauth

            </div>

        </div>

    </div>
</nav>