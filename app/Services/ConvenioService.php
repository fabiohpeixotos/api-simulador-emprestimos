<?php

namespace App\Services;

use App\Models\Convenios;

class ConvenioService
{
    private Convenios $convenios;

    public function __construct(Convenios $convenios)
    {
        $this->convenios = $convenios;
    }

    public function getConvenios(): array
    {
        return $this->convenios->getData()->all();
    }
}