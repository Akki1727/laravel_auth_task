<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gender',
        'address',
        'profile_photo',
        'birth_date'
    ];
}
