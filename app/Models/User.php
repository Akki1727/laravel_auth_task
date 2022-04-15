<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens;


    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function usersprofile(){
        return $this->hasOne(UserProfile::class);
    }

    // public function username(){
    //     return $this->hasMany(Posts::class,'user_id','id');
    // }



    public function posts(){
        return $this->hasMany(Posts::class);
    }


}
