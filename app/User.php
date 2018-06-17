<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed description
 */
class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function dates(){
        return $this->hasMany('App\Date');
    }

    public function isAdmin(){
        return $this->is_admin;
    }



}
