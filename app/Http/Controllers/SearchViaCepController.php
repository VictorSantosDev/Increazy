<?php

namespace App\Http\Controllers;

use App\Domain\SearchViaCep\Services\SearchViaCepService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchViaCepController extends Controller
{
    public function __construct(private SearchViaCepService $searchViaCepService) {}

    public function findAddressByCepsAction(string $ceps): JsonResponse
    {
        try {
            $output = $this->searchViaCepService->findAddressByCeps($ceps);

            return response()->json([
                'data' => $output
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
