<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Rol extends Authenticatable
{
    protected $table = 'rols';
    protected $fillable = 'name';


   

    public function users(){
        // 1:N
        return $this->hasMany('App\Users');
        

        
    




}
