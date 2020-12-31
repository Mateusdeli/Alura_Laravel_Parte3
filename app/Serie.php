<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome', 'capa'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

    public function getCapaUrlAttribute()
    {
        if(is_null($this->capa)) {
            return Storage::url('series/sem-imagem.jpg');
        }

        return Storage::url("{$this->capa}");
    }
}
