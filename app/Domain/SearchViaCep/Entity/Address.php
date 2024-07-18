<?php

namespace App\Domain\SearchViaCep\Entity;
use JsonSerializable;

class Address implements JsonSerializable
{
    public function __construct(
        private ?string $cep,
        private ?string $label,
        private ?string $logradouro,
        private ?string $complemento,
        private ?string $bairro,
        private ?string $localidade,
        private ?string $uf,
        private ?string $ibge,
        private ?string $gia,
        private ?string $ddd,
        private ?string $siafi
    ) {}

    public function jsonSerialize(): mixed
    {
        return [
            'cep' => $this->cep,
            'label' => $this->label,
            'logradouro' => $this->logradouro,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'localidade' => $this->localidade,
            'uf' => $this->uf,
            'ibge' => $this->ibge,
            'gia' => $this->gia,
            'ddd' => $this->ddd,
            'siafi' => $this->siafi,
        ];
    }
}
