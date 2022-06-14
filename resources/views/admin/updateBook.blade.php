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
                {{ __('Update book') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Update book number "{{ $book->id }}"
                </div>
                <div class="p-4 m-4 flex justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <form method="POST" action="{{ route('admin.updateBook', $book->id) }}">
                            <label for="id" class="form-label inline-block mb-2 text-gray-700">id flight:</label>
                            <input type="number"
                                   class="mb-4 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="id_flight"
                                   name="id_flight" placeholder="Enter id flight" value="{{ $book->id_flight }}" required/>

                            <label for="id_booker" class="form-label inline-block mb-2 text-gray-700">id booker:</label>
                            <input type="number"
                                   class="mb-4 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="id_booker"
                                   name="id_booker" placeholder="Enter id booker" value="{{ $book->id_booker }}" required/>

                            <label for="date" class="form-label inline-block mb-2 text-gray-700">Date:</label>
                            <input type="date"
                                   class="mb-4 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="date"
                                   name="date" placeholder="Enter date" value="{{ $book->date }}" required/>

                            <label for="isPaid" class="form-label inline-block mb-2 text-gray-700">Is paid ?</label>
                            <select name="isPaid" id="isPaid"
                                    class="mb-4 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            >
                                <option value="0">True</option>
                                <option value="1">False</option>
                            </select>

                            <label for="comment" class="form-label inline-block mb-2 text-gray-700">Comment</label>
                            <input type="text"
                                   class="mb-4 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="comment"
                                   name="comment" placeholder="Enter comment" value="{{ $book->comment }}" required/>
                            @csrf
                            <div class="text-center">
                                <button type="submit" class="text-white bg-blue-700 px-5 py-3 rounded-lg mt-3"
                                        href="{{ route('admin.book')}}">Update
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

