@extends('frontend.layouts.master')

@section('title')
    <title> E-Shopper</title>
@endsection

@section('css')
    <link href="{{asset('home-frontend/home.css')}}" rel="stylesheet">

@endsection

@section('js')
    <script src="{{asset('home-frontend/home.js')}}"></script>

@endsection

@section('content')

    <section>
        <div class="container">
            <div class="row">
                @include('frontend.components.sidebar')
                <div class="col-sm-9 padding-right cart-wrapper">
                    <div class="row" style="margin-bottom: 30rem">

                        <div class="breadcrumbs">
                            <ol class="breadcrumb">
                                <li><a href="javascript:void(0)">Home</a></li>
                                <li class="active">Thanh toán</li>
                            </ol>
                        </div><!--/breadcrums-->

                        <h2 style="text-transform: uppercase">Đặt hàng thành công</h2>
                        <a href="{{route('home')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection





