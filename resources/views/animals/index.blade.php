
@extends('layouts.dashboard')

@section('content')







    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Full Table
            </div>
            <div class="p-3">
                <table class="table-responsive w-full rounded">
                    <thead>
                    <tr>
                        <th class="border w-1/4 px-4 py-2">Animal name</th>
                        <th class="border w-1/6 px-4 py-2">Description</th>
                        <th class="border w-1/6 px-4 py-2">Image</th>
                        <th class="border w-1/6 px-4 py-2">Family and Sub Family</th>
                        <th class="border w-1/7 px-4 py-2">Continents</th>
                        <th class="border w-1/5 px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($animals as $animal)
                    <tr id="sid{{$animal->id}}">


                        <td class="border px-4 py-2">{{$animal->animal_name}}</td>
                        <td class="border px-4 py-2">{{$animal->description}}</td>
                        <td class="border px-4 py-2"><img src="{{\Illuminate\Support\Facades\Storage::url($animal->image)}}" /></td>
                        <td class="border px-4 py-2">{{$animal->family_libelle}}</td>
                        <td class="border px-4 py-2">

                            <ul>


                                @forelse($animal->continents as $an)

                                    <li>{{$an->continent_name}}, {{$an->pivot->created_at}}</li>

                                @empty

                                  <li>No Continent for this item</li>
                                @endforelse
                            </ul>

                        </td>
                        <td class="border px-4 py-2">
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-eye"></i></a>
                            <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white">
                                <i class="fas fa-edit"></i></a>

                            <a class="bg-teal-300 cursor-pointer
                            rounded p-1 mx-1 text-red-500"
                               onclick="deleteRecord({{$animal->id}})"
                               href="javascript:void(0)">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>

                        @empty


                            <td>No data for now</td>

                    </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteRecord(id){

            if(confirm('do you want to delete this item'))
            {
                $.ajax({

                    url:"/dashboard/animals/"+id,
                    type:"DELETE",
                    data:{

                        'message':'no data'

                    },
                    success:function(response){

                        console.log(response);
                          $('#sid'+id).remove();
                    }
                });
            }
        }


    </script>


     <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });




        $(document).ready(function(){

            function getData(){

                return $.ajax({

                    url:'index',
                    type:'GET',

                }).done( function(data,textStatus,jqXHR ){
                    $(document).ready(function(){

                        window.location="index";
                        $('html').innerHTML(jqXHR.responseText);

                    });
                });
            }
            $('.delete-form').on('submit',function(e){

                e.preventDefault();
                let id = $(this).data("id");

                $.ajax({

                    url:$(this).data('route'),
                    type:'POST',
                    data:{
                        "_method":'delete'
                    },

                    success:function(){

                        //const data = JSON.stringify(getData());


                         getData();
                      // console.log(getData()) ;
                    }
                })


            });

        });
    </script>



@endsection
