<?php

namespace Advanture\Transactions\Models;

use Advanture\Transactions\HasEntries as HasEntries;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasEntries;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email'
    ];
}