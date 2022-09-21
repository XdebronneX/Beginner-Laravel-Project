<?php

namespace App\Http\Controllers;

use App\Models\Breed;
use Illuminate\Http\Request;
use View;  
use Auth; 
use Validator;
use Redirect;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $breeds = breed::orderBy('breed_id','ASC')->get();
        //$breeds = breed::orderBy('breed_id','ASC')->paginate(10);
        $breeds = Breed::withTrashed()->orderBy('petb_id','ASC')->paginate(10);
        
        return View::make('breed.index',compact('breeds'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('breed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
             $validator = Validator::make($request->all(), Breed::$rules);

                if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
        }
            Breed::create($request->all());
            return Redirect::to('breed')->with('success','New breed added!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($petb_id)
    {
        $breed = breed::find($petb_id);
        return view('breed.show',compact('breed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($petb_id)
    {
        $breed = Breed::find($petb_id);
        return view('breed.edit',compact('breed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $petb_id)
    {
        $breed = breed::find($petb_id);

        $validator = Validator::make($request->all(), Breed::$rules);
        
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }

                        $input = $request->all();           
                        $breed->update($input);
                            return Redirect::to('/breed')->with('success','breed has been updated!');
                        } 
            
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($petb_id)
    {
        $breed = Breed::findOrFail($petb_id);
        $breed->delete();
        return Redirect::to('/breed')->with('success','breed deleted!');
    }
    public function restore($petb_id) 
    {

       Breed::withTrashed()->where('petb_id',$petb_id)->restore();
        return  Redirect::route('breed.index')->with('success','breed restored successfully!');
    }
}

