<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>员工通道</title>

    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}"/>

    <style>
        .col-card{
            height:80px;
            border-radius: 15px;
            line-height:80px;
            text-align: center;
            font-size: 1.2em;
            background-color: #007aff;
            color:white;
        }

        .row-my{
            margin-bottom: 1em;
        }

        .a-my{
            color:white;
            text-decoration: none;
            display:block;
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
                            <div class="col-50 col-card" ><a href="#pricing" class="a-my">新单核价</a></div>
                            <div class="col-50 col-card" >订单收现</div>
                        </div>
                        <div class="row row-my">
                            <div class="col-50 col-card" >网点添加</div>
                            <div class="col-50 col-card" >范围配置</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page cached" data-page="pricing">
                <div class="page-content">
                    <a href="#index" class="back" style="font-size: 1.5em;"> <i class="icon icon-back @{{iconsColorClass}}"></i>&nbsp;返回 </a>
                    <div class="content" id="content-pricing">
                        <div class="list-block media-list">
                            <ul>
                                <li class="swipeout" v-for="item in pricing">
                                    <div class="item-content swipeout-content">
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">@{{ item.employee_get }} ===> @{{ item.employee_send }}</div>
                                                <div class="item-after">@{{item.order_status}}/@{{item.pay_status}}</div>
                                            </div>
                                            <div class="item-subtitle">单号：@{{item.order_code}}</div>
                                            <div class="item-text" style="color:red;">价格：@{{item.price}}</div>
                                        </div>
                                    </div>
                                    <div class="swipeout-actions-right">
                                        <a href="#" class="item-success"
                                           style="background-color: #00c795" onclick="itemPricing(@{{ $index }})">核价</a>
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
                    <div class="center">待核价订单</div>
                </div>
            </div>
            <div class="pages navbar-through">
                <!-- Pag has additional "with-subnavbar" class -->
                <div class="page">
                    <div class="page-content">
                        <div class="card">
                            <div class="card-header">订单号:@{{ item.order_code }}</div>
                            <div class="card-content">
                                <div class="card-content-inner">Card with header and footer. Card header is used to displayCard with header and footer. Card header is used to displayCard with header and footer. Card header is used to displayCard with header and footer. Card header is used to displayCard with header and footer. Card header is used to displayCard with header and footer. Card header is used to display card title and footer for some additional information or for custom actions.</div>
                            </div>
                            <div class="card-footer">Card Footer</div>
                        </div>
                        <div class="content-block">
                            <div class="row">
                                <div class="col-100"><a href="#"
                                                        class="button button-big button-fill button-success "
                                                        onclick="goingPricing()">核价</a>
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

    var contentPricing = new Vue({
        el:"#content-pricing",
        data:{
            pricing:pricing,
        }
    });

    var popupPricing = new Vue({
        el:"#popup-pricing",
        data:{
            item:'',
        }
    })

</script>


<script>
    function itemPricing(index){
        popupPricing.item = pricing[index];
        myApp.popup('#popup-pricing');
    }
    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>

</body>
</html>

