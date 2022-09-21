<?php

namespace App\Http\Controllers;

use App\Models\GroomingService;
use Illuminate\Http\Request;
use View;   
use Validator;
use Redirect;
use Storage;
use File;
use Auth;

class GroomingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $services = GroomingService::withTrashed()->orderBy('service_id','DESC')->paginate(10);
        
            return View::make('service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return View::make('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), GroomingService::$rules);

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
        GroomingService::create($input);
        return Redirect::to('/service')->with('success','New Grooming Service added!');







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

        // Groomingservice::create($input);
        // return Redirect::to('/service')->with('success','New Grooming Service added!');

}



         // $validator = Validator::make($request->all(), GroomingService::$rules);

         //            if ($validator->fails()) {
         //                return redirect()->back()->withInput()->withErrors($validator);
         //            }

         //            if ($validator->passes()) {
         //                $path = Storage::putFileAs('images/service', $request->file('image'),$request->file('image')->getClientOriginalName());

         //                $request->merge(["img_path"=>$request->file('image')->getClientOriginalName()]);

         //                $input = $request->all();

         //                if($file = $request->hasFile('image')) {
         //                    $file = $request->file('image') ;
         //                    // $fileName = uniqid().'_'.$file->getClientOriginalName();
         //                    $fileName = $file->getClientOriginalName();
         //                    $destinationPath = public_path().'/images' ;
         //                    // dd($fileName);
         //                    $input['img_path'] = 'images/'.$fileName;            
         //                    $service = GroomingService::create($input);
         //                    // dd($customer);
         //                    $file->move($destinationPath,$fileName);
         //                    return Redirect::to('/service')->with('success','New Service has been Added!');
                    //     } 

                    // }     
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroomingService  $groomingService
     * @return \Illuminate\Http\Response
     */
    public function show($service_id)
    {
       $service = GroomingService::find($service_id);
        return view('service.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroomingService  $groomingService
     * @return \Illuminate\Http\Response
     */
    public function edit($service_id)
    {
        $service = GroomingService::find($service_id);
        return view('service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroomingService  $groomingService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service_id )
    {
        $service = GroomingService::find($service_id);

        $validator = Validator::make($request->all(), GroomingService::$rules);

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
         $service->update($input);
       return Redirect::to('/service')->with('success','Grooming service has been updated!');



        // $service = GroomingService::find($service_id);

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

        // $service->update($input);
        // return Redirect::to('/service')->with('success','Grooming service has been updated!');

        // $service = GroomingService::find($service_id);

        // $validator = Validator::make($request->all(), GroomingService::$rules);
        
        // if ($validator->fails()) {
        //     // dd($validator);
        //     return redirect()->back()->withInput()->withErrors($validator);
        // }

        // if ($validator->passes()) {
        //                 $path = Storage::putFileAs('images/service', $request->file('image'),$request->file('image')->getClientOriginalName());

        //                 $request->merge(["img_path"=>$request->file('image')->getClientOriginalName()]);


        //                 $input = $request->all();

        //                 if($file = $request->hasFile('image')) {
        //                     $file = $request->file('image') ;
        //                     $fileName = $file->getClientOriginalName();
        //                     $destinationPath = public_path().'/images' ;
        //                     // dd($fileName);
        //                     $input['img_path'] = 'images/'.$fileName;            
        //                     $service->update($input);
        //                     // dd($customer);
        //                     $file->move($destinationPath,$fileName);
        //                     return Redirect::to('/service')->with('success','Customer has been updated!');
        //                 } 
        //             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroomingService  $groomingService
     * @return \Illuminate\Http\Response
     */
    public function destroy($service_id)
    {
        $service = GroomingService::findOrFail($service_id);
        $service->delete();
        return Redirect::to('/service')->with('success','Service deleted!');
    }
    public function restore($service_id) {

        GroomingService::withTrashed()->where('service_id',$service_id)->restore();
        return  Redirect::route('service.index')->with('success','service restored successfully!');
    }
}
