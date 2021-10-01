<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Product_cats;
use SebastianBergmann\Environment\Console;

class ProductController extends Controller
{
    //

    function add(){ 
        $product_cat= Product_cats::all();
        $cats= data_tree($product_cat);
        return view('admin-product.add', compact('cats'));
    }
    function stores(Request $request){
        $request->validate([
        'name'=>'required|min:5',
        'content'=>'required',
        'price'=>'required',
        'soluong'=>'required',

        'code'=>'required'
        ],
        [
            'required'=>':attribute không được để trống',
            'min'=>':attribute độ dài phải trên 5 ký tự'
        ],
        [
            'name'=>'Tiêu đề',
            'content'=>'Nội dung',
            'price'=>'giá',
            'soluong'=>'số lượng',
            'code'=>'mã sản phẩm'
        ]

        );
        $input = $request->all();
        // return $request->input();
        echo "helod";
        if($request->hasFile('file')){
            $file= $request->file;
            $filename= $file->getClientOriginalName();
            echo $filename;
            $thumbnail = "uploads/".$filename;
            $file->move('public/uploads/', $file->getClientOriginalName());

        }
        Product::create([
            'name' => $request->input('name'), 
            'code' => $request->input('code'),
            'content' => $request->input('content'),
            'price' => $request->input('price'),
            'old_price' => $request->input('old_price'),
            'thumbnail' => $thumbnail,
            'soluong' => $request->input('soluong'),
            'cat_id' => $request->input('cat'),
    ]);
        return redirect('admin/product/list')->with('status','thêm bài viết thành công');

    }
    function list(Request $request){
        $list_act=['delete'=>'xóa tạm thời'];
        $status = $request->input('status');
        if($status == 'trash'){
            $list_act=['restore'=>'khôi phục',
            'forceDelete'=>'xóa vĩnh viễn'];
            $products =Product::onlyTrashed()->paginate(2);
        }
        else{
        $keyword ="";
        if($request->input('keyword')){
            $keyword =$request->input('keyword');
        }

        //lấy thông tin điều kiện
        $products=Product::where('name','LIKE',"%{$keyword}%")->paginate(2);
    }
    $count_active = Product::count();
    $count_trash = Product::onlyTrashed()->count();
    $count =[$count_active,$count_trash];


        return view('admin-product.list',compact('products','count','list_act'));
    }
    function delete($id){
        $products = Product::find($id);
        $products->delete();
        return redirect('admin/product/list')->with('đã xóa thành công user');
     }
     function action(Request $request){
         $list_check = $request->input('list_check');

         if($list_check){


                 $act = $request->input('act');
                     if($act =='delete'){
                        Product::destroy($list_check);
                         return redirect('admin/product/list')->with('status','Bạn xóa thành công ');
                     }
                     if($act =='restore'){
                        Product::withTrashed()
                         ->whereIn('id',$list_check)
                         ->restore();
                         return redirect('admin/product/list')->with('status','Bạn đã khôi phục thành công ');
                     }
                     if($act == 'forceDelete'){
                        Product::withTrashed()
                         ->whereIn('id',$list_check)
                         ->forceDelete();
                         return redirect('admin/product/list')->with('status','bạn đã xõa vĩnh viễn tài khoản thành công');
                     }


             }
             else{
                 return redirect('admin/product/list')->with('status','bạn cần chọn phần tử để thực hiện');
             }

     }

     function edit($id){
         $user = Product::find($id);
         return view('admin.edit',compact('user'));
     }
     function update(Request $request, $id){
         $request->validate([

                 'name' => ['required', 'string', 'max:255'],

                 'password' => ['required', 'string', 'min:8', 'confirmed'],
             ],
             [
                 'required'=>':attribute không được để trống',
                 'min'=>':attribute có độ dại ít nhất :min ký tự',
                 'max'=>':attribute có độ dài tối đa :max ký tự' ,
                 'confirmed'=>'xác nhận mật khẩu không thành công',
             ]);


             Product::where('id',$id)->update([
                 'name'=>$request->input('name'),
             'password'=>Hash::make($request->input('password')),
             ]);
             return redirect('admin/product/list')->with('status','đã sửa bản ghi thành công');

     }

     function show_product(){
         $products = Product::where('old_price','!=',NULL)->orderBy('id','desc')->get();
         $products_best = Product::where('old_price','!=',NULL)->orderBy('id','desc')->limit(8)->get();
         $product_cats = Product_cats::where('parent_id','=',NULL)->get();
         $cats = Product_cats::all();
         return view('welcome',compact('products','products_best','product_cats','cats'));

     }
     function detail_product($id){
        $products = Product::find($id);


         return view('product.detail_product',compact('products'));
     }

}
