<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;   
use Validator;
use Redirect;
use Storage;
use File;

use App\Models\Customer;
use App\Models\Pet;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        // $customers = Customer::orderBy('customer_id','ASC')->get();
        //$customers = Customer::orderBy('customer_id','ASC')->paginate(10);
        $customers = Customer::withTrashed()->orderBy('customer_id','DESC')->paginate(10);
        
        return View::make('customer.index',compact('customers'));
       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {

        $validator = Validator::make($request->all(), Customer::$rules);

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
        Customer::create($input);
        return Redirect::to('/customer')->with('success','New Customer added!');



                    // $validator = Validator::make($request->all(), Customer::$rules);

                    // if ($validator->fails()) {
                    //     return redirect()->back()->withInput()->withErrors($validator);
                    // }

                    // if ($validator->passes()) {
                    //     $path = Storage::putFileAs('images/customer', $request->file('image'),$request->file('image')->getClientOriginalName());

                    //     $request->merge(["img_path"=>$request->file('image')->getClientOriginalName()]);

                    //     $input = $request->all();

                    //     if($file = $request->hasFile('image')) {
                    //         $file = $request->file('image') ;
                    //         // $fileName = uniqid().'_'.$file->getClientOriginalName();
                    //         $fileName = $file->getClientOriginalName();
                    //         $destinationPath = public_path().'/images' ;
                    //         // dd($fileName);
                    //         $input['img_path'] = 'images/'.$fileName;            
                    //         $customer = Customer::create($input);
                    //         // dd($customer);
                    //         $file->move($destinationPath,$fileName);
                    //         // $customer = Customer::create($input);
                    //         return Redirect::to('/customer')->with('success','New Customer has been Added!');
                    //     } 

                    // }     
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($customer_id)
    {
        $customer = Customer::find($customer_id);
        return view('customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($customer_id)
    {
        $customer = Customer::find($customer_id);
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer_id)
    {
        $customer = Customer::find($customer_id);

        $validator = Validator::make($request->all(), Customer::$rules);

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
         $customer->update($input);
        return Redirect::to('/customer')->with('success','Customer has been updated!');



















        

        // $customer = Customer::find($customer_id);

        // $input = $request->all();

        //  $request->validate([
        //     'image' => 'image' 
        // ]);

        //  if($file = $request->hasFile('image')) {
        //     $file = $request->file('image') ;

        //     $fileName = uniqid().'_'.$file->getClientOriginalName();

        //     $destinationPath = public_path().'/images';
           
        //     $input['img_path'] = $fileName;
            
        //     $file->move($destinationPath,$fileName);
        // }

        // $customer->update($input);
        // return Redirect::to('/customer')->with('success','Customer has been updated!');





        // $customer = Customer::find($customer_id);

        // $validator = Validator::make($request->all(), Customer::$rules);
        
        // if ($validator->fails()) {
            
        //     return redirect()->back()->withInput()->withErrors($validator);
        // }

        // if ($validator->passes()) {
        //                 $path = Storage::putFileAs('images/customer', $request->file('image'),$request->file('image')->getClientOriginalName());

        //                 $request->merge(["img_path"=>$request->file('image')->getClientOriginalName()]);


        //                 $input = $request->all();

        //                 if($file = $request->hasFile('image')) {
        //                     $file = $request->file('image') ;
        //                     $fileName = $file->getClientOriginalName();
        //                     $destinationPath = public_path().'/images' ;
        //                     // dd($fileName);
        //                     $input['img_path'] = 'images/'.$fileName;            
        //                     $customer->update($input);
        //                     // dd($customer);
        //                     $file->move($destinationPath,$fileName);
        //                     return Redirect::to('/customer')->with('success','Customer has been updated!');
        //                 } 
        //             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer_id)
    {
        Customer::where('customer_id',$customer_id)->delete();
        Pet::destroy($customer_id);
        return Redirect::to('/customer')->with('success','Customer deleted!');
        // $customer = Customer::findOrFail($customer_id);
        // $customer->delete();
        // return Redirect::to('/customer')->with('success','Customer deleted!');
    }
    public function restore($customer_id) {

        Customer::withTrashed()->where('customer_id',$customer_id)->restore();
        return  Redirect::route('customer.index')->with('success','customer restored successfully!');
    }
}