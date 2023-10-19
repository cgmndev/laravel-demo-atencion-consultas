<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class ConsultaController extends Controller
{

    public function listar()
    {
        return view('admin.consultas.listar');
    }

    public function gestionar(int $id):Renderable
    {
        $consulta = Consulta::findOrFail($id);
        return view('admin.consultas.gestionar', [
            "consulta" => $consulta
        ]);
    }

    public function ver(int $id):Renderable
    {
        $consulta = Consulta::findOrFail($id);
        return view('admin.consultas.ver', [
            "consulta" => $consulta
        ]);
    }

    public function crear()
    {

    }

    public function editar(Request $request)
    {

    }

    public function eliminar(Request $request)
    {

    }

}
