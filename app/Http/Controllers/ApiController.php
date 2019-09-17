<?php

namespace App\Http\Controllers;

use App\Model\Cate;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function select()
    {
        $cateInfo=Cate::get()->toArray();
        return json_encode_options($cateInfo);
    }
}
