<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'picture',
        'title',
        'description',
        'category',
        'duration',
        'state',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
