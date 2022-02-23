<?php

namespace App\Http\Controllers\Zilla;

use App\Http\Controllers\Controller;
use App\Models\Zilla\UsersModel;
use App\Models\Zilla\PaysModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
	Методы API CRUD - Users
*/
class ZUsersController extends Controller
{
    /* Frondend */
    // Редактирование юзера - id
    public function userEdit($id)
    {
        return view('zilla.user_edit', compact("id"));
    }

    // Платежи
    public function userPayments($id)
    {
        return view('zilla.user_payments', compact("id"));
    }
}
