<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (auth()->check()) {
        if (in_array(auth()->user()->rol->codigo, ['ADMIN', 'OPER']))
            return redirect('/admin/dashboard');
        else
            return redirect('/alumno/consultas');
    } else {
        return view('auth.login');
    }
});



// Rutas para usuarios con el rol "Administrador u Operador"
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'checkRol:ADMIN,OPER'])->group(function () {

    Route::get('/admin', function () { return redirect('/admin/dashboard'); });

    Route::get('/admin/dashboard', '\App\Http\Controllers\admin\DashboardController@listar')->name('admin_dashboard');
    Route::get('/admin/consultas', '\App\Http\Controllers\admin\ConsultaController@listar')->name('admin.consultas.listar');
    Route::get('/admin/consulta/{id}/gestionar', '\App\Http\Controllers\admin\ConsultaController@gestionar')->name('admin.consulta.gestionar');
    Route::get('/admin/consulta/{id}/ver', '\App\Http\Controllers\admin\ConsultaController@ver')->name('admin.consulta.ver');
    Route::get('/admin/consulta/{id}/ver-pdf', '\App\Http\Controllers\admin\ConsultaController@downloadPDF')->name('admin.consulta.downloadPDF');
    Route::get('/admin/usuarios', '\App\Http\Controllers\admin\UserController@listar')->name('admin.usuarios.listar');
    Route::get('/admin/usuarios/crear', '\App\Http\Controllers\admin\UserController@crear')->name('admin.usuarios.crear');
    Route::get('/admin/usuarios/{id}/editar', '\App\Http\Controllers\admin\UserController@editar')->name('admin.usuarios.editar');

});

// Rutas para usuarios con el rol "Alumno"
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'checkRol:ALU'])->group(function () {
    Route::get('/alumno', '\App\Http\Controllers\alumno\ConsultaController@listar');
    Route::get('/alumno/consultas', '\App\Http\Controllers\alumno\ConsultaController@listar')->name('alumno.consultas.listar');
    Route::get('/alumno/consultas/crear', '\App\Http\Controllers\alumno\ConsultaController@crear')->name('alumno.consultas.crear');
    Route::get('/alumno/consulta/{id}/ver', '\App\Http\Controllers\alumno\ConsultaController@ver')->name('alumno.consulta.ver');
    Route::get('/alumno/consulta/{id}/ver-pdf', '\App\Http\Controllers\alumno\ConsultaController@downloadPDF')->name('alumno.consulta.downloadPDF');
});
