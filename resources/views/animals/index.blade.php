
@extends('layouts.dashboard')

@section('content')

    <ul>



     @forelse($test as $t)

<li>{{$t->id}}</li>
        <li>{{$t->animal_name}}</li>

            <li>{{$t->description}}</li>
         <li>


             <!--
               <form method="POST" class="forms" action="{{route('animal.destroy',$t->id)}}">
                 @csrf
             @method('delete')
                 <input id="click"  type="submit" class="btn btn-outline-danger buttons" value="delete" />
             </form>
-->

                 <form method="post" class="delete-form" data-route="{{route('animal.destroy',$t->id)}}">
                     @method('delete')
                     @csrf
                     <button type="submit"  data-id="{{ $t->id }}" class="deleteRecord">Delete</button>
                 </form>

             <button   id="flex">Delete Record</button>

         </li>




    @empty

<li>No data</li>
     @endforelse

    </ul>



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
