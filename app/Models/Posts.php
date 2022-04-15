<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'post_icon',
    ];

    protected $table ='posts';

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }

    public function post_photo()
    {
        return $this->hasOne(Posts::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
