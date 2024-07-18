<?php

namespace App\Integration\SearchAddress;

interface SearchAddressInterface
{
    public function findCep(string $cep): array;
}
