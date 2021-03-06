<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>员工通道</title>

    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}"/>

    <style>
        .col-card {
            height: 80px;
            border-radius: 15px;
            line-height: 80px;
            text-align: center;
            font-size: 1.2em;
            background-color: #007aff;
            color: white;
        }

        .row-my {
            margin-bottom: 1em;
        }

        .a-my {
            color: white;
            text-decoration: none;
            display: block;
        }

        .card p {
            margin: 0.1em 0;
            font-size: 0.9em;
        }
    </style>
</head>
<body style="display:none;">
<div class="views">
    <div class="view view-main">
        <div class="pages">
            <!-- Pag has additional "with-subnavbar" class -->
            <div class="page" data-page="index">
                <div class="page-content">
                    <div class="content-block">
                        <div class="row row-my">
                            <div class="col-50 col-card"><a href="#pricing" class="a-my">我要揽件</a></div>
                            <div class="col-50 col-card"><a href="#money" class="a-my">我要报价</a></div>
                        </div>
                        <div class="row row-my">
                            <div class="col-50 col-card">网点添加</div>
                            <div class="col-50 col-card">范围配置</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page cached" data-page="pricing">
                <div class="page-content">
                    <a href="#index" class="back" style="font-size: 1.5em;"> <i
                                class="icon icon-back @{{iconsColorClass}}"></i>&nbsp;返回 </a>
                    <div class="content" id="content-pricing">
                        <div class="list-block media-list">
                            <ul>
                                <li class="swipeout @{{ item.order_code }}" v-for="item in items">
                                    <div class="item-content swipeout-content">
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">订单号：@{{ item.order_code }}</div>
                                            </div>
                                            <div class="item-subtitle">发货地：@{{item.from_pca}}</div>
                                            <div class="item-text" style="color:black;">
                                                收货地：@{{item.to_pca}}<br/>
                                                重量(Kg)：@{{ item.cargo_weight }} 体积(m&sup2;)：@{{ item.cargo_volume }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swipeout-actions-right">
                                        <a href="#" class="item-success"
                                           style="background-color: #00c795" onclick="itemPricing(@{{ $index }})">揽件</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page cached" data-page="money">
                <div class="page-content">
                    <a href="#index" class="back" style="font-size: 1.5em;"> <i
                                class="icon icon-back @{{iconsColorClass}}"></i>&nbsp;返回 </a>
                    <div class="content" id="content-money">
                        <div class="list-block media-list">
                            <ul>
                                <li class="swipeout @{{ item.order_code }}" v-for="item in items">
                                    <div class="item-content swipeout-content">
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">订单号：@{{ item.order_code }}</div>
                                            </div>
                                            <div class="item-subtitle">发货地：@{{item.from_pca}}</div>
                                            <div class="item-text" style="color:black;">
                                                收货地：@{{item.to_pca}}<br/>
                                                重量(Kg)：@{{ item.cargo_weight }} 体积(m&sup2;)：@{{ item.cargo_volume }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swipeout-actions-right">
                                        <a href="#" class="item-success"
                                           style="background-color: #00c795" onclick="itemMoney(@{{ $index }})">报价</a>
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

<div class="popup" id="popup-pricing">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="center">待揽件订单</div>
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
                                </div>
                            </div>
                            <div class="card-footer">
                                <p>
                                    备注：@{{ item.comment }}
                                </p>
                            </div>
                        </div>
                        <div class="content-block">
                            <div class="row" style="margin-bottom: 100px;">
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-danger  close-popup"
                                                       data-popup="#popup-pricing">取消</a>
                                </div>
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-success"
                                                       onclick="goingPricing()">揽件</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup-money">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="center">待报价订单</div>
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
                                <label for="price">运费(元)：</label><input type="number" value="@{{ item.price }}" id="money-price">
                            </div>
                        </div>
                        <div class="content-block">
                            <div class="row" style="margin-bottom: 100px;">
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-danger  close-popup"
                                                       data-popup="#popup-money">取消</a>
                                </div>
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-success"
                                                       onclick="goingMoney()">报价</a>
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
            //dynamicNavbar: true
            domCache: true //enable inline pages
        });
    </script>
    <script>
        var pricing = eval('(' + '<?php echo $pricing;?>' + ')');
        var money = eval('(' + '<?php echo $money;?>' + ')');
        var member_id = '{!! $member_id !!}';
        var contentPricing = new Vue({
            el: "#content-pricing",
            data: {
                items: pricing,
            }
        });

        var contentMoney = new Vue({
            el: "#content-money",
            data: {
                items: money,
            }
        });

        var popupPricing = new Vue({
            el: "#popup-pricing",
            data: {
                item: '',
            }
        });
        var popupMoney = new Vue({
            el: "#popup-money",
            data: {
                item: '',
            }
        });


    </script>


    <script>
        function goingMoney(){
            var order_code = popupMoney.item.order_code;
            var order_id = popupMoney.item.order_id;
            var money = $('#money-price').val();

            myApp.confirm('订单号：' + order_code+'<br />报价金额：'+money, '我要报价', function () {
                var query = {
                    member_id: member_id,
                    order_id: order_id,
                    price:money,
                };
                $.get('quote', query, function (res) {
                    myApp.alert('报价成功！');
                    myApp.closeModal('#popup-money');

                    var item = '.'+order_code;
                    $(item).remove();
                });
            });
        }
        function goingPricing() {
            var order_code = popupPricing.item.order_code;
            var order_id = popupPricing.item.order_id;

            myApp.confirm('订单号：' + order_code, '我要揽件', function () {
                var query = {
                    member_id: member_id,
                    order_id: order_id
                };
                $.get('getorder', query, function (res) {
                    myApp.alert('揽件成功！');
                    myApp.closeModal('#popup-pricing');

                    var item = '.'+order_code;
                    $(item).remove();
                });
            });

        }



        function itemPricing(index) {
            popupPricing.item = pricing[index];
            myApp.popup('#popup-pricing');
        }

        function itemMoney(index) {
            popupMoney.item = money[index];
            myApp.popup('#popup-money');
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.body.style.display = 'block';
        });
    </script>

</body>
</html>

