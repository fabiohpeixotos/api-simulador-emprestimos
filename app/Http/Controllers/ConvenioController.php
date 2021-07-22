<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Services\ConvenioService;

class ConvenioController extends Controller
{
    public function index(ConvenioService $convenio): Response
    {
        return response()->json($convenio->getConvenios());
    }
}