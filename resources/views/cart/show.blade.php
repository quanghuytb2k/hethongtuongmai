@extends('layouts.cart')
@section('content')


<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">có <strong>{{Cart::count()}}</strong> sản phẩm trong giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <form action="{{route('cart/action')}} " method="POST">
                    @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)


                        <tr>
                            <td>{{$item->id}} </td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="{{asset($item->options->thumbnail)}} " alt="">
                                </a>
                            </td>
                            
                            <td>
                                <a href="" title="" class="name-product">{{$item->name}} </a>
                            </td>
                            <td>{{number_format( $item->price,0,',','.')}}đ </td>
                            <td>
                                <input type="number" name="qty[{{$item->rowId}}]" min='1'  value="{{$item->qty}}" class="num-order">
                            </td>
                            <td class="abcd">{{number_format($item->total,0,',','.')}}đ </td>
                            <td>
                                <a href="{{route('cart/remove',$item->rowId)}} " title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span class='abcd2'>{{Cart::total()}}đ </span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <input type="submit" name="btn_submit" value="cập nhật giỏ hàng"  id="update-cart">
                                        <a href="{{route('cart/checkout')}} " title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="{{url('/')}} " title="" id="buy-more">Mua tiếp</a><br/>
                <a href="{{route('cart/destroy')}} " title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //  select district
        
        $(".num-order").change(function (){
            var _token = $('input[name="_token"]').val();
            var num_order = $(this).val();
            var data = {num_order: num_order, _token:_token};
            console.log(data);
            $.ajax({
                url: "{{route('num_order')}}",
                method: 'POST',
                data: data,
                dataType: 'json',
                success:function(data){
                    console.log(data);
                    $('.abcd').html(data);
                    $('.abcd2').html(data);
                    // alert(data);
            }
            });
        });
    </script>
@endsection
