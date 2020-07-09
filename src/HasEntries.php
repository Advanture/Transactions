<?php

namespace Advanture\Transactions;

trait HasEntries
{
    public function entries()
    {
        return $this->morphMany(config('transactions.models.entry'), 'entriable');
    }

    public function transfer(Model $debit, int $amount)
    {
        if(!$amount > 0) return false;

        $type = config('transactions.models.type')::where('label', '=', 'transfer')->first();
        $transaction = config('transactions.models.transaction')::create(['type_id' => $type->id]);
        $this->entries()->create(['transaction_id' => $transaction->id, 'amount' => 0 - $amount]);
        $debit->entries()->create(['transaction_id' => $transaction->id, 'amount' => $amount]);

        return true;
    }

    public function balance()
    {
        return $this->entries()->sum('amount') ?? 0;
    }
}