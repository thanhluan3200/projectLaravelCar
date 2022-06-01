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
    <style>

        .order-form .container {
            color: #4c4c4c;
            padding: 20px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, .1);
        }

        .order-form-label {
            margin: 8px 0 0 0;
            font-size: 14px;
            font-weight: bold;
        }

        .order-form-input {
            width: 100%;
            padding: 8px 8px;
            border-width: 1px !important;
            border-style: solid !important;
            border-radius: 3px !important;
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            font-weight: normal;
            font-style: normal;
            line-height: 1.2em;
            background-color: transparent;
            border-color: #cccccc;
        }

        .btn-submit:hover {
            background-color: #090909 !important;
        }

        .col-12 button {
            float: left;
            background-color: #4E3E55;
            color: white;
            border: none;
            box-shadow: none;
            font-size: 17px;
            font-weight: 500;
            font-weight: 600;
            border-radius: 3px;
            padding: 15px 35px;
            margin: 26px 5px 0 5px;
            cursor: pointer;


        }
        .col-12 button:focus{
            outline: none;

        }
        .col-12 button:hover{
            background-color: #33DE23;


        }
        .col-12 button:active{
            background-color: #81ccee;

        }
    </style>


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

                        <div class="shopper-informations">
                            <div class="row">

                                <div class="col-sm-12 clearfix">
                                    <div class="bill-to">
                                        <p>Điền thông tin gửi hàng</p>


                                            <form method="POST" action="{{route('product.savecheckoutcustomer')}}">
                                                    <hr class="mt-1">
                                                @csrf
                                                <div class="row mx-4">


                                                    <div class="col-12 col-sm-6 mt-2 mt-sm-0" style="padding-left: 0">
                                                        <label class="order-form-label">Họ</label>
                                                        <input class="order-form-input" data-success="right" type="text" name="name" placeholder="Họ" class="form-control" required="required">
                                                    </div>
                                                    <div class="col-12 col-sm-6" style="padding-right: 0">
                                                        <label class="order-form-label">Email</label>
                                                        <input class="order-form-input" data-success="right" name="email" type="text" placeholder="Email" class="form-control" required="required">
                                                    </div>


                                                </div>
                                                <div class="row mt-3 mx-4">
                                                    <div class="col-12">
                                                        <label class="order-form-label">Số điện thoại</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input class="order-form-input" data-success="right" name="phone" type="text" placeholder="Điện thoại" class="form-control" required="required">
                                                    </div>
                                                </div>
                                                <div class="row mt-3 mx-4">
                                                    <div class="col-12">
                                                        <label class="order-form-label">Địa chỉ</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input class="order-form-input" data-success="right" name="address" type="text" placeholder="Tỉnh/Tp, Quận/Huyện, Phường/Xã" class="form-control" required="required">
                                                    </div>
                                                </div>
                                                <div class="row mt-3 mx-4">
                                                    <div class="col-12">
                                                        <label class="order-form-label">Ghi chú</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea name="note" name="decription" placeholder="Ghi chú cho đơn hàng của bạn" class="order-form-input" cols="60" rows="16"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <input type="submit" name="submit" id="b3"  class="btn btn-dark d-block mx-auto btn-submit" style="margin: 10px 50%;" value="Thanh toán">

                                                    </div>
                                                </div>
                                            </form>







{{--                                            <form action="{{route('product.savecheckoutcustomer')}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <input name="email" type="text" placeholder="Email">--}}
{{--                                                <input name="name" type="text" placeholder="Họ và tên">--}}
{{--                                                <input name="address" type="text" placeholder="Địa chỉ">--}}
{{--                                                <input name="phone" type="text" placeholder="Phone">--}}
{{--                                                <textarea name="note"--}}
{{--                                                          placeholder="Ghi chú cho đơn hàng của bạn"--}}
{{--                                                          rows="16"></textarea>--}}
{{--                                                <button type="submit" class="btn btn-primary">Gửi</button>--}}
{{--                                            </form>--}}


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection





