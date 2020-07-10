<?php

namespace Advanture\Transactions;

use Illuminate\Database\Eloquent\Model;

trait HasEntries
{
    public function entries()
    {
        return $this->morphMany(Models\Entry::class, 'entriable');
    }

    public function transfer(Model $debit, int $amount)
    {
        if(!$amount > 0) return false;

        $type = Models\Type::where('label', '=', 'transfer')->first();
        $transaction = Models\Transaction::create(['type_id' => $type->id]);
        $this->entries()->create(['transaction_id' => $transaction->id, 'amount' => 0 - $amount]);
        $debit->entries()->create(['transaction_id' => $transaction->id, 'amount' => $amount]);

        return true;
    }

    public function balance()
    {
        return $this->entries()->sum('amount') ?? 0;
    }
}