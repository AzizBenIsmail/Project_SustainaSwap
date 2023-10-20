<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $fillable = ['comment', 'trade_id'];

    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }
}
