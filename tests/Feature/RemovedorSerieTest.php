<?php

namespace Tests\Feature;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorSerieTest extends TestCase
{

    use RefreshDatabase;

    private $serie;

    public function setUp(): void 
    {
        parent::setUp();
        $criadorSerie = new CriadorDeSerie();
        $serie = $criadorSerie->criarSerie('Teste', 1, 1);
        $this->serie = $serie;
    }
   
    public function testRemovedorSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
        $removerSerie = new RemovedorDeSerie();
        $nomeSerie = $removerSerie->removerSerie($this->serie->id);
        $this->assertIsString($nomeSerie);
        $this->assertEquals('Teste', $nomeSerie);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
