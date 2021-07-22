<?php

namespace App\Models;

class Financeiras extends Model
{
    public function __construct()
    {
        $this->data = collect([
            [
                "chave" => "PAN",
                "valor" => "Pan"
            ],
            [
                "chave" => "OLE",
                "valor" => "Ole"
            ],
            [
                "chave" => "BMG",
                "valor" => "Bmg"
            ]
        ]);
    }
}