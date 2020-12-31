<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\CriadorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorSerieTest extends TestCase
{
    
    use RefreshDatabase;

   public function testCriadorSerie()
   {
        $criadorSerie = new CriadorDeSerie();
        $serie = $criadorSerie->criarSerie('Jannet', 1, 1);
        
        $this->assertInstanceOf(Serie::class, $serie);
        $this->assertDatabaseHas('series', ['nome' => 'Jannet']);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serie->id, 'numero' => 1]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);

        return $serie;

   }

}
