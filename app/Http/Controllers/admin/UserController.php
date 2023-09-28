<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\User;

class UserController extends Controller
{

    public function listar()
    {
        return view('admin.users.listar');
    }
}