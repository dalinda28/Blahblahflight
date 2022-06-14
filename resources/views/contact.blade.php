<x-base-layout>
    <div class="flex-1 bg-purple-100">
        <div class="flex flex-col gap-4 max-w-7xl py-8 mx-auto ">
            <h1 class="text-3xl font-semibold">Contact us</h1>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200">
                @if (isset($messagevalidation))
                    <p class="mb-4 font-medium text-sm text-green-600">{{ $messagevalidation }}</p>
                @endif
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form id="contact-form" class="flex flex-col gap-3" action="{{ route('contact.store') }}"
                    method="POST">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <label for="name"> Your Name </label>
                        <input type="text" class="@error('name') is-invalid @enderror" placeholder="Name" name="name"
                            id="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="email"> Your Email </label>
                        <input type="text" class="@error('email') is-invalid @enderror" placeholder="Email" name="email"
                            id="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="message"> Your Message </label>
                        <textarea class="@error('message') is-invalid @enderror" placeholder="Message" name="message" id="message"></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <button class="btn g-recaptcha uk-button uk-button-primary uk-button-large uk-width-1-1"
                            data-sitekey="{{ env('RECAPTCHAV3_SITEKEY') }}" data-callback='onSubmit'
                            data-action='submit' type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("contact-form").submit();
        }
    </script>
</x-base-layout>
