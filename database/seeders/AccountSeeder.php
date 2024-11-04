<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        // Creating 5 accounts with initial balances
        Account::create(['balance' => 250.00]);
        Account::create(['balance' => 500.00]);
        Account::create(['balance' => 1000.00]);
        Account::create(['balance' => 150.00]);
        Account::create(['balance' => 300.00]);
    }
}
