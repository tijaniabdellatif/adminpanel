@extends('layouts.app')

@section('content')

    <div class="container mx-auto h-full flex flex-1 justify-center items-center">
        <div class="w-full max-w-lg">
            <div class="leading-loose">
                <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                    @csrf

                    <p class="text-gray-800 font-medium text-center text-lg font-bold">Sign up</p>
                    <div class="">
                        <label class="block text-sm text-gray-00" for="firstname">First Name</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('firstname') border border-red-500 @enderror" id="firstname" name="firstname" type="text"  placeholder="First Name" aria-label="First Name" value="{{old('firstname')}}">
                    </div>

                    @error('firstname')
                    <div class="bg-red-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                        <div class="bg-red-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-500 rounded-t-lg">
                            <p class="font-bold text-white flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current cursor-pointer" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                </svg>
                                error</p>
                            <div class="flex items-center">
                                <button type="button" class="bg-red-600 rounded-md p-2 inline-flex items-center justify-center text-black-400 hover:text-gray-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 bg-red-600 rounded-b-lg break-words text-white">
                            {{$message}}
                        </div>
                    </div>
                    @enderror
                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="lastname">Last Name</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded @error("lastname") border border-red-500 @enderror" id="lastname" name="lastname" type="text"  placeholder="lastname" aria-label="lastname">
                    </div>

                    @error('lastname')
                    <div class="bg-red-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                        <div class="bg-red-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-500 rounded-t-lg">
                            <p class="font-bold text-white flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current cursor-pointer clickable" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                </svg>
                                Error</p>
                            <div class="flex items-center">
                                <button type="button" class="bg-red-600 rounded-md p-2 inline-flex items-center justify-center text-black-400 hover:text-gray-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 bg-red-600 rounded-b-lg break-words text-white">
                            {{$message}}
                        </div>
                    </div>
                    @enderror

                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="email">Email</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded @error("email") border border-red-500 @enderror" id="email" name="email" type="email"  placeholder="Email" aria-label="email">
                    </div>

                    @error('email')
                    <div class="bg-red-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                        <div class="bg-red-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-500 rounded-t-lg">
                            <p class="font-bold text-white flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current cursor-pointer clickable" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                </svg>
                                Error</p>
                            <div class="flex items-center">
                                <button type="button" class="bg-red-600 rounded-md p-2 inline-flex items-center justify-center text-black-400 hover:text-gray-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 bg-red-600 rounded-b-lg break-words text-white">
                            {{$message}}
                        </div>
                    </div>
                    @enderror


                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="password">Password</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded @error("password") border border-red-500 @enderror" id="password" name="password" type="password"  placeholder="Password min 8 character (alphanumeric and numbers)" aria-label="password">
                    </div>

                    @error('password')
                    <div class="bg-red-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                        <div class="bg-red-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-500 rounded-t-lg">
                            <p class="font-bold text-white flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current cursor-pointer clickable" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                </svg>
                                Error</p>
                            <div class="flex items-center">
                                <button type="button" class="bg-red-600 rounded-md p-2 inline-flex items-center justify-center text-black-400 hover:text-gray-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 bg-red-600 rounded-b-lg break-words text-white">
                            {{$message}}
                        </div>
                    </div>
                    @enderror

                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="confirm">Re Type password</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded @error("password") border border-red-500 @enderror" id="confirm" name="confirm" type="password"  placeholder="Re type password" aria-label="Re type password">
                    </div>

                    @error('lastname')
                    <div class="bg-red-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                        <div class="bg-red-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-500 rounded-t-lg">
                            <p class="font-bold text-white flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current cursor-pointer clickable" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                </svg>
                                Error</p>
                            <div class="flex items-center">
                                <button type="button" class="bg-red-600 rounded-md p-2 inline-flex items-center justify-center text-black-400 hover:text-gray-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 bg-red-600 rounded-b-lg break-words text-white">
                            {{$message}}
                        </div>
                    </div>
                    @enderror

                    <div class="mt-2">
                        <label class="block text-sm text-gray-600" for="image">image</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded @error("image") border border-red-500 @enderror" id="image" name="image" type="file">
                    </div>

                    @error('image')
                    <div class="bg-red-600 shadow-lg mx-auto w-96 max-w-full text-sm pointer-events-auto bg-clip-padding rounded-lg block mb-3" id="static-example" role="alert" aria-live="assertive" aria-atomic="true" data-mdb-autohide="false">
                        <div class="bg-red-600 flex justify-between items-center py-2 px-3 bg-clip-padding border-b border-red-500 rounded-t-lg">
                            <p class="font-bold text-white flex items-center">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times-circle" class="w-4 h-4 mr-2 fill-current cursor-pointer clickable" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm121.6 313.1c4.7 4.7 4.7 12.3 0 17L338 377.6c-4.7 4.7-12.3 4.7-17 0L256 312l-65.1 65.6c-4.7 4.7-12.3 4.7-17 0L134.4 338c-4.7-4.7-4.7-12.3 0-17l65.6-65-65.6-65.1c-4.7-4.7-4.7-12.3 0-17l39.6-39.6c4.7-4.7 12.3-4.7 17 0l65 65.7 65.1-65.6c4.7-4.7 12.3-4.7 17 0l39.6 39.6c4.7 4.7 4.7 12.3 0 17L312 256l65.6 65.1z"></path>
                                </svg>
                                Error</p>
                            <div class="flex items-center">
                                <button type="button" class="bg-red-600 rounded-md p-2 inline-flex items-center justify-center text-black-400 hover:text-gray-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 bg-red-600 rounded-b-lg break-words text-white">
                            {{$message}}
                        </div>
                    </div>
                    @enderror

                    <div class="mt-4 items-center justify-between">
                        <input class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded cursor-pointer clickable" type="submit" value="Register" />

                    </div>

                    <a class="inline-block right-0 align-baseline font-bold text-sm text-500 hover:text-blue-800 cursor-pointer" href="{{route('login')}}">
                        Already registred ? Log in
                    </a>
                </form>

            </div>
        </div>
    </div>

@endsection
