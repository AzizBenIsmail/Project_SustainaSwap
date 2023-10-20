<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = [
        'tradeStartDate',
        'tradeEndDate',
        'status',
        'owner_id',
        'offered_item_id',
        'requested_item_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function offeredItem()
    {
        return $this->belongsTo(Item::class, 'offered_item_id');
    }

    public function requestedItem()
    {
        return $this->belongsTo(Item::class, 'requested_item_id');
    }
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

}
