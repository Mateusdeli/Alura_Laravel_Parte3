<?php

use App\Mail\CriarSerie;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\Mail;

Route::middleware(['autenticador'])->group(function() {

    Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie');
    Route::post('/series/criar', 'SeriesController@store');
    Route::delete('/series/{id}', 'SeriesController@destroy');
    Route::post('/series/{id}/editaNome', 'SeriesController@editaNome');
    Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');
});


Route::get('/series', 'SeriesController@index')
    ->name('listar_series');

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');
Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::get('/entrar', 'EntrarController@index')->name('login.form');
Route::post('/entrar', 'EntrarController@authenticate')->name('login');

Route::get('/registrar', 'RegistrarController@create')->name('registrar.create');
Route::post('/registrar', 'RegistrarController@store')->name('registrar.store');

Route::get('/logout', 'LogoutController@store')->name('logout');

Route::get('/send-email', function() {
    $serie = Serie::find(1);
    $temporadas = Temporada::query()->where('serie_id', $serie->id)->get();
    $mail = new CriarSerie($serie->nome, count($serie->temporadas), count($temporadas[0]->episodios));
    $mail->subject = 'Nova Série Adicionada';
    $user = (object) [
        'email' => 'mateus@mateus.com',
        'name' => 'teste'
    ];
    Mail::to('mateus@mateus.com')->send($mail);
    return 'Email enviado com sucesso!';
});


