<?php

namespace Tests\Unit;

use App\Episodio;
use App\Temporada;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TemporadaTest extends TestCase
{

    private $temporada;

    public function setUp(): void 
    {
        parent::setUp();
        $temporada = new Temporada();

        $episodio1 = new Episodio();
        $episodio1->assistido = true;

        $episodio2 = new Episodio();
        $episodio2->assistido = true;

        $episodio3 = new Episodio();
        $episodio3->assistido = false;

        $temporada->episodios->add($episodio1);
        $temporada->episodios->add($episodio2);
        $temporada->episodios->add($episodio3);

        $this->temporada = $temporada;
    }

    public function testBuscarTodosEpAssistidos()
    {
        $this->assertCount(2, $this->temporada->getEpisodiosAssistidos());
    }

    public function testBuscarTodosEpisodios()
    {
        $this->assertCount(3, $this->temporada->episodios);
    }

    
}
