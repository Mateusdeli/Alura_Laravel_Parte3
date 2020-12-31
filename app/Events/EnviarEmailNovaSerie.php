<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class EnviarEmailNovaSerie
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public string $nomeSerie;
    public string $qtdTemporadas;
    public string $qtdEpisodios;
    public ?string $capa;

    public function __construct(string $nomeSerie, string $qtdTemporadas, string $qtdEpisodios, ?string $capa)
    {
        $this->nomeSerie = $nomeSerie;
        $this->qtdTemporadas = $qtdTemporadas;
        $this->qtdEpisodios = $qtdEpisodios;
        $this->capa = $capa;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
