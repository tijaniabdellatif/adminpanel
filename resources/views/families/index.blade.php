@extends('layouts.dashboard')


@section('content')


    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Create Animal
            </div>
            <div class="p-3">
                <form class="w-full" method="POST" enctype="multipart/form-data" action="{{route('animal.store')}}">

                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                   for="animalname">
                                 Animal name
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('animalname') border-red-500 @enderror rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                   id="animalname" name="animalname" type="text" placeholder="Monkey">

                            @error('animalname')
                            <p class="text-red-500 text-xs italic">{{$message}}</p>
                            @enderror

                        </div>


                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                   for="image">
                                Your image
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 @error('image') border-red-500 @enderror  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                   id="image" name="image" type="file">

                            @error('image')
                            <p class="text-red-500 text-xs italic">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="description">
                                Description
                            </label>
                            <textarea class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 @error('description') border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                      id="description" name="description" placeholder="describe"></textarea>
                            <p class="text-grey-dark text-xs italic">Make it as long and as crazy as
                                you'd like</p>

                            @error('description')
                            <p class="text-red-500 text-xs italic">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="grid-city">
                                Choose Family
                            </label>

                            <div class="relative">
                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                        id="family" name="family">
                                    <option>Choose your family</option>
                                    @foreach($families as $family)
                                    <option value="{{$family->id}}">{{$family->family_libelle}}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="grid-state">
                                 Family Tree
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                        id="sub" name="sub">
                                    <option>Sub Family</option>

                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>


                        <div class="w-full">

                            @foreach($continent as $cont)
                            <label>
                                <input type="checkbox" name="continent[]" value="{{$cont->id}}">
                            </label>

                                {{$cont->continent_name}}

                            @endforeach

                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                                        type="submit">
                                    Create
                                </button>

                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

       <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#family').on('change',function(e) {
                var cat_id = e.target.value;

                    $.ajax({
                        url:"{{ route('sub') }}",
                        type:"POST",
                        data: {
                            cat_id: cat_id
                        },
                        success:function (data) {
                            console.log(data);
                            var selected_option = $('#family option:selected').val();
                            console.log(selected_option);
                            $('select[name="sub"]').empty();

                            data.forEach(element => {


                                if(element.id === 6 && selected_option === '6'){

                                    element.childrenFamilies.forEach(elem => {


                                        $('#sub').append('<option value=" ' + elem.id + '">' + elem.family_libelle + '</option>');
                                    });
                                    return false;
                                }
                                if(element.id === 5 && selected_option === '5'){

                                    element.childrenFamilies.forEach(elem => {


                                        $('#sub').append('<option value=" ' + elem.id + '">' + elem.family_libelle + '</option>');
                                    });
                                    return false;
                                }
                                if(element.id === 4 && selected_option === '4'){


                                    element.childrenFamilies.forEach(elem => {


                                        $('#sub').append('<option value=" ' + elem.id + '">' + elem.family_libelle + '</option>');
                                    });
                                    return false;
                                }




                            })

                        }
                    })



            });
        });

    </script>





@endsection
