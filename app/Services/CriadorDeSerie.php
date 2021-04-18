<?php

namespace App\Services;

use App\Serie;

use Illuminate\Support\Facades\DB;

class CriadorDeSerie {
    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $epPorTemporada
    ):Serie {
        $serie = Serie::create(['nome' => $nomeSerie]);
        $qtdEps = $epPorTemporada;
        for($i=1; $i<=$qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            for($j=1; $j<=$qtdEps; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        return $serie;
    }
}