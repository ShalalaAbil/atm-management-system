<?php

namespace App\UseCases;

use App\Interfaces\AccountRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\BanknoteRepositoryInterface;

class WithdrawCash
{
    private $accountRepository;
    private $transactionRepository;
    private $banknoteRepository;

    public function __construct(
        AccountRepositoryInterface $accountRepository,
        TransactionRepositoryInterface $transactionRepository,
        BanknoteRepositoryInterface $banknoteRepository
    ) {
        $this->accountRepository = $accountRepository;
        $this->transactionRepository = $transactionRepository;
        $this->banknoteRepository = $banknoteRepository;
    }

    public function execute($accountId, $amount)
    {   
        $account = $this->accountRepository->find($accountId);

        if ($amount > $account->balance) {
            throw new \Exception("Insufficient balance.");
        }

        $banknotesToDispense = $this->calculateBanknotes($amount);
        if ($banknotesToDispense === null) {
            throw new \Exception("Unable to dispense the requested amount with available banknotes.");
        }

        $account->balance -= $amount;
        
        $this->accountRepository->updateBalance($account->id, $account->balance);
        $this->transactionRepository->create($accountId, $amount, 'withdrawal');

        // Update the banknote quantities based on dispensed notes
        foreach ($banknotesToDispense as $value => $quantity) {
            $banknote = $this->banknoteRepository->findByValue($value);
            $newQuantity = $banknote->quantity - $quantity;
            $this->banknoteRepository->updateQuantity($banknote->id, $newQuantity);
        }

        return $banknotesToDispense;
    }

    protected function calculateBanknotes($amount)
    {
        $availableBanknotes = $this->banknoteRepository->getAll();
        $banknotesToDispense = [];
        $remainingAmount = $amount;

        foreach ($availableBanknotes as $banknote) {
            $banknoteValue = $banknote->value;
            $neededBanknotes = 0;

            while ($remainingAmount >= $banknoteValue && $banknote->quantity > 0) {
                $remainingAmount -= $banknoteValue;
                $banknote->quantity--;
                $neededBanknotes++;
            }

            if ($neededBanknotes > 0) {
                $banknotesToDispense[$banknoteValue] = $neededBanknotes;
            }
        }

        return $remainingAmount == 0 ? $banknotesToDispense : null;
    }
}
