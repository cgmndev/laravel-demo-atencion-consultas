<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
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
            Column::make("CODIGO", "codigo")
                ->sortable(),
            Column::make("MOTIVO CONSULTA", "motivoconsulta.nombre")
                ->sortable(),
            Column::make("TITULO", "titulo")
                ->sortable(),
            Column::make("ESTADO", "estado")
                ->sortable(),
            Column::make("Fecha creación", "created_at")
                ->sortable(),
                Column::make("Fecha actualización", "updated_at")
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return Consulta::where('alumno_id', auth()->user()->id);
    }
}
