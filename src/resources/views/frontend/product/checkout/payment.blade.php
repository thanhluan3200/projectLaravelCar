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

                        <div class="review-payment">
                            <h2 style="text-transform: uppercase">Đơn hàng của bạn</h2>
                            <table class="table update-cart-url" style="margin-bottom: 10rem">
                                <thead>
                                <tr>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @if(isset($carts) && !is_null($carts))
                                    @foreach($carts as $id => $cartItem)
                                        @php
                                            $total += ($cartItem['price'] * $cartItem['quantity']);
                                        @endphp
                                        <tr>
                                            <th scope="row"><img src="{{$cartItem['image']}}"
                                                                 style="width: 80px;height: 80px">
                                            </th>
                                            <td scope="row">{{$cartItem['name']}}</td>
                                            <td scope="row"
                                                class="price">{{ number_format($cartItem['price'],0,',','.')}}</td>
                                            <td scope="row"><input disabled class="quantity" type="number"
                                                                   value="{{$cartItem['quantity']}}" min="1"
                                                                   style="width: 50px"></td>
                                            <td scope="row"
                                                class="total">{{number_format($cartItem['price'] * $cartItem['quantity'],0,',','.')}}
                                                VNĐ
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif

{{--                                <h1 style="text-transform: uppercase">Tổng tiền - {{number_format($total,0,',','.')}}--}}
{{--                                    VNĐ</h1>--}}
{{--                                </tbody>--}}
                                <div class="row" style="color: #1e529b;">
                                    <div class="col-xs-6" style="padding-left: 30%">
                                        <ul type="none">
                                            <li class="left">Ngày đặt:</li>
                                            <li class="left">Tổng tiền hàng:</li>
                                            <li class="left">Phí vận chuyển:</li>
                                            <li class="left">Tổng thanh toán:</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6">
                                        <ul class="right" type="none">
                                            <li class="right">20-04-2022</li>
                                            <li class="right">{{number_format($total,0,',','.')}}<sup>VNĐ</sup></li>
                                            <li class="right">Miễn phí vận chuyển</li>
                                            <li class="right">{{number_format($total,0,',','.')}}<sup>VNĐ</sup></li>
                                        </ul>
                                    </div>
                                </div>                            </table>

                        </div>

                        <form action="{{route('product.orderPlace')}}" method="post" style="text-align: center">
                            @csrf
                            <div class="payment-options">
                                <input hidden type="text" name="cart_total" value="{{$total}}">
                                <h4 style="text-transform: uppercase">Chọn hình thức thanh toán </br></h4>
                                <span>
						<label><input disabled name="payment_method" value="atm" type="radio"> Trả bằng ATM</label>
					</span>
                                <span>
						<label><input name="payment_method" value="cash" checked type="radio"> Tiền mặt (trả tiền khi nhận hàng)</label>
					</span>
                            </div>
                            <button type="submit" class="btn btn-success">Đặt hàng</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection





