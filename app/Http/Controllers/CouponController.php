<?php

namespace App\Http\Controllers;

use App\Model\CouponModel;
use App\Model\Receive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('coupon.index');
    }
    public function couponindex()
    {
        $data=CouponModel::get()->toArray();
        return view('coupon.couponindex',['data'=>$data]);
    }
    public function getcoupon()
    {
        $u_id = Auth::id();
        if($u_id){
            $now = time();
            $coupon_type = request('type');
            $minute = request('minute');
            $c_id = request('c_id');
            $couponInfo=CouponModel::where('c_id',$c_id)->first();
            $exprce_at=strtotime($couponInfo->last_time);
            if($now > $exprce_at){
                return json_encode(['code'=>2,'msg'=>'优惠券已过期']);
            }
            $receiceInfo=Receive::where(['u_id'=>$u_id,'coupon_money'=>$minute])->first();
            if(!empty($receiceInfo)){
                return json_encode(['code'=>3,'msg'=>'你已经领取过该优惠券了，赶快去使用吧']);
            }
            $code_id = Str::random(8);
            $data = [
                'u_id'=>$u_id,
                'code_id'=>$code_id,
                'c_name'=>$couponInfo->c_name,
                'coupon_money'=>$minute,
                'create_time'=>time(),
                'expirex_at' => $exprce_at,
                'coupon_type'=>$coupon_type,
                'status'=>2
            ];
            $res=Receive::insert($data);
            if($res){
                return json_encode(['code'=>200,'msg'=>'OK','code_id'=>$code_id]);
            }
        }else{
            return json_encode(['code'=>1,'msg'=>'请登录']);
        }


    }
}
