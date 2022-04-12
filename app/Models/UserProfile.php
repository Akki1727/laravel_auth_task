<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gender',
        'address',
        'profile_photo',
        'birth_date'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}
