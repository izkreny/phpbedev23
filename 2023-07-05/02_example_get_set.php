<?php

class BankAccount
{
    // Private attributes
    private $owner;
    private $state;

    // Public methods
    // Setter
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    // Getter
    public function getOwner()
    {
        return $this->owner;
    }

    // Setter
    public function setState($state)
    {
        $this->state = $state;
    }

    // Getter
    public function getState()
    {
        return $this->state;
    }
}

$account = new BankAccount();
$account->setOwner("John Doe");
$account->setState(1000);

echo "Owner of the account is: " . $account->getOwner() . PHP_EOL;
echo "Account state is: " . $account->getState() . PHP_EOL;
