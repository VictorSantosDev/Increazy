<?php

namespace App\Domain\SearchViaCep\Services;

use App\Domain\SearchViaCep\Factories\Factory\AddressFactory;
use App\Integration\SearchAddress\SearchAddressInterface;
use App\Integration\SearchAddress\ViaCep\ViaCep;
use Exception;
use Illuminate\Support\Collection;

class SearchViaCepService
{
    private SearchAddressInterface $searchAddress;

    public function __construct()
    {
        $this->searchAddress = new ViaCep;
    }

    public function findAddressByCeps(string $ceps): Collection
    {
        $ceps = $this->formatted($ceps);
        return $this->agroupAddress($ceps);
    }
    
    private function agroupAddress(array $ceps): Collection
    {
        try{
            $collectionAddress = collect();
            $addressFactory = new AddressFactory;
            foreach ($ceps as $cep) {
                $response = $this->searchAddress->findCep($cep);
                $collectionAddress->push($addressFactory->getAddress(
                    cep: $response['cep'] ?? null,
                    label: $response['label'] ?? null,
                    logradouro: $response['logradouro'] ?? null,
                    complemento: $response['complemento'] ?? null,
                    bairro: $response['bairro'] ?? null,
                    localidade: $response['localidade'] ?? null,
                    uf: $response['uf'] ?? null,
                    ibge: $response['ibge'] ?? null,
                    gia: $response['gia'] ?? null,
                    ddd: $response['ddd'] ?? null,
                    siafi: $response['siafi'] ?? null
                ))->jsonSerialize();
            }
            return $collectionAddress;
        }catch (Exception $e) {
            throw $e;
        }
    }

    private function formatted(string $ceps): array
    {
        $ceps = str_replace('-', '', $ceps);
        $collectionCeps = explode(',', $ceps);
        $collectionCepsUnique = array_unique($collectionCeps);
        foreach ($collectionCepsUnique as $key => $cep) {
            $this->validationCep($cep, $key);
        }

        return $collectionCepsUnique;
    }

    private function validationCep(string $cep, int $positon): void
    {
        $positon += 1;

        if (strlen($cep) !== 8) {
            throw new Exception("O {$positon}° cep é inválido, por favor informe ceps válidos");
        }
    }
}
