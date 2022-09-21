<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disease extends Model
{
    use HasFactory;
    use softDeletes;

    public $table = 'disease_injuries';
    public $primaryKey = 'disease_id';
    public $timestamps = true;

    protected $guarded = ['disease_id'];
    protected $fillable = ['disease_name'];
    public static $rules = ['disease_name'=>'required'];
}
