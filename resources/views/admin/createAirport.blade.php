<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <a href="{{url()->previous()}}">
                <button type="button" class="px-5 my-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                    </svg>
                </button>
            </a>
            <h2 class="px-5 my-5 font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Aiports Management') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-4 m-4 flex justify-center">
        <div class="p-6 rounded-lg shadow-lg bg-white">
            <form method="post" action="{{ route('admin.createAirport') }}">
                @csrf
                <div class="form-group mb-6">
                    <label for="country" class="form-label inline-block mb-2 text-gray-700">Country:</label>
                    <input type="text"
                           class="form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           id="country"
                           name="country" placeholder="Enter country" required>
                </div>
                <div class="form-group mb-6">
                    <label for="city" class="form-label inline-block mb-2 text-gray-700">City:</label>
                    <input type="text"
                           class="form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="city"
                           name="city" placeholder="Enter city" required>
                </div>


                <div class="text-center">
                    <button type="submit" class="text-white bg-blue-700 px-5 py-5 rounded-lg mt-3"
                            href="{{ route('admin.airport')}}">Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
