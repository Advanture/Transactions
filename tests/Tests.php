<?php


namespace Advanture\Transactions\Tests;


use Advanture\Transactions\TransactionsService;
use Advanture\Transactions\Models\Account;
use Illuminate\Support\Facades\DB;

class Tests extends TestCase
{

    private $account_first;
    private $account_second;

    protected function setUp(): void
    {
        parent::setUp();
        $this->account_first = Account::create(['name' => 'Nikita', 'email' => 'nikita@mail.ru']);
        $this->account_second = Account::create(['name' => 'Roman', 'email' => 'romka@mail.ru']);
    }

    public function test_transactions_sum()
    {
        $this->account_first->transfer($this->account_second, 100);
        $this->account_second->transfer($this->account_first, 150);

        $this->assertTrue(DB::table('entries')->sum('amount') == 0); // Пробный баланс

        $this->assertTrue($this->account_first->balance() == 50); // Баланс аккаунта
        $this->assertTrue($this->account_second->balance() == -50); // Баланс аккаунта
    }
}
