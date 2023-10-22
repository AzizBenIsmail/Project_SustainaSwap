<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    // The role is connected to many users and each user has only one role
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
