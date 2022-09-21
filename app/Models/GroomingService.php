<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroomingService extends Model
{
    use HasFactory;
    use softDeletes;

    public $table = 'grooming_service';
    public $primaryKey = 'service_id';
    public $timestamps = true;

    protected $guarded = ['service_id','img_path'];
    protected $fillable = ['service_name','service_cost','img_path'];

   public static $rules = [ 
                'service_name'=>'required',
                'service_cost'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
             ];
}