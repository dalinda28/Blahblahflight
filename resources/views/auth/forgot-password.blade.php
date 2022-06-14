<x-base-layout>
    <x-auth-card>
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('main') }}">
            < Back home</a>
                <x-slot name="logo">
                    <a href="/">
                        <h3 class="text-2xl font-medium text-blue-500">Blablaflight</h3>
                        <svg class="w-20 h-20 fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg"
                            version="1.0" width="1280.000000pt" height="899.000000pt"
                            viewBox="0 0 1280.000000 899.000000" preserveAspectRatio="xMidYMid meet">
                            <metadata>
                                Created by potrace 1.15, written by Peter Selinger 2001-2017
                            </metadata>
                            <g transform="translate(0.000000,899.000000) scale(0.100000,-0.100000)" fill="#000000"
                                stroke="none">
                                <path
                                    d="M7815 8919 c-19 -38 -35 -73 -35 -78 0 -5 475 -379 1055 -831 l1055 -823 -128 -121 c-200 -189 -445 -429 -883 -864 l-405 -403 -204 10 c-111 6 -298 11 -414 11 -129 0 -216 4 -222 10 -7 7 -7 36 -1 86 14 114 0 164 -85 291 -110 164 -151 197 -295 233 -121 32 -232 48 -521 80 -311 34 -410 37 -479 14 -91 -31 -239 -148 -274 -216 -30 -59 -69 -242 -69 -323 0 -43 10 -102 24 -152 l23 -82 -51 -5 c-28 -3 -226 -15 -441 -26 -214 -12 -484 -27 -600 -34 -115 -7 -214 -10 -220 -6 -5 4 -910 716 -2010 1581 -2201 1731 -2076 1639 -2265 1676 -82 17 -84 16 -226 -11 l-144 -28 1 -57 1 -56 821 -776 c1551 -1465 2562 -2423 2564 -2428 2 -3 -91 -37 -205 -74 -268 -88 -319 -113 -652 -332 -151 -99 -198 -125 -255 -140 -118 -31 -416 -134 -490 -170 -196 -94 -463 -292 -674 -498 -196 -192 -302 -335 -401 -538 -82 -169 -103 -255 -98 -389 5 -118 23 -183 79 -276 47 -80 188 -221 282 -282 161 -105 251 -116 907 -117 335 0 502 4 565 13 281 40 1093 187 2035 368 300 58 592 114 650 125 l105 20 497 -105 c370 -78 511 -112 550 -132 50 -25 462 -243 4222 -2231 l1580 -836 67 7 c90 8 180 29 316 74 l112 36 26 57 c56 124 39 203 -52 251 -57 29 -4842 2975 -4860 2992 -10 9 3 23 55 63 105 80 209 190 275 288 83 125 159 209 251 276 l78 58 47 -38 c92 -77 159 -97 379 -110 l127 -7 115 38 c249 85 395 173 503 305 107 132 137 213 137 367 0 121 -21 176 -97 256 -34 36 -82 81 -107 100 -25 19 -45 38 -46 41 0 4 41 77 91 164 l92 157 -7 74 -6 75 447 632 c245 348 454 642 463 653 l16 22 80 -45 c347 -196 1061 -576 1521 -809 335 -170 366 -184 415 -184 64 0 152 14 224 35 l54 16 0 57 -1 57 -987 622 c-543 342 -996 628 -1006 636 -19 14 -18 17 29 83 27 38 59 83 72 100 l23 31 -107 32 c-248 72 -366 89 -533 78 -18 -1 -247 150 -825 543 -440 300 -905 609 -1033 688 l-233 142 -137 31 c-75 16 -154 34 -175 39 l-38 8 -34 -69z" />
                            </g>
                        </svg>
                    </a>
                </x-slot>

        <h1 class="mb-4 text-xl">Reset password</h1>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf


            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
