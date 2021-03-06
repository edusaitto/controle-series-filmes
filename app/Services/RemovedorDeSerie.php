<?php

namespace App\Services;

use App\{Serie, Temporada, Episodio};

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class RemovedorDeSerie {
    public function removerSerie(int $serieId):string {
        $nomeSerie = '';
        DB::transaction(function() use($serieId, &$nomeSerie) {
            $serie = Serie::find($serieId);
            $nomeSerie = $serie->nome;
            $this->removerTemporadas($serie);
            $serie->delete();
        });
        return $nomeSerie;
    }

    public function removerTemporadas(Serie $serie) {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    public function removerEpisodios(Temporada $temporada) {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}