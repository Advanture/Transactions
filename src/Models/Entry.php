<?php

namespace Advanture\Transactions\Models;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'entriable_id',
        'entriable_type',
        'transaction_id',
        'amount',
    ];

    public function entriable()
    {
        return $this->morphTo();
    }

    public function transactions()
    {
        return $this->belongsTo(Models\Transaction::class);
    }
}
