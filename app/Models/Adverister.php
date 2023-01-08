<?php

namespace App\Models;
use App\Models\Advertise;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adverister extends Model
{
    use HasFactory;
    protected $table = 'adveristers';
    public $timestamps = true;
    protected $fillable = array('name', 'email');

    public function ads(){
        return $this->hasMany('App\Models\Advertise');
    }

}
