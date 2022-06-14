<x-app-layout>
    <x-slot name="header">
        <div class="items-center hidden space-x-8 lg:flex">
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.user') }}"> Users </a>
                <a href="{{ route('admin.airport') }}">airports</a>
                <a href="{{ route('admin.book') }}">Books</a>
                <a href="{{ route('admin.flight') }}">Flights</a>
                <a href="{{ route('admin.message') }}">Messages</a>
            @endif
        </div>
    </x-slot>
    <div class="p-4 m-4 flex justify-center">
        <div class="w-40 h-48 mx-4 text-center">
            <a href="{{ route('admin.user') }}"
               class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <svg style=" display: inline;"  xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <h5 class="mt-3 mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $userCount }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Total users</p>
            </a>
        </div>
        <div class="w-40 h-48 mx-4 text-center">
            <a href="{{ route('admin.airport') }}"
               class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <svg style=" display: inline;" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <h5 class="mt-3 mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $airportCount }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Total airports</p>
            </a>
        </div>
        <div class="w-40 h-48 mx-4 text-center">
            <a href="{{ route('admin.book') }}"
               class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <svg style=" display: inline;" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h5 class="mt-3 mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $bookCount }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Total books</p>
            </a>
        </div>
        <div class="w-40 h-48 mx-4 text-center">
            <a href="{{ route('admin.flight') }}"
               class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <svg style=" display: inline;" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>

                <h5 class="mt-3 mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $flightCount }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Total flights</p>
            </a>
        </div>
        <div class="w-30 h-48 mx-4 text-center">
            <a href="{{ route('admin.message') }}"
               class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <svg style=" display: inline;" xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                </svg>
                <h5 class="mt-3 mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $messageCount }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">Total Messages</p>
            </a>
        </div>
    </div>

    </span>

</x-app-layout>
