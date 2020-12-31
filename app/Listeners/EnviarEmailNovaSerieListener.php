<?php

namespace App\Listeners;

use App\Events\EnviarEmailNovaSerie;
use App\Services\CriandorEmailSerie;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarEmailNovaSerieListener implements ShouldQueue
{
    private $CriandorEmailSerie;

    public function __construct(CriandorEmailSerie $CriandorEmailSerie)
    {
        $this->CriandorEmailSerie = $CriandorEmailSerie;
    }

    /**
     * Handle the event.
     *
     * @param  EnviarEmailNovaSerie  $event
     * @return void
     */
    public function handle(EnviarEmailNovaSerie $event)
    {
        $this->CriandorEmailSerie->enviarEmailTodosUsuarios($event->nomeSerie, $event->qtdTemporadas, $event->qtdEpisodios, $event->capa);
    }
}
