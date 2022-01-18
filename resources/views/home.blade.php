@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col">
    <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
        <div class="shadow-lg bg-red-vibrant border-l-8 hover:bg-red-vibrant-dark border-red-vibrant-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                @empty($numCount)
                <a href="#" class="no-underline text-white text-2xl">

                     No Data provided
                </a>

                @else
                    <a href="#" class="no-underline text-white text-2xl">

                        {{ $numCount }}
                    </a>
                @endempty
                <a href="#" class="no-underline text-white text-lg">
                   Families
                </a>
            </div>
        </div>

        <div class="shadow bg-info border-l-8 hover:bg-info-dark border-info-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    {{$animalCount}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                 Animals
                </a>
            </div>
        </div>

        <div class="shadow bg-warning border-l-8 hover:bg-warning-dark border-warning-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    {{$families}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Total Families and SubFamilies
                </a>
            </div>
        </div>

        <div class="shadow bg-success border-l-8 hover:bg-success-dark border-success-dark mb-2 p-2 md:w-1/4 mx-2">
            <div class="p-4 flex flex-col">
                <a href="#" class="no-underline text-white text-2xl">
                    {{$countCountry}}
                </a>
                <a href="#" class="no-underline text-white text-lg">
                    Total Continents
                </a>
            </div>
        </div>
    </div>
    </div>



@endsection



