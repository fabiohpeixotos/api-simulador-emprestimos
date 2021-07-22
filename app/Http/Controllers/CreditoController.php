<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\{FinanceiraService, ConvenioService, TaxaService};
use App\Http\Requests\CreditoRequest;

class CreditoController extends Controller
{
    public function index(
        CreditoRequest $request,
        TaxaService $taxa
    )
    {
        $data = $request->validated();
        
        $result = $taxa->calculate(
            $data['valor_emprestimo'],
            $data['instituicoes'] ?? [], 
            $data['convenios'] ?? [], 
            $data['parcela'] ?? 0
        );
        
        return response()->json($result); 
    }
}