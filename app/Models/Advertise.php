<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertise extends Model 
{

    protected $table = 'advirtesments';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('type', 'category_id', 'title', 'description', 'adverister', 'start_date');

    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function adverister(){
        return $this->belongsTo('App\Models\Adverister');
    }

}