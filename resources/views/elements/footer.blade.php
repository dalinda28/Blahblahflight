<footer class="border-t">
    <div class="max-w-7xl py-6 mx-auto flex flex-wrap items-center justify-center space-y-4 sm:justify-between sm:space-y-0">
        <div class="flex flex-row pr-3 space-x-4 sm:space-x-8">
            @include('elements.logo')
            <ul class="flex flex-wrap items-center space-x-4 sm:space-x-8">
                <li>
                    <a class="hover:underline" rel="noopener noreferrer" href="{{ route('termsofuse') }}">Terms of Use</a>
                </li>
                <li>
                    <a class="hover:underline" rel="noopener noreferrer" href="{{ route('privacy') }}">Privacy</a>
                </li>
            </ul>
        </div>
        <ul class="flex flex-wrap pl-3 space-x-4 sm:space-x-8">
            <li>
                <a class="hover:underline" rel="noopener noreferrer" target="_blank" href="https://www.instagram.com/">Instagram</a>
            </li>
            <li>
                <a class="hover:underline" rel="noopener noreferrer" target="_blank" href="https://fr-fr.facebook.com/">Facebook</a>
            </li>
            <li>
                <a class="hover:underline" rel="noopener noreferrer" target="_blank" href="https://twitter.com/?lang=fr">Twitter</a>
            </li>
        </ul>
    </div>
</footer>
