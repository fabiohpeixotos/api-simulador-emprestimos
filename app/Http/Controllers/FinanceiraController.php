<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Services\FinanceiraService;

class FinanceiraController extends Controller
{    
    public function index(FinanceiraService $financeira): Response
    {
        return response()->json($financeira->getFinanceiras());
    }
}