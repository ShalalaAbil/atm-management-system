<?php

namespace App\Services;

use App\UseCases\WithdrawCash;

class AtmService
{
    private $withdrawCash;

    public function __construct(WithdrawCash $withdrawCash)
    {
        $this->withdrawCash = $withdrawCash;
    }

    public function withdraw($accountId, $amount)
    {
        return $this->withdrawCash->execute($accountId, $amount);
    }
}
