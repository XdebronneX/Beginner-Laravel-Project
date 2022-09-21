<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Customer;
use App\Models\Breed;
use Illuminate\Http\Request;
use View;   
use DB;
use Validator;
use Redirect;
use Storage;
use File;
use Auth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $pets = DB::table('pets')

            ->leftJoin('customers','customers.customer_id','=','pets.customer_id')
            ->leftJoin('pet_breed','pet_breed.petb_id','=','pets.petb_id')
            ->select('pets.pet_id','customers.fname','pets.pname','pets.gender','pets.age', 'pet_breed.pbreed','pets.img_path','pets.deleted_at')
            ->orderBy('pet_id','DESC')
            ->paginate(10);
            // ->get();
        

        // $pets = Pet::withTrashed()->orderBy('pet_id','DESC')->paginate(10);
        
        return View::make('pet.index',compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            

        $customers = Customer::pluck('fname','customer_id');
        $pet_breed = Breed::pluck('pbreed','petb_id');
         return View::make('pet.create',compact('customers','pet_breed'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Pet::$rules);

                    if ($validator->fails()) {
                        return redirect()->back()->withInput()->withErrors($validator);
                    }
                    if ($validator->passes()) {
         $input = $request->all();

         $request->validate([
            'image' => 'image' 
        ]);

         if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;

            $fileName = uniqid().'_'.$file->getClientOriginalName();

            $destinationPath = public_path().'/images';
           
            $input['img_path'] = $fileName;
            
            $file->move($destinationPath,$fileName);
        }
    }
        Pet::create($input);
         return Redirect::to('/pet')->with('success','New Pet has been Added!');


        // $validator = Validator::make($request->all(), Pet::$rules);

        //             if ($validator->fails()) {
        //                 return redirect()->back()->withInput()->withErrors($validator);
        //             }

        //             if ($validator->passes()) {
        //                 $path = Storage::putFileAs('images/pet', $request->file('image'),$request->file('image')->getClientOriginalName());

        //                 $request->merge(["img_path"=>$request->file('image')->getClientOriginalName()]);

        //                 $input = $request->all();

        //                 if($file = $request->hasFile('image')) {
        //                     $file = $request->file('image') ;
        //                     // $fileName = uniqid().'_'.$file->getClientOriginalName();
        //                     $fileName = $file->getClientOriginalName();
        //                     $destinationPath = public_path().'/images' ;
        //                     // dd($fileName);
        //                     $input['img_path'] = 'images/'.$fileName;            
        //                     $pet = Pet::create($input);
        //                     // dd($customer);
        //                     $file->move($destinationPath,$fileName);
        //                     return Redirect::to('/pet')->with('success','New Pet has been Added!');
        //                 } 

        //             }     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $pet_id)
    {


        //tama pero isang id lang yung result
         $pet = DB::table('pets')

            ->leftJoin('customers','customers.customer_id','=','pets.customer_id')
            ->leftJoin('pet_breed','pet_breed.petb_id','=','pets.petb_id')
            ->select('pets.pet_id','customers.fname','pets.pname','pets.gender','pets.age', 'pet_breed.pbreed','pets.img_path')
            ->where('pets.pet_id', '=', $pet_id)
            //->first();
            ->get();
        return View::make('pet.show',compact('pet'));



        // hindi lumalabas yung FK

        // $pet = Pet::find($pet_id);
        // $customers = Customer::pluck('fname','customer_id');
        // $pet_breed = Breed::pluck('pbreed','petb_id');
        //return View::make('pet.show',compact('pet','customers','pet_breed'));

        // $pets = Pet::find($pet_id);
        // return view('pet.show',compact('pets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit($pet_id)
    {
        //  $pet = Pet::find($pet_id);
        // return view('pet.edit',compact('pet'));

        $pet = Pet::find($pet_id);
        $customers = Customer::pluck('fname','customer_id');
        $pet_breed = Breed::pluck('pbreed','petb_id');
        return View::make('pet.edit',compact('pet', 'customers','pet_breed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pet_id)
    {
        $pet= Pet::find($pet_id);

         $pet->customer_id = $request->customer_id;
         $pet->petb_id = $request->petb_id;
         $pet->pname = $request->pname;
         $pet->gender = $request->gender; 
         $pet->age= $request->age;
         $pet->img_path= $request->img_path;
         $validator = Validator::make($request->all(), Pet::$rules);

                    if ($validator->fails()) {
                        return redirect()->back()->withInput()->withErrors($validator);
                    }

                    if ($validator->passes()) {
                       $input = $request->all();

         $request->validate([
            'image' => 'image' 
        ]);

         if($file = $request->hasFile('image')) {
            $file = $request->file('image') ;

            $fileName = uniqid().'_'.$file->getClientOriginalName();

            $destinationPath = public_path().'/images';
           
            $input['img_path'] = $fileName;
            
            $file->move($destinationPath,$fileName);
                            
                        } 
                    }
         $pet->img_path= $input['img_path'];       
         $pet->update($input);
        return Redirect::to('/pet')->with('success','Pet has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy($pet_id)
    {
        
        $pet = Pet::findOrFail($pet_id);
        $pet->delete();
        return Redirect::to('/pet')->with('success','Pet deleted!');
    }
    public function restore($pet_id) {

        Pet::withTrashed()->where('pet_id',$pet_id)->restore();
        return  Redirect::route('pet.index')->with('success','Pet restored successfully!');
    }
}
