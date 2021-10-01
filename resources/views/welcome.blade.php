<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
    position: absolute;
    right: 2px;
    top: 34px;
}



            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?page=home" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="?page=blog" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?page=home" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="">
                                    <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>

                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">{{Cart::count()}}</span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span> {{Cart::count()}} sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            @foreach (Cart::content() as $item)


                                            <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="{{asset($item->options->thumbnail)}}" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name">{{$item->name}} </a>
                                                    <p class="price">{{ $item->price}} </p>
                                                    <p class="qty">Số lượng: <span>{{ $item->qty}} </span></p>
                                                </div>
                                            </li>
                                            @endforeach

                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right">{{Cart::total()}}đ</p>
                                        </div>
                                        <div class="action-cart clearfix">
                                            <a href="{{route('cart/show')}} " title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="?page=checkout" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                @if (Route::has('login'))
                                <div class="top-right links btn-danger  " style="margin-left: -500px" >
                                    @auth

                                        <span class="btn-danger"><a   href="{{ url('/home') }}">Home</a></span>

                                    @else

                                        <a href="{{ route('login') }}">Đăng nhập</a>

                                        @if (Route::has('register'))

                                            <a href="{{ route('register') }}">Đăng ký</a>

                                        @endif
                                    @endauth

                            @endif
                                                    </div>

                        </div>


                    </div>

                </div>
                <div id="main-content-wp" class="home-page clearfix">
                    <div class="wp-inner">
                        <div class="main-content fl-right">
                            <div class="section" id="slider-wp">
                                <div class="section-detail">
                                    <div class="item">
                                        <img src="public/images/slider-01.png" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="public/images/slider-02.png" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="public/images/slider-03.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="section" id="support-wp">
                                <div class="section-detail">
                                    <ul class="list-item clearfix">
                                        <li>
                                            <div class="thumb">
                                                <img src="public/images/icon-1.png">
                                            </div>
                                            <h3 class="title">Miễn phí vận chuyển</h3>
                                            <p class="desc">Tới tận tay khách hàng</p>
                                        </li>
                                        <li>
                                            <div class="thumb">
                                                <img src="public/images/icon-2.png">
                                            </div>
                                            <h3 class="title">Tư vấn 24/7</h3>
                                            <p class="desc">1900.9999</p>
                                        </li>
                                        <li>
                                            <div class="thumb">
                                                <img src="public/images/icon-3.png">
                                            </div>
                                            <h3 class="title">Tiết kiệm hơn</h3>
                                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                                        </li>
                                        <li>
                                            <div class="thumb">
                                                <img src="public/images/icon-4.png">
                                            </div>
                                            <h3 class="title">Thanh toán nhanh</h3>
                                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                                        </li>
                                        <li>
                                            <div class="thumb">
                                                <img src="public/images/icon-5.png">
                                            </div>
                                            <h3 class="title">Đặt hàng online</h3>
                                            <p class="desc">Thao tác đơn giản</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="section" id="feature-product-wp">
                                <div class="section-head">
                                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                                </div>
                                <div class="section-detail">
                                    <ul class="list-item">
                                        @foreach ($products as $item)
                                        <li>
                                            <a href="{{route('product/show',$item->id)}} " title="" class="thumb">
                                                <img src="{{asset($item->thumbnail)}} ">
                                            </a>
                                            <a href="{{route('product/show',$item->id)}}" title="" class="product-name">{{$item->name}}</a>
                                            <div class="price">
                                                <span class="new"> {{number_format($item->price,0,'','.')}}đ</span>
                                                <span class="old"> {{number_format($item->old_price,0,'','.')}}đ</span>
                                            </div>
                                            <div class="action clearfix">
                                                <a href="{{route('cart/add',$item->id)}}" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                                <a href="{{route('buynow',Str::slug($item->name))}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            @foreach ($product_cats as $cat)
                                @php
                                   $cats_childs = data_tree($cats, $cat['id'], 0);

                                     $cats_childs[] = $cat;

                                   $products_cats_child = array();

                                   foreach ($products as $product) {
                                       foreach ($cats_childs as $cat) {
                                           if($product['cat_id'] == $cat['id']){
                                               $products_cats_child[] = $product;
                                           }
                                       }
                                   }
                                @endphp
                                @if($products_cats_child)
                                <div class="section" id="list-product-wp">
                                    <div class="section-head">
                                        <h3 class="section-title">{{$cat->name}} nổi bật</h3>
                                    </div>
                                    <div class="section-detail">
                                        <ul class="list-item clearfix">
                                            @foreach ($products_cats_child as $item)
                                            <li>
                                                <a href="{{route('product/show',$item->id)}} " title="" class="thumb">
                                                    <img src="{{asset($item->thumbnail)}}">
                                                </a>
                                                <a href="{{route('product/show',$item->id)}}" title="" class="product-name">{{$item->name}} </a>
                                                <div class="price">
                                                    <span class="new">{{number_format( $item->price,0,'','.')}}đ </span>
                                                    <span class="old">8.990.000đđ</span>
                                                </div>
                                                <div class="action clearfix">
                                                    <a href="{{route('cart/add',$item->id)}} " title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                                    <a href="{{route('buynow',Str::slug($item->name))}}" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            @endforeach



                        </div>
                        <div class="sidebar fl-left">
                            <div class="section" id="category-product-wp">
                                <div class="section-head">
                                    <h3 class="section-title">Danh mục sản phẩm</h3>
                                </div>
                                <div class="secion-detail">
                                    <ul class="list-item">
                                        <li>
                                            <a href="?page=category_product" title="">Điện thoại</a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="?page=category_product" title="">Iphone</a>
                                                </li>
                                                <li>
                                                    <a href="?page=category_product" title="">Samsung</a>
                                                    <ul class="sub-menu">
                                                        <li>
                                                            <a href="?page=category_product" title="">Iphone X</a>
                                                        </li>
                                                        <li>
                                                            <a href="?page=category_product" title="">Iphone 8</a>
                                                        </li>
                                                        <li>
                                                            <a href="?page=category_product" title="">Iphone 8 Plus</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="?page=category_product" title="">Oppo</a>
                                                </li>
                                                <li>
                                                    <a href="?page=category_product" title="">Bphone</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">Máy tính bảng</a>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">laptop</a>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">Tai nghe</a>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">Thời trang</a>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">Đồ gia dụng</a>
                                        </li>
                                        <li>
                                            <a href="?page=category_product" title="">Thiết bị văn phòng</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="section" id="selling-wp">
                                <div class="section-head">
                                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                                </div>
                                <div class="section-detail">
                                    <ul class="list-item">
                                        <li class="clearfix">
                                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-13.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="?page=detail_product" title="" class="product-name">Laptop Asus A540UP I5</a>
                                                <div class="price">
                                                    <span class="new">5.190.000đ</span>
                                                    <span class="old">7.190.000đ</span>
                                                </div>
                                                <a href="" title="" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-11.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                <div class="price">
                                                    <span class="new">15.190.000đ</span>
                                                    <span class="old">17.190.000đ</span>
                                                </div>
                                                <a href="" title="" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-12.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                <div class="price">
                                                    <span class="new">15.190.000đ</span>
                                                    <span class="old">17.190.000đ</span>
                                                </div>
                                                <a href="" title="" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-05.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                <div class="price">
                                                    <span class="new">15.190.000đ</span>
                                                    <span class="old">17.190.000đ</span>
                                                </div>
                                                <a href="" title="" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-22.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                <div class="price">
                                                    <span class="new">15.190.000đ</span>
                                                    <span class="old">17.190.000đ</span>
                                                </div>
                                                <a href="" title="" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-23.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                <div class="price">
                                                    <span class="new">15.190.000đ</span>
                                                    <span class="old">17.190.000đ</span>
                                                </div>
                                                <a href="" title="" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-18.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                <div class="price">
                                                    <span class="new">15.190.000đ</span>
                                                    <span class="old">17.190.000đ</span>
                                                </div>
                                                <a href="" title="" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                        <li class="clearfix">
                                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                                <img src="public/images/img-pro-15.png" alt="">
                                            </a>
                                            <div class="info fl-right">
                                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                                <div class="price">
                                                    <span class="new">15.190.000đ</span>
                                                    <span class="old">17.190.000đ</span>
                                                </div>
                                                <a href="" title="" class="buy-now">Mua ngay</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="section" id="banner-wp">
                                <div class="section-detail">
                                    <a href="" title="" class="thumb">
                                        <img src="public/images/banner.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>










    </body>
</html>
