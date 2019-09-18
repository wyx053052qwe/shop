<?php

namespace App\Http\Controllers;

use App\Model\CouponModel;
use App\Model\Receive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $u_id=Auth::id();

        $receInfo=Receive::where('u_id',$u_id)->where('expirex_at' ,'>', time())->get()->toArray();
        foreach($receInfo as $k => $v){
                DB::table('coupon_receive')->where('expirex_at' ,'>', time())->update(['status' => 3]);
        }
        $rece=Receive::where('u_id',$u_id)->get()->toArray();
        return view('user.index',['data'=>$rece]);
    }
    public function del()
    {
        $id = request('id');
        $res = Receive::where('r_id', $id)->delete();
        if ($res) {
            return json_encode(['code' => 1, 'msg' => 'OK', 'url' => '/user/index']);
        } else {
            return json_encode(['code' => 0, 'msg' => 'NO', 'url' => '/user/index']);
        }
    }
    public function pay()
    {
        $id=request('id');
        dd($id);
    }

}
