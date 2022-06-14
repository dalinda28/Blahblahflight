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
                {{ __('Create new users') }}
            </h2>
        </div>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4 container" :errors="$errors"/>

    <div class="p-4 m-4 flex justify-center">
        <div class="p-6 rounded-lg shadow-lg bg-white">
            <form method="post" action="{{ route('admin.createUser') }}">
                @csrf
                <div class="form-group mb-6">
                    <label for="name" class="form-label inline-block mb-2 text-gray-700">Name:</label>
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
                           name="name" placeholder="Enter name" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-group mb-6">Email:</label>
                    <input type="email" class="form-control
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
                           name="email" placeholder="Enter email" required>
                </div>
                <div class="mt-4 mb-4">
                    <label for="role">Role</label>
                    <div class="flex gap-5">
                        <div class="flex gap-1.5">
                            <label for="passager">Passager</label>
                            <input id="passager" class="block mt-1" type="radio" name="role" value="passager" checked/>
                        </div>
                        <div class="flex gap-1.5">
                            <label for="pilot">Pilot</label>
                            <input id="pilot" class="block mt-1" type="radio" name="role" value="pilot"/>
                        </div>
                        <div class="flex gap-1.5">
                            <label for="admin">Admin</label>
                            <input id="admin" class="block mt-1" type="radio" name="role" value="admin"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="form-group mb-6">Password: </label>

                    <input id="password" class="form-control
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
                           type="password"
                           name="password"
                           required autocomplete="current-password"/>
                </div>
                <div class="form-group">
                    <label for="birthday" class="form-group mb-6">birthday: </label>

                    <input id="birthDate" class="form-control
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
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="date"
                           name="birthDate" :value="old('birthDate')"
                           required/>
                </div>
                <div class="form-group">
                    <label for="email" class="form-group mb-6">Adress:</label>
                    <input type="adress" class="form-control
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
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="adress"
                           name="adress" required>
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
