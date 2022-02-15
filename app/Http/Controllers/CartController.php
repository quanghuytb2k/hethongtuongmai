<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Coupon;
use App\Customer;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use Illuminate\Http\Request;


class CartController extends Controller
{
    function show(){
        $coupon = Coupon::all()->first();
        return view('cart.show', compact('coupon'));
    }
    function add(Request $request, $id){
        $products = Product::find($id);
        if($request->input('qty')){
            $qty = $request->input('qty');
        }else{
            $qty = 1;
        }
        Cart::add([
            'id'=>$products->id,
            'name'=>$products->name,
            'qty'=> $qty,
            'price'=>$products->price,
            'options'=>['thumbnail'=>$products->thumbnail],
        ]);
        
        return redirect('cart/show');
    }
    function remove($rowId){
        Cart::remove($rowId);
        return redirect('cart/show');
    }
    function destroy(){
        $coupon = Session::get('coupon');
        if($coupon == true){
            Session::forget('coupon');
        }
        Cart::destroy();
        return redirect('cart/show');
    }
    function action(Request $request){
        $row = $request->get('qty');

        foreach($row as $k=>$v){
            Cart::update($k,$v);
        }
        return redirect('cart/show');
    }
    // function action2(Request $request, $id){

    //     $row = $request->get('qty');
    //     $products = Product::find($id);

    //     foreach($row as $k=>$v){
    //         Cart::update($k,$v);
    //     }
    //      return redirect(route('cart/add',compact('id')));

    // }


}
