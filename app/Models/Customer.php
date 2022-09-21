<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use softDeletes;

    public $table = 'customers';
    public $primaryKey = 'customer_id';
    public $timestamps = true;

    protected $guarded = ['customer_id','img_path'];
    protected $fillable = ['fname','lname',
        'title','addressline','town','zipcode',
        'phone','img_path'
    ];

   public static $rules = [ 
               'title' =>'required|min:3',
               'lname'=>'required|alpha',
               'fname'=>'required',
                'addressline'=>'required',
                'phone'=>'numeric',
                'town'=>'required',
                'zipcode'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
             ];
}