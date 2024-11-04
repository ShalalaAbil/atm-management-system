<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function create($accountId, $amount, $type)
    {
        Transaction::create([
            'account_id' => $accountId,
            'amount' => $amount,
            'type' => $type,
        ]);
    }
}
