<x-guest-layout>
    @if (Route::has('login'))
        <div class="text-white">
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="text-white"><a href="#">Create People</a></div>
</x-guest-layout>