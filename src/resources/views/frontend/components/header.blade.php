<style>


    .header_shop{
        display: flex;
        color: var(--text-color);
        margin-top: 30px;
        margin-bottom: 30px;
    }
    .header_shop a:hover{
        text-decoration:none;
        opacity:1;
        color:black;

    }

    .logo-image-text-slogan{
        display: flex;
        align-items: center;

    }
    .site-title-wrap{
        padding-left: 15px;
    }
    .site-title{
        font-family: 'Marcellus SC';
        font-size: 30px;
        margin-bottom: 0;

    }
    .site-title a{
        color: #327232 !important;
        font-weight: 700;

    }
    .site-description{
        margin: 0;
        font-size: 0.8888em;
    }
    .header-contact{
        display: flex;
        flex: auto;
        align-items: center;
        justify-content: flex-end;
    }
    .header-contact .contact-block{
        border-left: 1px solid rgba(0,0,0,0.1);
        padding-left: 75px;
        margin-right: 15px;
        float: left;
        position: relative;
    }
    .header-contact .contact-block > svg{
        height: 50%;
        width: 10%;
        left: 15%;
        position: absolute;
        float: left;

        top: 60%;
        transform: translateY(-50%);
        color: #999596;
    }
    .header-contact .contact-block:first-child{
        border-left: none;
    }
    .header-contact .contact-block .content {
        margin: 0;
        font-size: 0.85em;
        font-weight: 700;
        line-height: 1.3;
        color: var(--text-color);
    }
    .header-contact .contact-block .content a{
        color: var(--text-color);

    }
    .contact-block span{
        font-size: 1em;
        font-weight: 500;
        color: #999596;
    }
    .contact-block a{
        font-weight:600;
        color: #5e5a5a;
    }
</style>

<header id="header"><!--header-->
{{--    <div class="header_top"><!--header_top-->--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <div class="contactinfo">--}}
{{--                        <ul class="nav nav-pills">--}}
{{--                            <li><a href="#"><i--}}
{{--                                        class="fa fa-phone"></i> {{getConfigValueFromSettingTable('phone_contact')}}</a>--}}
{{--                            </li>--}}
{{--                            <li><a href="{{getConfigValueFromSettingTable('email')}}"><i--}}
{{--                                        class="fa fa-envelope"></i> {{getConfigValueFromSettingTable('email')}}</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <div class="social-icons pull-right">--}}
{{--                        <ul class="nav navbar-nav">--}}
{{--                            <li><a href="{{getConfigValueFromSettingTable('facebook_link')}}"><i--}}
{{--                                        class="fa fa-facebook"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                            <li><a href="{{getConfigValueFromSettingTable('linkendin_link')}}"><i--}}
{{--                                        class="fa fa-linkedin"></i></a></li>--}}
{{--                            <li><a href="{{getConfigValueFromSettingTable('google_link')}}"><i--}}
{{--                                        class="fa fa-google-plus"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div><!--/header_top-->--}}

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
{{--                        <a href="{{route('home')}}"><img src="/eshopper/images/home/logo.png" alt=""/></a>--}}
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li>
                                <?php
                                $customer_id = \Illuminate\Support\Facades\Session::get('customer_id');
                                $shipping_id = \Illuminate\Support\Facades\Session::get('shipping_id');
                                if (isset($customer_id) && !isset($shipping_id)) {
                                ?>
                                <a href="{{route('product.checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a>
                                <?php
                                }
                                elseif (isset($customer_id) && isset($shipping_id)) {
                                ?>
                                <a href="{{route('product.payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a>
                                <?php
                                }
                                else{
                                ?>
                                <a href="{{route('product.loginCheckout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a>

                                <?php
                                }
                                ?>
                            </li>
                            <li>
                                <a href="{{route('product.showCart')}}">
                                    <i class="fa fa-shopping-cart"></i>
                                    @if(isset($cartsNumber) &&$cartsNumber > 0)
                                        <span id="span-cart"
                                              class="badge badge-danger navbar-badge">{{$cartsNumber}}</span>
                                    @else
                                        <span id="span-cart" class="badge badge-danger navbar-badge"></span>
                                    @endif
                                    Giỏ hàng
                                </a>
                            </li>
                            <?php
                            $customer_id = \Illuminate\Support\Facades\Session::get('customer_id');
                            if (!isset($customer_id)) {
                            ?>
                            <li><a href="{{route('product.loginCheckout')}}"><i class="fa fa-lock"></i> Đăng nhập</a>
                            <?php
                            }else{
                            ?>
                            <li><a href="{{route('product.logoutCheckout')}}"><i class="fa fa-lock"></i> Đăng xuất - {{\App\Customer::find($customer_id)->name}}</a>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

<!--/header-->
<div class="container">
    <div class="header_shop">
        <div class="logo-image-text-slogan">
            <a href="{{route('home')}}" class="custom-logo-link">
                <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" width="160px" height="160px" alt="VCar Shopper">
            </a>
            <div class="site-title-wrap">
                <p class="site-title">
                    <a  href="{{route('home')}}">VCar Shopper</a>
                </p>
                <p class="site-description">Xe hơi các loại</p>
            </div>
        </div>
        <div class="header-contact">
            <div class="contact-block ">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
                <span class="title_phone">Điện thoại</span>
                <p class="content_phone"><a href="tel:+8492849682">+(84) 92849682</a></p>
            </div>
            <div class="contact-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                </svg>
                <span class="title_email">Email</span>
                <p class="content_email">
                    <a href="mailto:1812816@dlu.edu.vn">vcarshopper@gmail.com</a>
                </p>
            </div>
            <div class="contact-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                </svg>
                <span class="title_hopening-">Giờ mở cửa</span>
                <p class="content_hopening">Mon - Fri: 7AM - 10PM</p>
            </div>
        </div>
    </div>
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    @include('frontend.components.main_menu')
                </div>

            </div>
        </div>
    </div><!--/header-bottom-->
</header>
