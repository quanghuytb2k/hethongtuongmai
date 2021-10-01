<?php

namespace App\Http\Controllers;

use App\Checkout;
use Illuminate\Http\Request;

class AdminOderController extends Controller
{
    //
    function admin_order(Request $request , $id){
        $order = Checkout::find($id);
        return view('admin-order.admin_order',compact('order'));
    }
}
