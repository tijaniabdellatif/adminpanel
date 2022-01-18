<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Kirschbaum\PowerJoins\PowerJoins;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {

        $test = Animal::join("families","animals.family_id","=","families.id")
            ->select('animals.id','animal_name','animals.description','image','family_libelle')->get();


        $animal = Animal::all();
       /* $test = Animal::joinRelationship('family')->get();

        dd($test);


        $animals = Animal::with('family')->get();

       $**/




        return view('animals.index',compact('test','animal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {




          $this->validate($request,[

             'animalname' => 'required',
              'image' => 'required|max:2048',
              'description' => 'required',
              'family' => 'required',
         ]);



         $path = $request->file('image')->store('public');

         $data = Animal::create([

             'animal_name' => $request->animalname,
             'description' => $request->description,
             'image' => $path,
             'family_id' => $request->family,
         ]);


        $continents = $request->continent;
        foreach ($continents as $key => $name){

            $insert = [

                'animal_id'=> $data->id,
                'continent_id' => $request->continent[$key]
             ];

            DB::table('animals_continents')->insert($insert);
        }


         return redirect()->route('dashboard.home')->with('success','Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $animal = Animal::find($id);
        $animal->delete();

        return \response()->json([
            'success' => 'Deleted'
        ]);
    }
}
