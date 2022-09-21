<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $table = 'comment_reviews';
    public $primaryKey = 'comment_id';
    public $timestamps = true;

    protected $guarded = ['comment_id'];
    protected $fillable = ['comment','service_id'];

    public static $rules = [ 
               'comment' =>'required',
               'service_id'=>'required'
           ];
}
