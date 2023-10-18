<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Consulta;

class ConsultasTableAdmin extends DataTableComponent
{
    protected $model = Consulta::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("CODIGO", "codigo")
                ->sortable(),
            Column::make("MOTIVO CONSULTA", "motivoconsulta.nombre")
                ->sortable(),
            Column::make("ESTADO", "estado")
                ->sortable(),
            Column::make("ALUMNO", "alumno.name")
                ->sortable(),
            Column::make("OPERADOR", "operador.name")
                ->sortable(),
            Column::make("Fecha actualización", "updated_at")
                ->sortable(),
        ];
    }



}
