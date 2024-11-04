<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banknote;

class BanknoteSeeder extends Seeder
{
    public function run()
    {
        Banknote::create(['value' => 200, 'quantity' => 10]);
        Banknote::create(['value' => 100, 'quantity' => 10]);
        Banknote::create(['value' => 50, 'quantity' => 10]);
        Banknote::create(['value' => 20, 'quantity' => 10]);
        Banknote::create(['value' => 10, 'quantity' => 10]);
        Banknote::create(['value' => 5, 'quantity' => 10]);
    }
}

