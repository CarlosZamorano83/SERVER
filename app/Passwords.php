<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'passwords';
    protected $fillable = ['title', 'password', 'id_usuario','id_category'];


    public function users(){
        // N:1
        return $this->belongsTo('App\Users');

    }

    public function categories(){
        // N:1
        return $this->belongsTo('App\Categories');
        

        
    }

    


}