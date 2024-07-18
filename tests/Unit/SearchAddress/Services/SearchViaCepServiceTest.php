<?php

namespace Tests\Unit\SearchAddress\Services;

use App\Domain\SearchViaCep\Services\SearchViaCepService;
use App\Integration\SearchAddress\SearchAddressInterface;
use Exception;
use ReflectionClass;
use Tests\TestCase;

class SearchViaCepServiceTest extends TestCase
{
    public function testShouldReturnAddressWithSuccess(): void
    {
        $searchViaCepService = new SearchViaCepService();

        $searchAddressMock = $this->createMock(SearchAddressInterface::class);
        $searchAddressMock->method('findCep')->willReturn([
            'cep' => '99999999',
            'label' => 'Label Teste',
            'logradouro' => 'Rua Teste',
            'complemento' => 'Complemento Teste',
            'bairro' => 'Bairro Teste',
            'localidade' => 'Localidade Test',
            'uf' => 'SP',
            'ibge' => '9999999',
            'gia' => '9999',
            'ddd' => '99',
            'siafi' => '9999',
        ]);

        $reflection = new ReflectionClass(SearchViaCepService::class);
        $property = $reflection->getProperty('searchAddress');
        $property->setAccessible(true);
        $property->setValue($searchViaCepService, $searchAddressMock);

        $output = $searchViaCepService->findAddressByCeps('99999999');
        $first = $output->first()->jsonSerialize();

        $this->assertEquals('99999999', $first['cep']);
        $this->assertEquals('Label Teste', $first['label']);
        $this->assertEquals('Rua Teste', $first['logradouro']);
        $this->assertEquals('Complemento Teste', $first['complemento']);
        $this->assertEquals('Bairro Teste', $first['bairro']);
        $this->assertEquals('Localidade Test', $first['localidade']);
        $this->assertEquals('SP', $first['uf']);
        $this->assertEquals('9999999', $first['ibge']);
        $this->assertEquals('9999', $first['gia']);
        $this->assertEquals('99', $first['ddd']);
        $this->assertEquals('9999', $first['siafi']);
    }

    public function testShouldFailIfCepIsInvalid(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('O 1° cep é inválido, por favor informe ceps válidos');

        $searchViaCepService = new SearchViaCepService();
        $searchViaCepService->findAddressByCeps('9999999');
    }
}
