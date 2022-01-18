<div class="flex space-x-4">
    @if(!Auth::check())


    @else
        <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Team</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>

        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>

    @endif
</div>

<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

    @guest
        <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
        @if (Route::has('register'))
            <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    @else
        <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>

        <a href="{{ route('logout') }}"
           class="no-underline hover:underline text-gray-300 text-sm p-3"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
    @endguest
</div>

