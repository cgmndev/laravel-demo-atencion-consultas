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

    }

    public function actualizar(Request $request)
    {

    }

    public function eliminar(Request $request)
    {

    }

}
