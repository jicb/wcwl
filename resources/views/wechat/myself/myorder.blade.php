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
                                                        <div class="item-title">@{{ item.employee_get }}
                                                            ===> @{{ item.employee_send }}</div>
                                                        <div class="item-after">@{{item.order_status}}
                                                            /@{{item.pay_status}}</div>
                                                    </div>
                                                    <div class="item-subtitle">单号：@{{item.order_code}}</div>
                                                    <div class="item-text" style="color:red;">价格：@{{item.price}}</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                        <a href="#" class="to-top"
                                                       style="background-color: #00c795" onclick="pay()" v-if="(item.pay_flag == true)">支付</a>
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
                                                        <div class="item-title">@{{ item.from_name }}
                                                            ===> @{{ item.to_name }}</div>
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
        dynamicNavbar: true,
        domCache: true //enable inline pages
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
</script>


<script>

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

