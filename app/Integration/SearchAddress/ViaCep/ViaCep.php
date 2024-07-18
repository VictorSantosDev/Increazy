<?php

namespace App\Integration\SearchAddress\ViaCep;

use App\Integration\SearchAddress\SearchAddressInterface;
use Exception;
use Illuminate\Support\Facades\Http;

class ViaCep implements SearchAddressInterface
{
    private string $api;

    public function __construct() {
        $this->api = env('URL_VIA_CEP');
    }

    public function findCep(string $cep): array
    {
        try{
            $response = Http::get(str_replace('{cep}', $cep, $this->api));
            return $response->json();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        };
    }
}
