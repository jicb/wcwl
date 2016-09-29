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

</head>
<body style="display:none;">

<div class="content" id="content">
    <div class="list-block media-list">
        <ul>
            <li>
                <a class="item-link item-content" style="height:110px;" href="useraddress?member_id={!! $member_id !!}&type=1">
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">@{{ data.send.name }} @{{ data.send.phone }}</div>
                            <div class="item-after">发货方</div>
                        </div>
                        <div class="item-subtitle">@{{ data.send.pca }}</div>
                        <div class="item-text">@{{ data.send.street }}</div>
                    </div>
                </a>
            </li>
            <li>
                <a class="item-link item-content" style="height:110px;" href="useraddress?member_id={!! $member_id !!}&type=2">
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">@{{ data.receive.name }} @{{ data.receive.phone }}</div>
                            <div class="item-after">收货方</div>
                        </div>
                        <div class="item-subtitle">@{{ data.receive.pca }}</div>
                        <div class="item-text">@{{ data.receive.street }}</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="list-block media-list" style="margin-top: -1em">
        <ul>
            <li class="item-link item-content huowuxinxi">
                <div class="item-media">
                    <i class="icon"
                       style="width:1.45em;height:1.45em;background-image:url({!! URL::asset('sui/img/logistics/supermarket7.png') !!})"></i>
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
    <div class="col-75" style="height:4em;background-color: darkseagreen;text-align: center;padding-top:0.5em;">
        订单总额：￥100元 仅供参考<br/>我同意万程运单条款
    </div>
    <div class="col-25" style="height:4em;background-color: yellow;line-height: 4em;text-align: center">提交订单</div>
</div>


<script src="{!! URL::asset('js/vue.js') !!}"></script>


<script>
    var contentVue = new Vue({
        el: "#content",
        data: {
            data: {
                send: {
                    name: "发货人信息",
                    phone: "",
                    pca: "发货地址",
                    street: "详细地址"
                },
                receive: {
                    name: "收货人信息",
                    phone: "",
                    pca: "收货地址",
                    street: "详细地址"
                }
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });

</script>

<script type="text/javascript" src="{!! URL::asset('sui/dist/js/zepto.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm.js') !!}"></script>
<script>

</script>

</body>
</html>