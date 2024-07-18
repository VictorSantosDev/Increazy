<?php

namespace App\Domain\SearchViaCep\Factories\Factory;

use App\Domain\SearchViaCep\Entity\Address;

abstract class AddressAbstract
{
    abstract public function getAddress(): Address;
}
