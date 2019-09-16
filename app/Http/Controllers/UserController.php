<?php

namespace App\Http\Controllers;

use App\Model\CouponModel;
use App\Model\Receive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $u_id=Auth::id();
        $receInfo=Receive::where(['u_id' => $u_id,'status' => 2])->get()->toArray();
        foreach($receInfo as $k => $v){
            if(time() > $v['expirex_at']){
                Receive::update(['status' => 3]);
            }
        }

        return view('user.index',['data'=>$receInfo]);
    }
}
