<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>我的订单</title>

    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}"/>

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
        <div class="pages navbar-through" style="margin-top: -50px;">
            <!-- Pag has additional "with-subnavbar" class -->
            <div data-page="home" class="page with-subnavbar">
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
                                                        <div class="item-title">发货人 ===> 收货人</div>
                                                        <div class="item-after">@{{item.order_status}}
                                                            /@{{item.pay_status}}</div>
                                                    </div>
                                                    <div class="item-subtitle">单号：@{{item.order_code}}</div>
                                                    <div class="item-text" style="color:red;">价格：@{{item.price}}</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <a href="#" class="to-top"
                                                   style="background-color: #00c795" onclick="totop_item()">置顶</a>
                                                <a href="#" style="background-color: red;" class="item-delete"
                                                   onclick="delete_item()">删除</a>
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
                                                        <div class="item-title">发货人 ===> 收货人</div>
                                                        <div class="item-after">@{{item.order_status}}
                                                            /@{{item.pay_status}}</div>
                                                    </div>
                                                    <div class="item-subtitle">单号：@{{item.order_code}}</div>
                                                    <div class="item-text" style="color:red;">价格：@{{item.price}}</div>
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
        dynamicNavbar: true
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
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>

</body>
</html>

