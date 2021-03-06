<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>我的订单</title>

    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}"/>

    <style>
        .col-card {
            height: 90px;
            border-radius: 15px;
            line-height: 80px;
            text-align: center;
            font-size: 1em;
            background-color: #007aff;
            color: white;
            margin-bottom:1em;
        }

        .row-my {
            margin-bottom: 1em;
        }

        .a-my {
            color: white;
            text-decoration: none;
            display: block;
        }

        .a-coupon{
            line-height: 30px;
        }

        .card p {
            margin: 0.1em 0;
            font-size: 0.9em;
        }
    </style>

</head>
<body style="display:none;">
<div class="views">
    <div class="view view-main" id="notended">
        <div class="navbar">
            <div class="navbar-inner">
                <!-- Sub navbar -->
                <div class="subnavbar" style="margin-top: -30px;">
                    <div class="buttons-row">
                        <a href="#tab-notend" class="button tab-link active" v-on:click="notend">未完成</a>
                        <a href="#tab-ended" class="button tab-link" v-on:click="ended">已完成</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pages navbar-through">
            <!-- Pag has additional "with-subnavbar" class -->
            <div class="page">
                <div class="page-content">
                    <div class="tabs">
                        <div id="tab-notend" class="tab active">
                            <div class="content">
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="swipeout" v-for="item in notend">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">收货人：@{{item.to_name }}</div>
                                                        <div class="item-after">@{{item.order_status}}
                                                            /@{{item.pay_status}}</div>
                                                    </div>
                                                    <div class="item-subtitle">单号：@{{item.order_code}}</div>
                                                    <div class="item-text" style="color:red;">名称：@{{ item.cargo_name }}<br />价格：@{{item.price}}</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                        <a href="#" class="to-top"
                                                       style="background-color: #00c795" onclick="itemPay(@{{ $index }})" v-if="(item.pay_flag == true)">支付</a>
                                                <a href="#" style="background-color: red;" class="item-delete"
                                                    v-if="(item.sure_flag ==true)" onclick="itemSuring(@{{ $index }})">订单确认</a>
                                                <a href="#" style="background-color: red;" class="item-success"
                                                   onclick="itemSended(@{{ $index }})" v-if="(item.sended_flag ==true)">签收</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="tab-ended" class="tab">
                            <div class="content">
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="swipeout" v-for="item in ended">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">收货人：@{{ item.to_name }}</div>
                                                        <div class="item-after">@{{item.order_status}}
                                                            /@{{item.pay_status}}</div>
                                                    </div>
                                                    <div class="item-subtitle">单号：@{{item.order_code}}</div>
                                                    <div class="item-text" style="color:red;">名称：@{{ item.cargo_name }}<br />价格：@{{item.price}}</div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup-suring">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="center">待确认订单</div>
                </div>
            </div>
            <div class="pages navbar-through">
                <!-- Pag has additional "with-subnavbar" class -->
                <div class="page">
                    <div class="page-content">
                        <div class="card">
                            <div class="card-header">订单号:@{{ item.order_code }}</div>
                            <div class="card-content">
                                <div class="card-content-inner">
                                    <p>发货人：@{{ item.from_name }} @{{ item.from_phone }}</p>
                                    <p>地址：@{{ item.from_pca }}</p>
                                    <p>详细地址：@{{ item.from_street }}</p>
                                    <hr/>
                                    <p>收货人：@{{ item.to_name }} @{{ item.to_phone }}</p>
                                    <p>地址：@{{ item.to_pca }}</p>
                                    <p>详细地址：@{{ item.to_street }}</p>
                                    <hr/>
                                    <p>货物名称：@{{ item.cargo_name }}</p>
                                    <p>件数：@{{ item.cargo_count }}</p>
                                    <p>重量(Kg)：@{{ item.cargo_weight }}</p>
                                    <p>体积(m&sup2;)：@{{ item.cargo_volume }}</p>
                                    <hr/>
                                    <p>付款方式：@{{ item.pay_method }}</p>
                                    <p>保价：@{{ item.cargo_insure }}</p>
                                    <p>提货方式：@{{ item.exchange_type }}</p>
                                    <p>回单要求：@{{ item.receipt_type }}</p>
                                    <p>
                                        备注：@{{ item.comment }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>运费(元)：@{{ item.price }}</p>
                            </div>
                        </div>
                        <div class="content-block">
                            <div class="row" style="margin-bottom: 100px;">
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-danger  close-popup"
                                                       data-popup="#popup-suring">取消</a>
                                </div>
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-success"
                                                       onclick="goingSuring()">订单确认</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup-sended">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="center">待签收订单</div>
                </div>
            </div>
            <div class="pages navbar-through">
                <!-- Pag has additional "with-subnavbar" class -->
                <div class="page">
                    <div class="page-content">
                        <div class="card">
                            <div class="card-header">订单号:@{{ item.order_code }}</div>
                            <div class="card-content">
                                <div class="card-content-inner">
                                    <p>发货人：@{{ item.from_name }} @{{ item.from_phone }}</p>
                                    <p>地址：@{{ item.from_pca }}</p>
                                    <p>详细地址：@{{ item.from_street }}</p>
                                    <hr/>
                                    <p>收货人：@{{ item.to_name }} @{{ item.to_phone }}</p>
                                    <p>地址：@{{ item.to_pca }}</p>
                                    <p>详细地址：@{{ item.to_street }}</p>
                                    <hr/>
                                    <p>货物名称：@{{ item.cargo_name }}</p>
                                    <p>件数：@{{ item.cargo_count }}</p>
                                    <p>重量(Kg)：@{{ item.cargo_weight }}</p>
                                    <p>体积(m&sup2;)：@{{ item.cargo_volume }}</p>
                                    <hr/>
                                    <p>付款方式：@{{ item.pay_method }}</p>
                                    <p>保价：@{{ item.cargo_insure }}</p>
                                    <p>提货方式：@{{ item.exchange_type }}</p>
                                    <p>回单要求：@{{ item.receipt_type }}</p>
                                    <p>
                                        备注：@{{ item.comment }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>运费(元)：@{{ item.price }}</p>
                            </div>
                        </div>
                        <div class="content-block">
                            <div class="row" style="margin-bottom: 100px;">
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-danger  close-popup"
                                                       data-popup="#popup-sended">取消</a>
                                </div>
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-success"
                                                       onclick="goingSended()">签收</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup-pay">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="center">待支付订单</div>
                </div>
            </div>
            <div class="pages navbar-through">
                <!-- Pag has additional "with-subnavbar" class -->
                <div class="page">
                    <div class="page-content">
                        <div class="card">
                            <div class="card-header">订单号:@{{ item.order_code }}</div>
                            <div class="card-content">
                                <div class="card-content-inner">
                                    <p>货物名称：@{{ item.cargo_name }}</p>
                                    <p>收货人：@{{ item.to_name }} @{{ item.to_phone }}</p>
                                    <p>地址：@{{ item.to_pca }}</p>
                                    <p>详细地址：@{{ item.to_street }}</p>

                                    <p>
                                        备注：@{{ item.comment }}
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>订单总价(元)：@{{ item.price }}</p>
                            </div>
                        </div>

                        <div class="list-block">
                            <ul>
                                <li>
                                    <a href="#" class="item-link item-content"  onclick="openPayCoupon()">
                                        <div class="item-inner">
                                            <div class="item-title">优惠券<span style="padding-left:2em;"
                                                                              id="pay">@{{ coupon_str }}</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title">抵用金<span style="padding-left:2em;"
                                                                         id="pay">@{{ needVbal }}</span></div>
                                    </div>
                                </li>
                                <li class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title">余额<span style="padding-left:2em;"
                                                                         id="pay">@{{ needBal }}</span></div>
                                    </div>
                                </li>
                                <li class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title">还需支付<span style="padding-left:2em;"
                                                                         id="pay">@{{ needPay }}</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="content-block">
                            <div class="row" style="margin-bottom: 100px;">
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-danger  close-popup"
                                                       data-popup="#popup-pay">取消</a>
                                </div>
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-success"
                                                       onclick="goingPay()">支付</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup-coupon">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="center">我的优惠券</div>
                </div>
            </div>
            <div class="pages navbar-through">
                <!-- Pag has additional "with-subnavbar" class -->
                <div class="page">
                    <div class="page-content">
                        <div class="content-block">
                            <div class="row row-my">
                                <div class="col-50 col-card" v-for="item in items">
                                    <a href="#" class="a-my a-coupon" onclick="selectCoupon(@{{ $index }})">@{{ item.reduce }}满@{{ item.satisfied }}可使用<br />再享@{{ item.discount }}折<br />@{{ item.invalid_time }}到期
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{!! URL::asset('js/vue.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{!! URL::asset('js/kitchen-sink.js') !!}"></script>
<script src="{!! URL::asset('js/jquery.min.js') !!}"></script>

<script>
    var myApp = new Framework7();

    // Export selectors engine
    var $$ = Dom7;

    // Add view
    var mainView = myApp.addView('.view-main', {
        // Because we use fixed-through navbar we can enable dynamic navbar
        //dynamicNavbar: true,
        //domCache: true //enable inline pages
    });
</script>
<script>
    var data = eval('(' + '<?php echo $data;?>' + ')');
    var notend = data.notend;
    var ended = data.ended;
    var member_id = '{!! $member_id !!}';
    var tab_notend = new Vue({
        el: "#tab-notend",
        data: {
            notend: notend,
        },
    });
    var tab_ended = new Vue({
        el: "#tab-ended",
        data: {
            ended: ended,
        },
    });

    var popupSuring = new Vue({
        el: "#popup-suring",
        data: {
            item: '',
        }
    });

    var popupSended = new Vue({
        el: "#popup-sended",
        data: {
            item: '',
        }
    });

    var popupPay = new Vue({
        el: "#popup-pay",
        data: {
            item: '',
            coupon_str:'',
            needVbal:'',
            needBal:'',
            needPay:'',
            reduce:0,
            price:0,
            discount:0,
        }
    });

    var popupCoupon = new Vue({
        el:"#popup-coupon",
        data:{
            items:[],
        }
    });
</script>


<script>

    function goingPay(){
        $.get('gopay?member_id='+'{!! $member_id !!}');
        backToWechat();
    }

    function selectCoupon(index){
        var coupon = popupCoupon.items[index];
        popupPay.coupon_str = "满"+coupon.satisfied+"减"+coupon.reduce+"再享"+coupon.discount;
        popupPay.reduce = coupon.reduce;
        popupPay.reduce = (popupPay.price - popupPay.reduce)*(100 - coupon.discount)/100;

        var price = popupPay.price - popupPay.reduce;


        var bal = popupPay.item.bal;
        var vbal = popupPay.item.vbal;
        if(price>vbal){
            popupPay.needVbal = vbal;
        }else{
            popupPay.needVbal = price;
        }

        price = price - popupPay.needVbal;

        if(price >0){
            if(price>bal){
                popupPay.needBal = bal;
            }else{
                popupPay.needBal = price;
            }
        }
        price = price - popupPay.needBal;

        popupPay.needPay = price;

        myApp.closeModal('#popup-coupon');
    }

    function openPayCoupon(){
        popupCoupon.items = popupPay.item.coupons;
        myApp.popup('#popup-coupon');
    }

    function goingCashPay(){
        var order_code = popupPay.item.order_code;
        var order_id = popupPay.item.order_id;
        var price = popupPay.item.price;

        myApp.confirm('订单号：'+order_code+'<br />金额：'+price,'现金支付确认',function(){
            var query = {
                order_id:order_id,
            }
            $.get('ordercashpay',query,function(res){
                backToWechat();
            });
        })
    }

    function goingSuring() {
        var order_code = popupSuring.item.order_code;
        var order_id = popupSuring.item.order_id;

        myApp.confirm('订单号：' + order_code, '确认订单', function () {
            var query = {
                order_id: order_id,
                member_id:member_id,
                order_code:order_code
            };
            $.get('ordersure', query, function (res) {
                myApp.alert('订单确认成功！',function(){
                    backToWechat();
                });
                /*myApp.closeModal('#popup-pricing');

                var item = '.'+order_code;
                $(item).remove();*/
            });
        });

    }

    function goingSended() {
        var order_code = popupSended.item.order_code;
        var order_id = popupSended.item.order_id;

        myApp.confirm('订单号：' + order_code, '订单签收', function () {
            var query = {
                order_id: order_id,
                member_id:member_id,
                order_code:order_code
            };
            $.get('sendedsure', query, function (res) {
                myApp.alert('订单签收成功！',function(){
                    backToWechat();
                });
                /*myApp.closeModal('#popup-pricing');

                 var item = '.'+order_code;
                 $(item).remove();*/
            });
        });

    }

    function backToWechat(){
        var readyFunc = function onBridgeReady() {
            WeixinJSBridge.invoke('closeWindow', {}, function (res) {
            });
        }

        if (typeof WeixinJSBridge === "undefined") {
            document.addEventListener('WeixinJSBridgeReady', readyFunc, false);
        } else {
            readyFunc();
        }
    }

    function itemPay(index) {
        popupPay.item = notend[index];
        popupPay.coupon_str = "请选择优惠券";
        var price = popupPay.item.price;
        popupPay.price = price;
        popupPay.discount = popupPay.item.discount;

        var bal = popupPay.item.bal;
        var vbal = popupPay.item.vbal;
        if(price>vbal){
            popupPay.needVbal = vbal;
        }else{
            popupPay.needVbal = price;
        }

        price = price - popupPay.needVbal;

        if(price >0){
            if(price>bal){
                popupPay.needBal = bal;
            }else{
                popupPay.needBal = price;
            }
        }
        price = price - popupPay.needBal;

        popupPay.needPay = price;
        myApp.popup('#popup-pay');
    }

    function itemSuring(index) {
        popupSuring.item = notend[index];
        myApp.popup('#popup-suring');
    }

    function itemSended(index) {
        popupSended.item = notend[index];
        myApp.popup('#popup-sended');
    }

    function sure(order_id){
        $.get('ordersure?order_id='+order_id,function(res){
           myApp.alert("订单已确认完成");
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>

</body>
</html>

