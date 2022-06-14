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
                {{ __('Update user account') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Update the account of "{{ $user->name }}"
                </div>
                <div class="p-4 m-4 flex justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <form method="POST" action="{{ route('admin.updateUser', $user->id) }}">
                            <label for="id" class="form-label inline-block mb-2 text-gray-700">Name:</label>
                            <input type="text"
                                   class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="name"
                                   name="name" placeholder="Enter name" value="{{ $user->name }}" required>

                            <label for="id" class="form-label inline-block mb-2 text-gray-700">Email:</label>
                            <input type="text"
                                   class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                   id="email"
                                   name="email" placeholder="Enter email" value="{{ $user->email }}" required/>
                            @csrf

                            <div class="mt-4 mb-4">
                                <label for="role">Role</label>
                                <div class="flex gap-5">
                                    <div class="flex gap-1.5">
                                        <label for="passager">Passager</label>
                                        <input id="passager" class="block mt-1" type="radio" name="role" value="passager" @checked($user->role == 'passager') required/>
                                    </div>
                                    <div class="flex gap-1.5">
                                        <label for="pilot">Pilot</label>
                                        <input id="pilot" class="block mt-1" type="radio" name="role" value="pilot" @checked($user->role == 'pilot') required/>
                                    </div>
                                    <div class="flex gap-1.5">
                                        <label for="admin">Admin</label>
                                        <input id="admin" class="block mt-1" type="radio" name="role" value="admin" @checked($user->role == 'admin') required/>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="text-white bg-blue-700 px-5 py-3 rounded-lg mt-3"
                                        href="{{ route('admin.user')}}">Update
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

