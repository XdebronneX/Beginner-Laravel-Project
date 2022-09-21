<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public $table = 'grooming_info';
    public $primaryKey = 'groominginfo_id';
    public $timestamps = true;

    protected $guarded = ['groominginfo_id'];
    protected $fillable = ['pet_id'];

   public static $rules = [ 
                'pet_id'=>'required'
             ];
}
