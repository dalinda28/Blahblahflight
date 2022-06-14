<header class="border-b sticky top-0 w-full bg-white">
        <a  href="{{ route('main') }}" class="flex items-center gap-4">
            @include('elements.logo')
            <h3 class="text-2xl font-medium text-purple-700">BlablaAdmin</h3>
        </a>
        <div class="items-center hidden space-x-8 lg:flex">
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.user') }}"> Users </a>
                <a href="{{ route('admin.airport') }}">airports</a>
                <a href="{{ route('admin.book') }}">Books</a>
                <a href="{{ route('admin.flight') }}">Flights</a>
                <a href="{{ route('admin.message') }}">Messages</a>
            @endif
        </div>
        <!-- left header section -->
        @php
            $activeRoute = Route::currentRouteName();
            $activeClasses = 'underline font-bold text-purple-800';
        @endphp
</header>
