<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
	Методы для управлениея состоянием записей из браузера через Ajax
*/
class RestapiController extends Controller
{
    // Увеличим счетчик загрузок программы
    public function dload_inc($wid)
    {
        if (!isset($wid) || !is_numeric($wid) || $wid<1)
		{
			return response("Error of params", 400);
		}
		
		if (!isset($_SERVER['REMOTE_ADDR']))
			$_SERVER['REMOTE_ADDR'] = "no_addr";
		// Обновить счетчик, если в прошлый раз мы этого не делали
		$affected = DB::update("UPDATE wares SET count_downloads = count_downloads + 1, ff_load_ip=? WHERE ware_id=? AND ff_load_ip<>?", [$_SERVER['REMOTE_ADDR'],$wid,$_SERVER['REMOTE_ADDR']]);
		//$affected = DB::update("UPDATE wares SET count_downloads = count_downloads + 1 WHERE ware_id=?", [$wid]);
        if ($affected<1)
		{
			return response("No programs of that id are affected", 200);
		}
		
		// Данные успешно обновлены
		return response("OK $affected", 200);
        // return view('ware_details', compact("ware"));
    }
}
