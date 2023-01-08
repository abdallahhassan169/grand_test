<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model 
{

    protected $table = 'tags';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('title');

    public function ads(){
        return $this->belongsToMany('App\Models\Advertise');
    }

}