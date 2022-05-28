<script>
    //Vi sau khi update quantity Controller chi render html khong chay lai js nen phai de js trong file html de khi render co ca js
    $(function () {
        $('.update-carts').on('click', updateCart);
        $('.delete-carts').on('click', deleteCart);
    });

    function updateCart(event) {
        event.preventDefault();
        let urlCart = $('.update-cart-url').data('url');
        let idCart = $(this).data('id');
        let quantity = $(this).parents('tr').find('input.quantity').val();
        $.ajax({
            type: 'GET',
            url: urlCart,
            data: {id: idCart, quantity: quantity},
            success: function (data) {
                if (data.code === 200) {
                    Swal.fire('Cập nhật thành công!')
                    // console.log(data.cart_component);
                    $('.cart-wrapper').html(data.cart_component);
                }
            },
            error: function () {

            }
        });
    }

    function deleteCart(event) {
        event.preventDefault();
        let url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                if (data.code === 200) {
                    $('.cart-wrapper').html(data.cart_component);
                    if (data.cartNumber != null) {
                        $('#span-cart').html(data.cartNumber);
                    }
                }
            },
            error: function () {

            }
        });

    }
</script>

<table id="cart" class="table table-hover table-condensed" data-url="{{route('product.updateCart')}}">
    <thead>
    <tr>
        <th style="width:40%">Sản phẩm</th>
        <th style="width:10%">Giá</th>
        <th style="width:10%">Số lượng</th>
        <th style="width:20%" class="text-center">Thành tiền</th>

        <th style="width:20%"> Edit</th>
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
        <td data-th="Product">
            <div class="row">
                <div class="col-sm-3 hidden-xs"><img src="{{$cartItem['image']}}" alt="Sản phẩm 1" class="img-responsive" width="100">
                </div>
                <div class="col-sm-8">
                    <h6 class="nomargin">{{$cartItem['name']}}</h6>
                </div>
            </div>
        </td>
        <td data-th="Price">{{ number_format($cartItem['price'],0,',','.')}}</td>
        <td scope="row"><input class="quantity" type="number" value="{{$cartItem['quantity']}}" min="1"
                               style="width: 50px"></td>
        <td scope="row" class="total">{{number_format($cartItem['price'] * $cartItem['quantity'],0,',','.')}}
           <sup>VNĐ</sup>
        </td>
        <td>
            <a data-id="{{$id}}" class="btn btn-default update-carts">Cập nhật</a>
            <a href="" data-url="{{route('product.deleteCart',['id'=>$id])}}"
               class="btn btn-danger delete-carts">Xóa</a>
        </td>
    </tr>
    <tr>

    </tbody>
    @endforeach
    @endif
    <tfoot>

    <tr>
        <td><a href="{{route('home')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
        </td>
        <td colspan="2" class="hidden-xs"> </td>
        <td class="hidden-xs text-center"><strong>Tổng tiền: {{number_format($total,0,',','.')}}<sup>VNĐ</sup>  </strong>
        </td>
        <?php
        $customer_id = \Illuminate\Support\Facades\Session::get('customer_id');
        $shipping_id = \Illuminate\Support\Facades\Session::get('shipping_id');
        if (isset($customer_id) && !isset($shipping_id)) {
        ?>
        <td><a href="{{route('product.loginCheckout')}}" class="btn btn-success btn-block">Đặt hàng</a>
        </td>

        <?php
        }
        elseif (isset($customer_id) && isset($shipping_id)) {
        ?>
        <td><a href="{{route('product.payment')}}" class="btn btn-success btn-block">Đặt hàng</a>
        </td>

        <?php
        }
        else{
        ?>
        <td><a href="{{route('product.loginCheckout')}}" class="btn btn-success btn-block">Đặt hàng</a>
        </td>

        <?php
        }?>
    </tr>
    </tfoot>
</table>




{{--<table class="table update-cart-url" data-url="{{route('product.updateCart')}}">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th scope="col">Ảnh</th>--}}
{{--        <th scope="col">Tên sản phẩm</th>--}}
{{--        <th scope="col">Giá</th>--}}
{{--        <th scope="col">Số lượng</th>--}}
{{--        <th scope="col">Tổng</th>--}}
{{--        <th scope="col">Action</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @php--}}
{{--        $total = 0;--}}
{{--    @endphp--}}
{{--    @if(isset($carts) && !is_null($carts))--}}
{{--        @foreach($carts as $id => $cartItem)--}}
{{--            @php--}}
{{--                $total += ($cartItem['price'] * $cartItem['quantity']);--}}
{{--            @endphp--}}
{{--            <tr>--}}
{{--                <th scope="row"><img src="{{$cartItem['image']}}"--}}
{{--                                     style="width: 80px;height: 80px">--}}
{{--                </th>--}}
{{--                <th scope="row">{{$cartItem['name']}}</th>--}}
{{--                <th scope="row" class="price">{{ number_format($cartItem['price'],0,',','.')}}</th>--}}
{{--                <th scope="row"><input class="quantity" type="number" value="{{$cartItem['quantity']}}" min="1"--}}
{{--                                       style="width: 50px"></th>--}}
{{--                <th scope="row" class="total">{{number_format($cartItem['price'] * $cartItem['quantity'],0,',','.')}}--}}
{{--                    VNĐ--}}
{{--                </th>--}}
{{--                <td>--}}
{{--                    <a data-id="{{$id}}" class="btn btn-default update-carts">Cập nhật</a>--}}
{{--                    <a href="" data-url="{{route('product.deleteCart',['id'=>$id])}}"--}}
{{--                       class="btn btn-danger delete-carts">Xóa</a>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    @endif--}}
{{--    </tbody>--}}
{{--</table>--}}

{{--<div class="row">--}}
{{--    <div class="col-sm-6" style="margin-bottom: 5rem">--}}
{{--        <div class="total_area">--}}
{{--            <ul>--}}
{{--                <li>Tổng <span>{{number_format($total,0,',','.')}} VNĐ</span></li>--}}
{{--                <li>Thuế <span>0 VNĐ</span></li>--}}
{{--                <li>Phí vận chuyển <span>Miễn phí</span></li>--}}
{{--                <li>Thành tiền <span>{{number_format($total,0,',','.')}} VNĐ</span></li>--}}
{{--            </ul>--}}
{{--            <a class="btn btn-default update" href="javascript:void(0)">Cập nhật</a>--}}
{{--            <?php--}}
{{--            $customer_id = \Illuminate\Support\Facades\Session::get('customer_id');--}}
{{--            $shipping_id = \Illuminate\Support\Facades\Session::get('shipping_id');--}}
{{--            if (isset($customer_id) && !isset($shipping_id)) {--}}
{{--            ?>--}}
{{--            <a class="btn btn-default check_out" href="{{route('product.checkout')}}"> Thanh toán</a>--}}
{{--            <?php--}}
{{--            }--}}
{{--            elseif (isset($customer_id) && isset($shipping_id)) {--}}
{{--            ?>--}}
{{--            <a class="btn btn-default check_out" href="{{route('product.payment')}}"> Thanh toán</a>--}}
{{--            <?php--}}
{{--            }--}}
{{--            else{--}}
{{--            ?>--}}
{{--            <a class="btn btn-default check_out" href="{{route('product.loginCheckout')}}"> Thanh toán</a>--}}

{{--            <?php--}}
{{--            }?>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

