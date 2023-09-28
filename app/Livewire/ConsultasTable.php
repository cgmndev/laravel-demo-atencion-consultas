<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Consulta;

class ConsultasTable extends DataTableComponent
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
            Column::make("CODIGO", "CODIGO")
                ->sortable(),
            Column::make("MOTIVO CONSULTA ID", "MOTIVO_CONSULTA_ID")
                ->sortable(),
            Column::make("TITULO", "TITULO")
                ->sortable(),
            Column::make("MENSAJE", "MENSAJE")
                ->sortable(),
            Column::make("ALUMNO ID", "ALUMNO_ID")
                ->sortable(),
            Column::make("OPERADOR ID", "OPERADOR_ID")
                ->sortable(),
            Column::make("ESTADO", "ESTADO")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
