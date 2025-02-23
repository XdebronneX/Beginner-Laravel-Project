<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;

use View;   
use Validator;
use Redirect;
use Storage;
use File;
use Auth;



class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $diseases = Disease::withTrashed()->orderBy('disease_id','DESC')->paginate(10);
        
        return View::make('disease.index',compact('diseases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('disease.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Disease::$rules);

                if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
        }
            Disease::create($request->all());
            return Redirect::to('disease')->with('success','New Disease added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(Disease $disease_id)
    {
        // $disease = Disease::find($disease_id);
        // return view('disease.show',compact('disease'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit($disease_id)
    {
        $disease = Disease::find($disease_id);
        return view('disease.edit',compact('disease'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$disease_id)
    {
       $disease = Disease::find($disease_id);

        $validator = Validator::make($request->all(), Disease::$rules);
        
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }

                        $input = $request->all();           
                        $disease->update($input);
                            return Redirect::to('/disease')->with('success','Disease has been updated!');
                        } 
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Disease  $disease
     * @return \Illuminate\Http\Response
     */
   public function destroy($disease_id)
    {
        $disease = Disease::findOrFail($disease_id);
        $disease->delete();
        return Redirect::to('/disease')->with('success','Disease deleted!');
    }
    public function restore($disease_id) 
    {
       Disease::withTrashed()->where('disease_id',$disease_id)->restore();
        return  Redirect::route('disease.index')->with('success','Disease restored successfully!');
    }
}
