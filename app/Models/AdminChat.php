<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminChat extends Model
{
    protected $fillable = ['name', 'content'];


    
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
