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
use App\Models\User;
use Auth;

class EmployeeController extends Controller
{
    public function getSignup(){
        return view('employee.signup');
    }
     public function postSignup(Request $request){

        $this->validate($request, [
            'email' => 'email| required| unique:users',
            'password' => 'required| min:4',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

         $user = new User([
            'name' => $request->input('fname').' '. $request->lname,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

         $user->save();

         $employee = new Employee;
         $employee->user_id = $user->id;
         $employee->fname = $request->fname;
         $employee->lname = $request->lname; 
         $employee->addressline = $request->addressline;
         $employee->town = $request->town; 
         $employee->zipcode = $request->zipcode; 
         $employee->phone = $request->phone; 
         //$input = $request->all();

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
    
        
         $employee->img_path= $input['img_path'];  
         $employee->save();
         Auth::login($user);
         return redirect()->route('employee.profile');
    }
    
    public function getProfile(){
        $profile = Auth::user()->id;
        $employees = DB::table('employees')

            ->leftJoin('users', 'id','employees.user_id')
            ->select('employees.emp_id','users.email','employees.fname', 'employees.lname','employees.addressline','employees.phone','employees.town','employees.zipcode','employees.img_path','employees.deleted_at')
            ->where('employees.user_id','=',$profile)
            ->get();
        return view('employee.profile',compact('employees'));
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/signin');
    }

    public function getSignin(){
        return view('employee.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'email| required',
            'password' => 'required| min:4'
        ]);
         if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')])){
            return redirect()->route('employee.profile');
        }
        else
        {
            return redirect()->back();
        };
     }
     public function index()
{
    $employees = DB::table('employees')
        ->leftJoin('users', 'users.id', '=', 'employees.user_id')
        ->select(
            'employees.emp_id',
            'users.email',
            'employees.fname',
            'employees.lname',
            'employees.addressline',
            'employees.phone',
            'employees.town',
            'employees.zipcode',
            'employees.img_path',
            'employees.deleted_at'
        )
        ->orderBy('employees.emp_id', 'DESC')
        ->paginate(10);

    return View::make('employee.index', compact('employees'));
}

//  public function index()
//     {
       
//             $employees = DB::table('employees')
//             ->leftJoin('users', 'id','employees.user_id')
//             ->select('employees.emp_id','users.email','employees.fname', 'employees.lname','employees.addressline','employees.phone','employees.town','employees.zipcode','employees.img_path','employees.deleted_at')
//             ->orderBy('emp_id', 'DESC')
//             ->paginate(10);
//             // ->get();
        
//         return View::make('employee.index',compact('employees'));

//     }

     public function create()
    {
        return View::make('employee.create');
    }


    public function store(Request $request)
    {
       
        $this->validate($request, [
            'email' => 'email| required| unique:users',
            'password' => 'required| min:4',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

         $user = new User([
            'name' => $request->input('fname').' '. $request->lname,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

         $user->save();

         $employee = new Employee;
         $employee->user_id = $user->id;
         $employee->fname = $request->fname;
         $employee->lname = $request->lname; 
         $employee->addressline = $request->addressline;
         $employee->town = $request->town; 
         $employee->zipcode = $request->zipcode; 
         $employee->phone = $request->phone; 
         //$input = $request->all();

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
    
         $employee->img_path= $input['img_path'];  
         $employee->save();
         // return Redirect::to('employee.index')->with('success','New employee added!');
        return redirect()->route('employee.index')->with('success','New Employee Added!');
    }

    public function show($emp_id) {

    $employee = Employee::leftJoin('users', 'users.id', '=', 'employees.user_id')
        ->select(
            'employees.*',
            'users.email as user_email'
        )
        ->where('employees.emp_id', $emp_id)
        ->first();

    return view('employee.show', compact('employee'));
    }


     public function edit($emp_id)
    {
        $employee = Employee::find($emp_id);
        return view('employee.edit',compact('employee'));
    }

     public function update(Request $request, $emp_id)
    {
        $employee = employee::find($emp_id);

        $validator = Validator::make($request->all());
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($validator->passes()) {
                        $path = Storage::putFileAs('images/employee', $request->file('image'),$request->file('image')->getClientOriginalName());

                        $request->merge(["img_path"=>$request->file('image')->getClientOriginalName()]);


                        $input = $request->all();

                        if($file = $request->hasFile('image')) {
                            $file = $request->file('image') ;
                            $fileName = $file->getClientOriginalName();
                            $destinationPath = public_path().'/images' ;
                            // dd($fileName);
                            $input['img_path'] = 'images/'.$fileName;            
                            $employee->update($input);
                            // dd($employee);
                            $file->move($destinationPath,$fileName);
                            return Redirect::to('/employee')->with('success','employee has been updated!');
                        } 
                    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($emp_id)
    {
        $employee = employee::findOrFail($emp_id);
        $employee->delete();
        return Redirect::to('/employee')->with('success','employee deleted!');
    }
    public function restore($emp_id) {

        employee::withTrashed()->where('emp_id',$emp_id)->restore();
        return  Redirect::route('employee.index')->with('success','employee restored successfully!');
    }
}