<?php

namespace App\Interfaces;

interface BanknoteRepositoryInterface
{
    public function getAll();

    public function updatequantity($id, $newQuantity);

    public function findByValue($value);

   
}

