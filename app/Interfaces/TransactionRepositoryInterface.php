<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function create($accountId, $amount, $type);
}

