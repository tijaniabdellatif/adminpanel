<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Continent;
use App\Family;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(){

         return $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     *  return home view
     */
    public function home(){
     /**
      *
      * $families = Family::whereNotNull('family_id')
            ->with('families')
            ->get();

        dd($families);
      * **/

        $numCount = Family::all()->count();
        $animalCount = Animal::all()->count();
        $countCountry = Continent::all()->count();
        $families = Family::all()->count();


        return view('home',compact('numCount','animalCount','countCountry','families'));
    }
}
