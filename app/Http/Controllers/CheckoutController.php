<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Checkout;
use App\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Province;
use App\District;
use App\Commune;
use App\Order_product;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    //
    function checkout_add(){
        $provinces = Province::all();
            $districts = District::all();
            $communes = Commune::all();
        return view('cart.checkout',compact('provinces','districts','communes'));
    }
    function checkout_action(Request $request){
        $request->validate([
            'name'=>'required|min:5',
            'email'=>'required|min:5',
            'phone_number'=>'required',
            'note'=>'required',
            ],
            [
                'required'=>':attribute không được để trống',
                'min'=>':attribute độ dài phải trên 5 ký tự'
            ],
            [
                'name'=>'Tiêu đề',
                'email'=>'email',
                'phone_number'=>'số điện thoại',
                'note'=>'ghi chú',
            ]

            );
            
            Checkout::create([
                'code'=> 'DT'.time(),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'addres' => $request->input('province').','.$request->input('district').','.$request->input('commune'),
                'phonenumber' => $request->input('phone_number'),
                'product'=>$request->input('name_product'),
                'soluong'=> Cart::count(),
                'payment'=>$request->input('payment'),
                'giatri'=>Cart::total(0,0,''),
                'status'=>'đang sử lý',
            ]);
            $order_id = Checkout::max('id');
            foreach (Cart::content() as $item){
                DB::table('checkout_product')->insert([
                    'checkout_id'=> $order_id ,
                    'product_id'=> $item->id,
                    'qty'=> $item->qty ,
                ]);
            }
                Cart::destroy();
            return redirect('cart/checkout')->with('status','đã mua sản phẩm  thành công');
    }

    function district(Request $request){
        $province = $request->get('province');
        $select_district = '<option value="">-- Chọn Quận/Huyện --</option>';
        $matp = Province::where('name', $province)->get();
        $matp = $matp['0']->matp;
        if($matp){
            $list_district = District::where('matp', $matp)->get();
            foreach($list_district as $district){
                $select_district .= '
                <option value="'.$district->name.'">'.$district->name.'</option>';
            }
        }
        $data = $select_district;
        return response()->json($data);
    }
    function commune(Request $request){
        $commune = $request->get('commune');
        $select_commune = "<option value=''>-- chọn Xã/phường --</option>";
        $maqh = District::where('name',$commune)->get();
        $maqh = $maqh['0']->maqh;
        if($maqh){
            $list_commune = Commune::where('maqh',$maqh)->get();
            foreach($list_commune as $commune){
                $select_commune .=' <option value="'.$commune->name.'">'.$commune->name.'</option>
                ';
            }
        }$data = $select_commune;
        return response()->json($data);
    }
    function num_order(Request $request){
        $num_order = $request->get('num_order');
        // foreach($num_order as $k=>$v){
        //     Cart::update($k,$v);
        // }
        foreach (Cart::content() as $item){
            $total2 = $num_order * $item->price;
        }
        $data = number_format($total2,0,',','.').'đ';
        return response()->json($data);
    }
}
