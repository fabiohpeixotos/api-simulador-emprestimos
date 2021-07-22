<?php

namespace App\Services;

use App\Models\Taxas;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class TaxaService
{
    private Taxas $taxa;

    public function __construct(Taxas $taxa)
    {
        $this->taxa = $taxa;
    }

    public function calculate(float $valor, array $financeiras, array $convenios, int $parcela): array
    {
        $taxasFiltered = $this->getTaxas($financeiras, $convenios, $parcela);

        $result = [];
        
        if($taxasFiltered) {
            foreach($taxasFiltered as $taxa) {
                
                if(!isset($result[$taxa['instituicao']]))
                    $result[$taxa['instituicao']] = [];
                
                $result[$taxa['instituicao']][] = [
                    'taxa' => $taxa['taxaJuros'],
                    'parcelas' => $taxa['parcelas'],
                    'valor_parcela' => $this->calculeParcel($valor, $taxa['coeficiente']),
                    'convenio' => $taxa['convenio']
                ];
            }
        } else {
            throw new HttpResponseException(Response::make([
                'errors' => ['No momento não há disponibilidade de empréstimo para a simulação realizada']
            ]));
        }

        return $result;
    }

    public function getTaxas(array $financeiras, array $convenios, int $parcela): array
    {
        $filtered = $this->taxa->getData()->filter(function ($value, $key) use ($financeiras, $convenios, $parcela) {
            if($financeiras && !in_array($value['instituicao'], $financeiras)) {
                return false;
            }

            if($convenios && !in_array($value['convenio'], $convenios)) {
                return false;
            }

            if($parcela && ($value['parcelas'] != $parcela)) {
                return false;
            }
            
            return true;
        });

        return $filtered->all();
    }

    public function calculeParcel(float $valor, float $coeficiente): float
    {
        return number_format($valor * $coeficiente, 2, '.', '');
    }
}