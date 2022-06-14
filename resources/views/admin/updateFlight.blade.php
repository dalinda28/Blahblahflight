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
                {{ __('Update flight') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Update flight number "{{ $flight->flightNumber }}"
                </div>
                <div class="p-4 m-4 flex justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <form method="POST" action="{{ route('admin.updateFlight', $flight->id) }}">
                            <label for="id" class="form-label inline-block mb-2 text-gray-700">Flight Number</label>
                            <input type="number"
                                   class="mb-4 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="flightNumber"
                                   name="flightNumber" placeholder="Enter flight number" value="{{ $flight->flightNumber }}" required/>

                            <label for="id_booker" class="form-label inline-block mb-2 text-gray-700">Capacity</label>
                            <input type="number"
                                   class="mb-4 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="capacity"
                                   name="capacity" placeholder="Enter capacity" value="{{ $flight->capacity }}" required/>

                            <label for="comment" class="form-label inline-block mb-2 text-gray-700">Price</label>
                            <input type="text"
                                   class="mb-4 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="price"
                                   name="price" placeholder="Enter price" value="{{ $flight->price }}" required/>
                            @csrf
                            <div class="text-center">
                                <button type="submit" class="text-white bg-blue-700 px-5 py-3 rounded-lg mt-3"
                                        href="{{ route('admin.flight')}}">Update
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

