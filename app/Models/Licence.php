<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Licence extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_key',
        'days',
        'is_demo',
        'is_active',
        'hard_drive_number'
    ];

    public function client(): HasOne
    {
        return $this->hasOne(Client::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
