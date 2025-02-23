<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;   
use Validator;
use Redirect;
use Storage;
use File;
use DB;

use App\Models\Employee;
use App\Models\Pet;
use App\Models\Disease;
use App\Models\Consultation;



use Auth;


class ConsultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = DB::table('health_consultation')

            ->leftJoin('pets','pets.pet_id','=','health_consultation.pet_id')
            ->leftJoin('disease_injuries','disease_injuries.disease_id','=','health_consultation.disease_id')
            ->leftJoin('employees','employees.emp_id','=','health_consultation.emp_id')
            ->select('health_consultation.consult_id','employees.lname','pets.pname','pets.gender','pets.age','disease_injuries.disease_name','health_consultation.observation','health_consultation.consult_cost','health_consultation.deleted_at')
            ->orderBy('consult_id','DESC')
            ->paginate(10);
            // ->get();

        // dd($consultations);
        return View::make('consult.index',compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pets = Pet::pluck('pname','pet_id');
        $diseases = Disease::pluck('disease_name','disease_id');
         return View::make('consult.create',compact('pets','diseases'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {    
    //     //$users = Auth::user()->id;
    //     // $user =  Employee::where('employees.user_id','=',$users);
    //     $users = Auth::user();
    //     $employees = DB::table('employees')

    //         ->leftJoin('users', 'id','employees.user_id')
    //         ->select('employees.emp_id')
    //         ->where('employees.user_id','=',$users)
    //         ->get();
            
    //     //try {
    //         //DB::beginTransaction();
    //         $consultations = new Consultation;

    //         //pinakamalapit
    //         //$consultations->emp_id = Employee::where(Auth::user()->first());
    //         $consultations->pet_id = $request->pet_id;
    //         $consultations->disease_id = $request->disease_id;
    //         $consultations->consult_cost = $request->consult_cost;
    //         $consultations->observation = $request->observation;
    //         // $consultations->emp_id = 14;
    //         //$consultations->emp_id = Auth::user()->id;
    //         //$consultations = Employee::where('user_id', Auth::id())->first();
    //         //$consultations =  Employee::where('user_id', Auth::id())->first();
    //         //$consultations =  Employee::where($employees, Auth::id())->first();
    //         //dd($consultations);
    //         $consultations->save();

    //         //dd($input);
    //          // $user =  Employee::where('user_id', Auth::id())->first();
    //         //$user =  User::where('emp_id', Auth::emp_id())->first();
    //     //}
    //     //catch (\Exception $e) {
                    
    //                 //DB::rollback();
    //                 //return redirect()->route('consult.create')->with('error', $e->getMessage());
    //             // }
            
    //     //DB::commit();
    //     return redirect()->route('consult.index')->with('success','New consultation added!');
    // }
    
public function store(Request $request)
{    
    $users = Auth::user();

    // Fetch the emp_id of the logged-in user
    $employee = DB::table('employees')
        ->where('user_id', Auth::id())
        ->select('emp_id')
        ->first();

    // Ensure the employee exists
    if (!$employee) {
        return redirect()->route('consult.create')->with('error', 'Employee record not found!');
    }

    // Create a new consultation entry
    $consultations = new Consultation;
    $consultations->emp_id = $employee->emp_id; // Now correctly assigning emp_id
    $consultations->pet_id = $request->pet_id;
    $consultations->disease_id = $request->disease_id;
    $consultations->consult_cost = $request->consult_cost;
    $consultations->observation = $request->observation;

    // Save the consultation
    $consultations->save();

    return redirect()->route('consult.index')->with('success', 'New consultation added!');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($consult_id)
    {
        $consultations = DB::table('health_consultation')

            ->leftJoin('pets','pets.pet_id','=','health_consultation.pet_id')
            ->leftJoin('disease_injuries','disease_injuries.disease_id','=','health_consultation.disease_id')
            ->leftJoin('employees','employees.emp_id','=','health_consultation.emp_id')
            ->select('health_consultation.consult_id','employees.lname','pets.pname','pets.gender','pets.age','pets.img_path','disease_injuries.disease_name','health_consultation.consult_cost','health_consultation.observation','health_consultation.deleted_at')
            ->where('health_consultation.consult_id', '=', $consult_id)
            ->get();

        // dd($consultations);
        return View::make('consult.show',compact('consultations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($consult_id)
    {
        $consultations = Consultation::find($consult_id);
        $pets = Pet::pluck('pname','pet_id');
        $diseases = Disease::pluck('disease_name','disease_id');
        return View::make('consult.edit',compact('consultations','pets','diseases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $consult_id)
    {
         try {
            DB::beginTransaction();
            $consultations = Consultation::find($consult_id);
            $input = $request->all();
            $input['emp_id'] = Auth::user()->emp_id;
            //dd($input);
            $consultations->update($input);
        }
        catch (\Exception $e) {
                    
                    DB::rollback();
                    return redirect()->route('consult.edit')->with('error', $e->getMessage());
                }

        DB::commit();
        return redirect()->route('consult.index')->with('success','Consultation has been Updated!');
    
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($consult_id)
    {
        $consultations = Consultation::findOrFail($consult_id);
        $consultations->delete();
        return Redirect::to('/consult')->with('success','Consultation Deleted!');
    }
    public function restore($consult_id) {
        $consultation = Consultation::withTrashed()->where('consult_id',$consult_id)->restore();
        return  Redirect::route('consult.index')->with('success','consultation Restored Successfully!');
    }

    public function search(Request $request){
        // $searching = $request->get('consultation');
          $searching = $request->get('query'); 
        // $searching = $_GET['query'];
        //Select pets table
         $pet = DB::table('pets')

            ->leftJoin('customers','customers.customer_id','=','pets.customer_id')
            ->leftJoin('pet_breed','pet_breed.petb_id','=','pets.petb_id')
            ->select('pets.pet_id','customers.fname','pets.pname','pets.gender','pets.age', 'pet_breed.pbreed','pets.img_path')
            ->where('pname','LIKE', '%' .$searching. '%')
            ->get();

            //Select health_consultation table
            $consultations = DB::table('health_consultation')

            ->leftJoin('pets','pets.pet_id','=','health_consultation.pet_id')
            ->leftJoin('disease_injuries','disease_injuries.disease_id','=','health_consultation.disease_id')
            ->leftJoin('employees','employees.emp_id','=','health_consultation.emp_id')
            ->select('health_consultation.consult_id','employees.lname','pets.pname','pets.gender','pets.age','disease_injuries.disease_name','health_consultation.observation','health_consultation.consult_cost','health_consultation.deleted_at')
             ->where('pname','LIKE', '%' .$searching. '%')
            ->get();

        return View::make('consult.search',compact('pet','consultations'));


    }
    
}
