<?php

namespace App\Repositories;

use App\Interfaces\BanknoteRepositoryInterface;
use App\Models\Banknote;

class BanknoteRepository implements BanknoteRepositoryInterface
{
    public function getAll()
    {
        return Banknote::all();
    }

    public function updateQuantity($id, $newQuantity) {
        $banknote = Banknote::find($id);
        if (!$banknote) {
            throw new \Exception("Banknote with ID {$id} not found.");
        }
        $banknote->quantity = $newQuantity;
        $banknote->save();
    }
    
    


    public function findByValue($value)
    {
        return Banknote::where('value', $value)->first();
    }
}


