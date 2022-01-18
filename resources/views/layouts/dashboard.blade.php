<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/scripts/main.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
</head>
<body>

<div class="mx-auto bg-grey-400">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Logo</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    @if(Auth::check())
                        <a href="https://github.com/tailwindadmin/admin" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">help</a>


                        <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="{{Storage::url(Auth::user()->image)}}" alt="">
                        <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">{{Str::ucfirst(\Illuminate\Support\Facades\Auth::user()->firstname)}}</a>
                    @else
                        <div></div>
                    @endif

                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                        <ul class="list-reset">

                            <li><hr class="border-t mx-2 border-grey-light"></li>
                            <li>
                                <a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                <ul class="list-reset flex flex-col">

                    <li class="w-full h-full py-3 px-2 text-green-darker">
                        <a href="#"
                           class="font-sans  font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-paw float-left mx-2"></i>
                            Dashboard
                            <span><i class="fa fa-angle-down float-right"></i></span>
                        </a>
                        <ul class="list-reset -mx-2 bg-white-medium-dark">
                            <li class="border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                <a href="{{ route('families.index')  }}"
                                   class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                    Create animals
                                    <span><i class="fa fa-angle-right float-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </aside>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                @yield('content')
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; ZooKeeper</div>
        </footer>
        <!--/footer-->

    </div>

</div>


</body>
</html>
