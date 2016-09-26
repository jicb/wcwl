<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>我要发货</title>
    <link rel="stylesheet" href="{!! URL::asset('sui/dist/css/sm.min.css') !!}"/>
    <style>
        textarea::-ms-input-placeholder {
            text-align: center;
        }

        textarea::-webkit-input-placeholder {
            text-align: center;
        }
    </style>

    <script src="{!! URL::asset('js/vue.js') !!}"></script>
    <script>
        var vueSenduser = new Vue({
            el:"#content",
            data:{
                senduser:"发货人信息",
                sendaddress:"发货地址",
                sendaddressdetail:"详细地址",

                receiveuser:"收货人信息",
                receiveaddress:"发货地址",
                receiveaddressdetail:"详细地址",

                huowu:"货物信息",

            }
        });
    </script>
</head>
<body>

<div class="content" id="content">
    <div class="list-block media-list">
        <ul>
            <li>
                <a class="item-link item-content"style="height:110px;" href="useraddress?openid={!! $openid !!}&method=send">
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">@{{ senduser }}</div>
                            <div class="item-after">发货方</div>
                        </div>
                        <div class="item-subtitle">@{{ sendaddress }}</div>
                        <div class="item-text">@{{ sendaddressdetail }}</div>
                    </div>
                </a>
            </li>
            <li>
                <a class="item-link item-content" style="height:110px;">
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">@{{ receiveuser }}</div>
                            <div class="item-after">收货方</div>
                        </div>
                        <div class="item-subtitle">@{{ receiveaddress }}</div>
                        <div class="item-text">@{{ receiveaddressdetail }}</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="list-block media-list" style="margin-top: -1em">
        <ul>
            <li class="item-link item-content huowuxinxi">
                <div class="item-media">
                    <i class="icon" style="width:1.45em;height:1.45em;background-image:url({!! URL::asset('sui/img/logistics/supermarket7.png') !!})"></i>
                </div>
                <div class="item-inner">
                    <div class="item-title">@{{ huowu }}</div>
                </div>
            </li>
        </ul>
    </div>

    <div class="list-block" style="margin-top:-1em">
        <ul>
            <li>
                <a href="#" class="item-link item-content fukuanfangshi">
                    <div class="item-inner">
                        <div class="item-title">付款方式<span style="padding-left:2em;">付款方式</span></div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="item-link item-content">
                    <div class="item-inner">
                        <div class="item-title">报价费用<span style="padding-left:2em;">10元</span></div>
                    </div>
                </a>
            </li>

            <li>
                <a href="#" class="item-link item-content">
                    <div class="item-inner">
                        <div class="item-title">提货方式<span style="padding-left:2em;">自提</span></div>
                    </div>
                </a>
            </li>

            <li>
                <a href="#" class="item-link item-content">
                    <div class="item-inner">
                        <div class="item-title">回单要求<span style="padding-left:2em;">1份</span></div>
                    </div>
                </a>
            </li>
        </ul>

    </div>
    <div class="list-block" style="margin-top: -1em">
        <ul>
            <li class="align-top">
                <div class="item-content">
                    <div class="item-media"><i class="icon icon-form-comment"></i></div>
                    <div class="item-inner">
                        <div class="item-input">
                            <textarea placeholder="备注"></textarea>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

</div>
<div class="row no-gutter" style="position: fixed;left:0;bottom:0;z-index: 100;width:100%;">
    <div class="col-75" style="height:4em;background-color: darkseagreen;text-align: center;padding-top:0.5em;">订单总额：￥100元 仅供参考<br/>我同意万程运单条款</div>
    <div class="col-25" style="height:4em;background-color: yellow;line-height: 4em;text-align: center">提交订单</div>
</div>

{{--<script type="text/javascript" src="/js/app.js"></script>--}}
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/zepto.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm.js') !!}"></script>
{{--<script src="{!! URL::asset('js/vue.js') !!}"></script>--}}

<script>
    Zepto(function() {
        'use strict';
        $(document).on('click', '.huowuxinxi', function () {
            $.prompt("请输入货物信息", function (value) {
                vueSenduser.huowu = value;
            })
        });
        $(document).on('click','.fukuanfangshi',function(){
            var buttons1 = [
                {
                    text: '请选择付款方式',
                    label: true
                },
               /* {
                    text: '卖出',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },*/
                {
                    text: '到付现金',
                    onClick: function() {
                        $.alert("到付现金");
                    }
                },
                {
                    text: '到付微信支付',
                    onClick: function() {
                        $.alert("到付微信支付");
                    }
                },
            ];
            var buttons2 = [
                {
                    text: '取消',
                    bg: 'danger'
                }
            ];
            var groups = [buttons1, buttons2];
            $.actions(groups);
        })
    });
</script>
{{--<script>
    var vueSenduser = new Vue({
        el:"#content",
        data:{
            senduser:"发货人信息",
            sendaddress:"发货地址",
            sendaddressdetail:"详细地址",

            receiveuser:"收货人信息",
            receiveaddress:"发货地址",
            receiveaddressdetail:"详细地址",

            huowu:"货物信息",

        }
    });
</script>--}}



</body>
</html>