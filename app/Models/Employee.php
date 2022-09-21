<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Employee extends Model
{
    use HasFactory;
    use softDeletes;

    public $table = 'employees';
    public $primaryKey = 'emp_id';
    public $timestamps = true;

    protected $guarded = ['emp_id','email','password'];
    protected $fillable = ['user_id','fname','lname',
        'title','addressline','town','zipcode',
        'phone','email','password','img_path'
    ];

   public static $rules = [ 
                'lname'=>'required|alpha',
                'fname'=>'required',
                'addressline'=>'required',
                'phone'=>'numeric',
                'town'=>'required',
                'zipcode'=>'required',
                'email'=>'required',
                'password'=>'required',
                'image' => '|image|mimes:jpeg,png,jpg,gif,svg'
             ];
}
