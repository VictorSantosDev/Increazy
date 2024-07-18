<?php

namespace App\Domain\SearchViaCep\Factories\Factory;

use App\Domain\SearchViaCep\Entity\Address;

class AddressFactory
{
    public function getAddress(
        ?string $cep,
        ?string $label,
        ?string $logradouro,
        ?string $complemento,
        ?string $bairro,
        ?string $localidade,
        ?string $uf,
        ?string $ibge,
        ?string $gia,
        ?string $ddd,
        ?string $siafi
    ): Address {
        return new Address(
            cep: $cep,
            label: $label,
            logradouro: $logradouro,
            complemento: $complemento,
            bairro: $bairro,
            localidade: $localidade,
            uf: $uf,
            ibge: $ibge,
            gia: $gia,
            ddd: $ddd,
            siafi: $siafi
        );
    }
}
