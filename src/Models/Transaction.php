<?php

namespace Advanture\Transactions\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'type_id',
    ];

    public function entries()
    {
        return $this->hasMany(config('transactions.models.entry'));
    }

    public function type()
    {
        return $this->belongsTo(config('transactions.models.type'));
    }
}
