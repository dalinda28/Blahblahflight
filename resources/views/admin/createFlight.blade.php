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
                {{ __('Create new flight') }}
            </h2>
        </div>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4 container" :errors="$errors"/>

    <div class="p-4 m-4 flex justify-center">
        <div class="p-6 rounded-lg shadow-lg bg-white">
            <form method="post" action="{{ route('admin.createFlight') }}">
                @csrf
                <div class="form-group mb-6">
                    <label for="flightNumber" class="form-label inline-block mb-2 text-gray-700">Flight number:</label>
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
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="name"
                           name="flightNumber" placeholder="Enter flight number" required>
                </div>

                <div class="form-group">
                    <label for="capacity" class="form-group mb-6">Capacity:</label>
                    <input type="text" class="form-control
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
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="email"
                           name="capacity" placeholder="Enter capacity" required>
                </div>

                <div class="form-group">
                    <label for="price" class="form-group mb-6">Price: </label>

                    <input id="price" class="form-control
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
                           name="price" placeholder="Enter price" required>
                </div>
                <div class="form-group">
                    <label for="startDateTime">Inbound datetime</label>
                    <input type="datetime-local" name="startDateTime" id="startDateTime">
                </div>
                <div class="text-center">
                    <button type="submit" type="button" class="text-white bg-blue-700 px-5 py-3 rounded-lg mt-3"
                            href="{{ route('admin.user')}}">Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
