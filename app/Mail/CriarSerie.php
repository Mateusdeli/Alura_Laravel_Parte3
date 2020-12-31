<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CriarSerie extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $nome = '';
    public int $temporadas;
    public int $episodios;
    public ?string $capa;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $nome, int $temporadas, int $episodios, ?string $capa)
    {
        $this->nome = $nome;
        $this->temporadas = $temporadas;
        $this->episodios = $episodios;
        $this->capa = $capa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Série Adicionada')->view('email.series.email-serie');
    }
}
