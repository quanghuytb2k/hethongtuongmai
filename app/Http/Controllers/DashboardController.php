<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Checkout;
use App\Coupon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function __construct(){
        $this->middleware(function($request, $next){
            session(['module_active'=>'dashboard']);
            return $next($request);
        });
    }
    function dashboard(){
        
        return view('admin.dashboard');


    }
    function detail(Request $request, $id){
        $order = Checkout::find($id);
        $order_product = Checkout::find($id)->products;
        $product_qty = DB::table('checkout_product')->where('checkout_id',$id)->get('qty');
        $qty = array();
        foreach($product_qty as $item){
            $qty[]=$item->qty;
    
        }
        $coupon = Checkout::find($id)->coupons;
        return view('admin.detail',compact('order' , 'order_product','qty','coupon'));
    }
    function update_dashboard(Request $request, $id){
        Checkout::where('id',$id)->update([
            'status' => $request->input('status')
        ]);
        return redirect('detail_dashboard'.$id)->with('status', 'Cập nhật trạng thái thành công!');
    }
}
