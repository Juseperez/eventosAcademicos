<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\EventoController;
use Illuminate\Http\Request;

class TestUpdateEvento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:update-evento {id : ID del evento a actualizar} {--nombre= : Nuevo nombre} {--fecha= : Nueva fecha} {--lugar= : Nuevo lugar} {--categoria= : Nueva categoría} {--descripcion= : Nueva descripción}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Probar la función de actualización de un evento';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $request = new Request();

        $data = [];

        if ($this->option('nombre')) {
            $data['nombre'] = $this->option('nombre');
        }

        if ($this->option('fecha')) {
            $data['fecha'] = $this->option('fecha');
        }

        if ($this->option('lugar')) {
            $data['lugar'] = $this->option('lugar');
        }

        if ($this->option('categoria')) {
            $data['categoria'] = $this->option('categoria');
        }

        if ($this->option('descripcion')) {
            $data['descripcion'] = $this->option('descripcion');
        }

        if (empty($data)) {
            $this->error('Debe proporcionar al menos un campo para actualizar.');
            return;
        }

        $request->merge($data);

        $controller = new EventoController();
        $response = $controller->update($request, $this->argument('id'));

        $this->info('Resultado de la actualización:');
        $this->line($response->getContent());
    }
}
