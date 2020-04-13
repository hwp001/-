<?php

namespace App\Http\Controllers\test;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Client;
use App\Models\Goods;
use App\Models\Mp;
use App\Models\Order;
use Request;
use EasyWeChat\Factory;
use Illuminate\Support\Facades\Log;
class testController extends Controller
{
    public function index()
    {
        $data = [
            "id" => "1",
            'name' => "牛娃",
            'phone' => "13588888888",
            'address' => "fafhau",
            'sex' => "1",
            'sort' => "true"
        ];
        $res = (new Cargo())->updateCargoById($data);
        var_dump($res);
    }
}
