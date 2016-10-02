<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>个人中心</title>
    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
</head>
<body>
<!-- Status bar overlay for full screen mode (PhoneGap) -->

<!-- Views -->
<div class="views">
    <!-- Your main view, should have "view-main" class -->
    <div class="view view-main">
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages">
            <!-- Page, "data-page" contains page name -->
            <div  class="page">
                <!-- Scrollable page content -->
                <div class="page-content">
                    <div class="content-block" style="height:150px;background-color: silver;margin-top: 0;">
                        <div class="row" style="padding-top: 25px;padding-bottom: 10px;margin-left: 0;">
                            <div class="col-100" style="text-align: center;margin-left: 0;">*长兵</div>
                        </div>
                        <div class="row" style="margin-left: 0;">
                            <div class="col-100" style="text-align: center;margin-left: 0;">155****9896</div>
                        </div>
                        <div class="row" style="margin-top:35px;">
                            <div class="col-33" style="text-align: center;">余额(元)<br/>1000.00</div>
                            <div class="col-33" style="text-align: center;">抵用金(元)<br/>3000000.00</div>
                            <div class="col-33" style="text-align: center;">积分<br />900</div>
                        </div>
                    </div>
                    <div class="list-block" style="margin-top: -35px;margin-bottom: 35px;">
                        <ul>
                            <li class="item-content" style="padding-left: 45%;">
                                <div class="item-inner" >
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
                        </ul>
                    </div>

                    <div class="list-block">
                        <ul>
                            <li>
                                <a href="http;" class="item-link item-content" class="external">
                                    <div class="item-inner">
                                        我的优惠券
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="list-block">
                        <ul>
                            <li>
                                <a href="commonaddress?openid={!! $openid !!}" target="_blank" class="item-link item-content external">
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
</body>
</html>