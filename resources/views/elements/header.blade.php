<header class="border-b sticky top-0 w-full bg-white">
    <nav class="max-w-7xl flex justify-between py-8 mx-auto bg-white">
        <a  href="{{ route('main') }}" class="flex items-center gap-4">
            @include('elements.logo')
            <h3 class="text-2xl font-medium text-purple-700">Blablaflight</h3>
        </a>
        <!-- left header section -->
        @php
            $activeRoute = Route::currentRouteName();
            $activeClasses = 'underline font-bold text-purple-800';
        @endphp
        <div class="items-center hidden space-x-8 lg:flex">
            <a @class([$activeClasses => $activeRoute == 'main', 'hover:underline']) href="{{ route('main') }}">Home</a>
            @if (Auth::check() && Auth::user()->role == 'pilot')
                <a @class([$activeClasses => $activeRoute == 'flight.new', 'hover:underline'])  href="{{ route('flight.new') }}">Schedule a flight</a>
            @endif
            @if (Auth::check())
                <a @class([$activeClasses => $activeRoute == 'flight.list', 'hover:underline']) href="{{ route('flight.list') }}">My flights</a>
            @endif
            @if (Auth::check())
                <a @class([$activeClasses => $activeRoute == 'list', 'hover:underline']) href="{{ route('list') }}">Books</a>
            @endif
            <a @class([$activeClasses => $activeRoute == 'contact', 'hover:underline']) href="{{ route('contact') }}">Contact Us</a>
        </div>
        <!-- right header section -->
        @if (Auth::check())
        <form method="POST" action="{{ route('logout') }}" class="flex items-center space-x-2">
            @csrf
            <button class="hover:cursor-pointer hover:underline" for="submit" href="{{ route('logout') }}">Logout</button>
        </form>
        @else
            <div class="flex items-center space-x-2">
                <a class="hover:underline" href="{{ route('login') }}">Login</a>
                <a class="hover:underline" href="{{ route('register') }}">Registration</a>
            </div>
        @endif
    </nav>
</header>
