<?php

namespace App\Services;

use App\Models\Financeiras;

class FinanceiraService
{
    private Financeiras $financeiras;

    public function __construct(Financeiras $financeiras)
    {
        $this->financeiras = $financeiras;
    }

    public function getFinanceiras(): array
    {
        return $this->financeiras->getData()->all();
    }
}