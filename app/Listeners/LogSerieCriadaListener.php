<?php

namespace App\Listeners;

use App\Events\EnviarEmailNovaSerie;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogSerieCriadaListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EnviarEmailNovaSerie  $event
     * @return void
     */
    public function handle(EnviarEmailNovaSerie $event)
    {
        Log::info("Série Adicionada: ". $event->nomeSerie);
        Log::info("Horario: ". date('d-m-Y H:i:s'));
    }
}
