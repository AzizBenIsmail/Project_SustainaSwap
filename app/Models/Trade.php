<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = [
        
        'owner',
        'offeredItem',
        'requestedItem',
        'proposalDate',
        'status',
        'timestamps',
        
    ];


    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    public function offeredItem()
{
    return $this->belongsTo(Item::class, 'offeredItem');
}

public function requestedItem()
{
    return $this->belongsTo(Item::class, 'requestedItem');
}
}
