<?php

namespace App\Interfaces;

interface AccountRepositoryInterface
{
    public function find($id);
    public function updateBalance($id, $newBalance);
}
