<x-guest-layout>
    <div class="mb-6 text-white">
        @if (Route::has('login'))
        <div class="text-white">
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="float-left">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="float-right">Register</a>
                @endif
            @endauth
        </div>
    @endif
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    @if (session()->has('success'))
        <div class="text-white">{{session('success')}}</div>
    @endif
    <div class="text-white"><a href="{{route('officer.create')}}">Add Officer</a></div>
</x-guest-layout>