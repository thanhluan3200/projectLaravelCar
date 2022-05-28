{{--<footer id="footer"><!--Footer-->--}}
{{--    <div class="footer-bottom">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                {!! getConfigValueFromSettingTable('footer_infomation') !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</footer><!--/Footer-->--}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    <style>
        .footer-top h3 {
            padding-bottom: 10px;
            color: #fff;
        }
        h3 {
            font-size: 22px;
            font-weight: 300;
            color: #555;
            line-height: 30px;
            font-style: italic;
        }
        .mail a {
            color: #79a05f;
            text-decoration: none;
            transition: all .3s;
        }
        a{
            color: #aaa;
        }
        a:hover {

            text-decoration: none;
            color: white;

        }
    </style>
</head>
<body>
<footer style="margin-top: 50px;">
    <div class="footer-top " style="padding: 60px 0;background: #333;text-align: left;color: #aaa; font-family: 'Open Sans', sans-serif;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-about wow fadeInUp">
                    <h3>VCar Shopper</h3>
                    <p>
                        Xe hơi các loại
                    </p>
                    <p>Mở cửa: Mon - Fri: 7AM - 10PM</p>
                </div>
                <div class="col-md-4 offset-md-1 footer-contact wow fadeInDown">
                    <h3>LIÊN HỆ</h3>
                    <p><i class="fas fa-map-marker-alt"></i> Chủ shop: Khoa Công Nghệ Thông Tin</p>
                    <p><i class="fab fa-skype"></i> Địa chỉ: Phù Đổng Thiên Vương, Tp.Đà Lạt</p>
                    <p><i class="fas fa-phone"></i> Phone: 0345698721</p>
                    <p class="mail"><i class="fas fa-envelope"></i> Email: vcarshopper@gmail.com<a href="mailto:"></a></p>
                    <p><i class="fab fa-skype"></i> Mã thuế: 5416597235</p>
                </div>

                <div class="col-md-4 footer-links wow fadeInUp">

                    <h3>DANH MỤC</h3>
                    @foreach($categorys as $value)
                        <li>{{$value->name}}</li>
                    @endforeach



                </div>

            </div>
        </div>
    </div>
    <div class=".footer-bottom text-center p-3" style=" background: #444; color: #aaa;">
        © 2022 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">VCAR-SHOPPER.com</a>
    </div>
</footer>



