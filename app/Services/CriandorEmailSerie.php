<?php

namespace App\Services;

use App\Mail\CriarSerie;
use App\User;
use Illuminate\Support\Facades\Mail;

class CriandorEmailSerie
{

    public function enviarEmailSerieCriada(User $user, string $nomeSerie, int $temporadas, int $episodios, ?string $capa)
    {
        Mail::to($user->email)->send(new CriarSerie($nomeSerie, $temporadas, $episodios, $capa));
    }

    public function enviarEmailTodosUsuarios(string $nomeSerie, int $temporadas, int $episodios, ?string $capa)
    {
        $users = User::all();
        foreach ($users as $index => $user) {
            $count = $index + 1;
            Mail::to($user)->later(now()->addSeconds($count * 5), new CriarSerie($nomeSerie, $temporadas, $episodios, $capa));
        }
    }
}
