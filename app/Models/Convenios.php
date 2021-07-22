<?php

namespace App\Models;

class Convenios extends Model
{
    public function __construct()
    {
        $this->data = collect([
            [
                [
                    "chave" => "INSS",
                    "valor" => "INSS"
                ],
                [
                    "chave" => "FEDERAL",
                    "valor" => "Federal"
                ],
                [
                    "chave" => "SIAPE",
                    "valor" => "Siape"
                ]
            ]
        ]);
    }
}