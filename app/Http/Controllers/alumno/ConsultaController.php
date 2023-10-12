<?php

namespace App\Http\Controllers\alumno;

use App\Http\Controllers\Controller;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{

    public function listar()
    {
        return view('alumno.consultas.listar');
    }

    public function crear()
    {
        return view('alumno.consultas.crear', [
            "updating" => false,
            "consulta" => new Consulta(),
            "title" => "Crear nueva Consulta",
            "formName" => "Formulario de creación de Consulta",
            "textButton" => "Crear Consulta"
        ]);
    }

    public function actualizar(Request $request)
    {

    }

    public function eliminar(Request $request)
    {

    }

}
