<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>个人中心</title>
    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <style>
        .col-card {
            height: 80px;
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
            line-height: 40px;
        }

        .card p {
            margin: 0.1em 0;
            font-size: 0.9em;
        }
    </style>

</head>
<body style="display:none;">
<!-- Status bar overlay for full screen mode (PhoneGap) -->

<!-- Views -->
<div class="views">
    <!-- Your main view, should have "view-main" class -->
    <div class="view view-main">
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages">
            <!-- Page, "data-page" contains page name -->
            <div class="page">
                <!-- Scrollable page content -->
                <div class="page-content" id="member">
                    <div class="content-block" style="height:150px;background-color: silver;margin-top: 0;">
                        <div class="row" style="padding-top: 25px;padding-bottom: 10px;margin-left: 0;">
                            <div class="col-100" style="text-align: center;margin-left: 0;">@{{ member_name }}</div>
                        </div>
                        <div class="row" style="margin-left: 0;">
                            <div class="col-100" style="text-align: center;margin-left: 0;">@{{ member_phone }}</div>
                        </div>
                        <div class="row" style="margin-top:35px;">
                            <div class="col-33" style="text-align: center;">余额(元)<br/>@{{ member_bal }}</div>
                            <div class="col-33" style="text-align: center;">抵用金(元)<br/>@{{ member_vbal }}</div>
                            <div class="col-33" style="text-align: center;">积分<br/>@{{ member_points }}</div>
                        </div>
                    </div>
                    <div class="list-block" style="margin-top: -35px;margin-bottom: 35px;">
                        <ul>
                            <li class="item-content" style="padding-left: 45%;" onclick="openRecharge()">
                                <div class="item-inner">
                                    <div class="item-title">充值</div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="list-block">
                        <ul>
                            <li>
                                <a href="order?member_id={!! $member_id !!}" class="item-link item-content external">
                                    <div class="item-inner">
                                        我的订单
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="item-link item-content" class="external" onclick="openMyCoupon()">
                                    <div class="item-inner">
                                        我的优惠券
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="commonaddress?openid={!! $openid !!}" target="_blank"
                                   class="item-link item-content external">
                                    <div class="item-inner">
                                        常用地址簿
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup-recharge">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="center">充值</div>
                </div>
            </div>
            <div class="pages navbar-through">
                <!-- Pag has additional "with-subnavbar" class -->
                <div class="page">
                    <div class="page-content">
                        <div class="content-block">
                            <div class="row row-my">
                                <div class="col-50 col-card" v-for="item in items" onclick="recharge(@{{ $index }})"><a href="#" class="a-my">充@{{ item.satisfied }}送@{{ item.give }}抵用金</a></div>
                                {{--<div class="col-50 col-card"><a href="#money" class="a-my">充1000送200块</a></div>
                                <div class="col-50 col-card"><a href="#pricing" class="a-my">充5000送1200块</a></div>
                                <div class="col-50 col-card"><a href="#money" class="a-my">充10000送2500块</a></div>--}}
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
                                <div class="col-50 col-card"><div href="#pricing" class="a-my a-coupon" disabled><span>50满1000可使用</span><br /><span>已过期</span></div></div>
                                <div class="col-50 col-card"><a href="#money" class="a-my a-coupon">50满1000可使用<br />2016-11-1到期</a></div>

                                <div class="col-50 col-card"><a href="#pricing" class="a-my a-coupon">50满1000可使用<br />2016-11-1到期</a></div>

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
    // Initialize your app
    var myApp = new Framework7();

    // Export selectors engine
    var $$ = Dom7;

    var mainView = myApp.addView('.view-main', {
        // Because we use fixed-through navbar we can enable dynamic navbar
        //dynamicNavbar: true
    });
</script>
<script>
    var recharge_rules = eval('(' + '<?php echo $recharge_rules;?>' + ')');
    var member = new Vue({
        el: "#member",
        data: {
            member_name: '{!! $member_name !!}',
            member_phone: '{!! $member_phone !!}',
            member_bal: '{!! $member_bal !!}',
            member_val: '{!! $member_vbal !!}',
            member_vbal: '{!! $member_vbal !!}',
            member_points: '{!! $member_points !!}'
        }
    });

    var popupRecharge = new Vue({
       el:"#popup-recharge",
        data:{
            items:recharge_rules
        }
    });
</script>

<script>
    function recharge(index){
        var satisfied = recharge_rules[index].satisfied;
        var give = recharge_rules[index].give;
        var query = {
          satisfied:satisfied,
            give:give,
            member_id:'{!! $member_id !!}'
        };
        myApp.confirm('充'+satisfied+'送'+give+'抵用金','充值',function(){
            $.get('recharge',query,function(res){
                backToWechat();
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

    function openMyCoupon(){
        myApp.popup('#popup-coupon');
    }

    function openRecharge(){
        myApp.popup('#popup-recharge');
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>
</body>
</html>