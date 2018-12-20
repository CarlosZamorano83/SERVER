<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];


    public function users(){
        // N:1
        return $this->belongsTo('App\Users');

    }

    

    public function passwords(){
        // 1:N
        return $this->hasMany('App\Passwords');


        
    }




}
