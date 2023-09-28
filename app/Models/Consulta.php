<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consulta';

    protected $fillable = [
        'CODIGO',
        'MOTIVO_CONSULTA_ID',
        'TITULO',
        'MENSAJE',
        'ALUMNO_ID',
        'OPERADOR_ID',
        'ESTADO'
    ];

    public function motivoConsulta(): BelongsTo
    {
        return $this->belongsTo(MotivoConsulta::class, 'MOTIVO_CONSULTA_ID');
    }

    public function operador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'OPERADOR_ID');
    }

    public function alumno(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ALUMNO_ID');
    }
}
