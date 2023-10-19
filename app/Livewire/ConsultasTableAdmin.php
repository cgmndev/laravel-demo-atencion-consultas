<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
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
            Column::make("Fecha", "created_at")
                ->sortable(),
            Column::make("ALUMNO", "alumno.name")
                ->sortable(),
            Column::make("MOTIVO CONSULTA", "motivoconsulta.nombre")
                ->sortable(),
            Column::make("ESTADO", "estado")
                ->sortable(),

            Column::make("OPERADOR", "operador.name")
                ->sortable(),
            Column::make("ACCIONES", "id")
                ->format(
                    fn ($value, $row, Column $column) => view('admin.consultas.table-cell-operador')->withValue($row)
                )

        ];
    }

    public function builder(): Builder
    {
        return Consulta::orderby('operador_id', 'asc') ;
    }
}