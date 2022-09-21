<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use HasFactory;
    use softDeletes;

    public $table = 'health_consultation';
    public $primaryKey = 'consult_id';
    public $timestamps = true;

    protected $guarded = ['consult_id','img_path'];
    protected $fillable = ['pet_id','disease_id',
        'emp_id','observation','consult_cost'
    ];

   public static $rules = [ 
                'pet_id' =>'required',
                'disease_id'=>'required',
                'emp_id'=>'required',
                'observation'=>'required',
                'consult_cost'=>'numeric',
             ];
}
