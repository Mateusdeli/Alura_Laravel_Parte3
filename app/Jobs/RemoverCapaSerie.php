<?php

namespace App\Jobs;

use App\Services\RemovedorDeSerie;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\App;

class RemoverCapaSerie implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $serie;

    public function __construct(object $serie)
    {
        $this->serie = $serie;
    }

    
    public function handle()
    {
        (App::make(RemovedorDeSerie::class))->removerCapa($this->serie);
    }
}
