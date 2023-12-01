<?php

namespace Bank;

class Account
{
    public function showState()
    {
        echo "State of account." . PHP_EOL;
    }
}

class Transaction
{
    public function executeTransaction()
    {
        echo "Executing transaction..." . PHP_EOL;
    }
}

use \Bank\Account as BA;
use \Bank\Transaction as BT;

$account = new BA();
$trans = new BT();

$account->showState();
$trans->executeTransaction();
