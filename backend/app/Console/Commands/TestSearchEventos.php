<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\EventoController;
use Illuminate\Http\Request;

class TestSearchEventos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:search-eventos {--categoria= : Filtrar por categoría} {--fecha= : Filtrar por fecha exacta} {--fecha-from= : Fecha desde} {--fecha-to= : Fecha hasta}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Probar la función de búsqueda de eventos';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $request = new Request();

        if ($this->option('categoria')) {
            $request->merge(['categoria' => $this->option('categoria')]);
        }

        if ($this->option('fecha')) {
            $request->merge(['fecha' => $this->option('fecha')]);
        }

        if ($this->option('fecha-from')) {
            $request->merge(['fecha_from' => $this->option('fecha-from')]);
        }

        if ($this->option('fecha-to')) {
            $request->merge(['fecha_to' => $this->option('fecha-to')]);
        }

        $controller = new EventoController();
        $response = $controller->search($request);

        $this->info('Resultados de la búsqueda:');
        $this->line($response->getContent());
    }
}
