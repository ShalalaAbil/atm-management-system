<?php

namespace App\Repositories;

use App\Interfaces\AccountRepositoryInterface;
use App\Models\Account;


class AccountRepository implements AccountRepositoryInterface
{
    public function find($id)
    {
        return Account::findOrFail($id);
    }

    public function updateBalance($id, $newBalance)
    {
        $account = $this->find($id);
        $account->balance = $newBalance;
        $account->save();
    }
}

