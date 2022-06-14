<x-base-layout>
    <x-auth-card>

        <form method="POST" action="{{ route('register') }}" id="register-form">
            @csrf

            <h1 class="mb-4 text-xl">Register</h1>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Birth Date -->
            <div class="mt-4">
                <x-label for="birthDate" :value="__('Birthday')" />

                <x-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" :value="old('birthDate')"
                    required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="adress" :value="__('Adress')" />

                <x-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required />
            </div>

            <!-- Role -->
            <div class="mt-4">
                <x-label for="role" :value="__('Role')" />
                <div class="flex gap-5">
                    <div class="flex gap-1.5">
                        <input id="passager" class="block mt-1" type="radio" name="role" :value="old('Passager')"
                            checked />
                        <x-label for="passager" :value="__('Passager')" />
                    </div>
                    <div class="flex gap-1.5">
                        <input id="pilot" class="block mt-1" type="radio" name="role" :value="__('Pilot')" />
                        <x-label for="pilot" :value="__('Pilot')" />
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class="btn ml-4 g-recaptcha uk-button uk-button-primary uk-button-large uk-width-1-1"
                data-sitekey="{{ env('RECAPTCHAV3_SITEKEY') }}" data-callback='onSubmit' data-action='submit'
                type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </x-auth-card>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("register-form").submit();
        }
    </script>
    </x-guest-layout>
