<?php

namespace Advanture\Transactions\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'label',
    ];

    public function transaction()
    {
        return $this->hasMany(Models\Transaction::class);
    }
}
