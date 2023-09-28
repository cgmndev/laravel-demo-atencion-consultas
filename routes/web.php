<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    if (auth()->check()) {
        if (in_array(auth()->user()->rol->codigo, ['ADMIN', 'OPER']))
            return redirect('/admin/dashboard');
        else
            return redirect('/alumno/dashboard');
    } else {
        return view('auth.login');
    }
});

Route::get('/alumno', function () {
    if (auth()->check()) {
        if (in_array(auth()->user()->rol->codigo, ['ADMIN', 'OPER']))
            return redirect('/admin/dashboard');
        else
            return redirect('/alumno/dashboard');
    } else {
        return view('auth.login');
    }
});

// Rutas para usuarios con el rol "Administrador u Operador"
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'checkRol:ADMIN,OPER'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin_dashboard');

    Route::get('/admin/consultas', function () {
        return view('admin.consultas');
    })->name('admin_consultas');

    // Route::get('/admin/usuarios', function () {
    //     return view('admin.usuarios');
    // })->name('admin_usuarios');

    Route::resource('/admin/usuarios', \App\Http\Controllers\UserController::class)->only([
        'index', 'create', 'store', 'show'
    ]);

});

// Rutas para usuarios con el rol "Alumno"
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'checkRol:ALU'])->group(function () {

    Route::get('/alumno/dashboard', function () {
        return view('alumno.dashboard');
    })->name('alumno_dashboard');
});
