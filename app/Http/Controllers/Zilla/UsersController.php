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
class UsersController extends Controller
{
    public function __construct()
    {
        // Для проверки через token
        auth()->setDefaultDriver('api');
    }

    // Ф-ияп проверки token
    public function checkTokenError()
    {
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 401);
        }
        return "";
    }

    // Вывод пользователей
    public function users(Request $req)
    {
        // Проверка token
        $tk_err = $this->checkTokenError();
        if (""!==$tk_err) return $tk_err;

        // Сама функция
        return response()->json(UsersModel::get(), 200);
    }

    // Вывод данных 1 пользователя
    public function user($id)
    {
        // Проверка token
        $tk_err = $this->checkTokenError();
        if (""!==$tk_err) return $tk_err;

        return response()->json(UsersModel::find($id), 200);
    }
    // Добавить пользователя
    public function postUser(Request $req)
    {
        // Проверка token
        $tk_err = $this->checkTokenError();
        if (""!==$tk_err) return $tk_err;

        //print "postUser";
        //print_r($req->all());
        $user = UsersModel::create($req->all());
        return response()->json($user, 201);
    }

    // Изменить данные пользователя
    public function editUser($id, Request $req, UsersModel $user)
    {
        // Проверка token
        $tk_err = $this->checkTokenError();
        if (""!==$tk_err) return $tk_err;

        //print "editUser";
        //dd($req->all());
        $user->whereId($id)->update($req->all());
        return response()->json($user, 200);
    }

    // Удалить пользователя
    public function deleteUser($id, Request $req, UsersModel $user)
    {
        // Проверка token
        $tk_err = $this->checkTokenError();
        if (""!==$tk_err) return $tk_err;

        $user->whereId($id)->delete();
        return response()->json('', 204);
    }

    // API - Вывод платежей
    public function pays($uid)
    {
        // Проверка token
        $tk_err = $this->checkTokenError();
        if (""!==$tk_err) return $tk_err;

        return response()->json(PaysModel::where('uid',$uid)->get(), 200);
    }
}
