<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use App\Registration;
class DataController extends Controller
{
    public function getCountries()
    {
        $countries = DB::table('countries')->pluck("name","id");
        return view('dropdown',compact('countries'));
    }

    public function getStates($id) 
    {        
        $states = DB::table("states")->where("countries_id",$id)->pluck("name","id");
        return json_encode($states);
    }

    public function store(Request $request)
    {
        $data = New Registration();
        $data->name         = $request->name;   
        $data->countries_id = $request->countries_id  ;
        $data->states_id    = $request->states_id;
        $data->save();

        return redirect()->back();
    }
}
