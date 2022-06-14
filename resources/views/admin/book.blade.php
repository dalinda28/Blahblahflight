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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{url()->previous()}}">
                    <button type="button" class="px-5 my-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z"/>
                        </svg>
                    </button>
                </a>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="text-center font-bold text-2xl mt-0 mb-2 text-dark-600 my-5">
                    Books Management
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        @if($books->count() > 0)
                                            <table class="min-w-full">
                                                <thead class="bg-white border-b">
                                                <tr>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        id
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        id_flight
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        id_booker
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Date
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        is Paid
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                        Comment
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($books as $book)

                                                    <tr class="bg-white border-b">

                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $book->id }}
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $book->id_flight }}
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $book->id_booker  }}
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $book->date  }}
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $book->isPaid  }}
                                                        </td>
                                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                            {{ $book->comment  }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.updateBook', $book->id) }}">
                                                                <button type="button" class="bg-green-700 text-white rounded-lg px-5 py-2">Update</button>
                                                            </a>
                                                            <a href="{{ route('admin.deleteBook', $book->id) }}">
                                                                <button type="button" class="bg-green-700 text-white rounded-lg px-5 py-2">Delete</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="p-6 bg-white border-b border-gray-200">
                                                No Books yet
                                            </div>
                                        @endif
                                        {{ $books->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
