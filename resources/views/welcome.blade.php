<x-app-web-layout>
    <header>
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-end">
                @auth
                    <a
                       href="{{ url('/dashboard') }}"
                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                @else
                    <a
                       href="{{ route('login') }}"
                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                           href="{{ route('register') }}"
                           class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
    <div class="card col-md-4 mx-auto">
        <x-application-logo class="card-img-top" />
        <div class="card-body">
            <h5 class="card-title">Welcome!</h5>
            <p class="card-text">Roles & Permissions.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</x-app-web-layout>
