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
        'category_id',
        'state',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeOrderByState($query)
    {
        return $query->orderByRaw("CASE
        WHEN state = 'Good' THEN 1
        WHEN state = 'Medium' THEN 2
        WHEN state = 'Bad' THEN 3
        ELSE 4
    END");    }

}
