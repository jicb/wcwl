<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>我要发货</title>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=37342703" charset="UTF-8"></script>
    <link rel="stylesheet" href="{!! URL::asset('frozen/css/frozen.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('frozen/demo/demo.css') !!}">
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="{!! URL::asset('frozen/lib/zepto.min.js') !!}"></script>
    <script src="{!! URL::asset('frozen/js/frozen.js') !!}"></script>
    <style>
        body {
            background-color: #ffffff;
        }

        textarea::-ms-input-placeholder {
            text-align: center;
        }

        textarea::-webkit-input-placeholder {
            text-align: center;
        }

    </style>
</head>
<body>
<div class="ui-form">
    <form action="">
        <div>
            <ul class="ui-list ui-list-link ui-border-tb">
                <li class="ui-border-t" data-href="www.baidu.com">
                    <div class="ui-list-thumb">
                        <span style="background-image:url({!! URL::asset('frozen/img/icon/icon_plus_alt2.png') !!})"></span>
                    </div>
                    <div class="ui-list-info">
                        <h4 class="ui-nowrap">发货人信息</h4>
                        <p class="ui-nowrap">发货地址</p>
                    </div>
                </li>
            </ul>
            <ul class="ui-list ui-list-link ui-border-tb">
                <li class="ui-border-t">
                    <div class="ui-list-thumb">
                        <span style="background-image:url({!! URL::asset('frozen/img/icon/icon_plus_alt2.png') !!})"></span>
                    </div>
                    <div class="ui-list-info">
                        <h4 class="ui-nowrap">计长兵 15527219896</h4>
                        <p class="ui-nowrap">湖北省武汉市江夏区光谷大道博彦科技1306号</p>
                    </div>
                </li>
            </ul>


            <ul class="ui-list ui-list-one ui-list-link ui-border-tb">
                <li class="ui-border-t">
                    <div class="ui-list-thumb">
                        <span style="background-image:url({!! URL::asset('frozen/img/icon/supermarket7.png') !!})"></span>
                    </div>
                    <div class="ui-list-info">
                        <h4 class="ui-nowrap ui-txt-muted">货物信息</h4>
                    </div>
                </li>
            </ul>
            <div class="ui-row" >
                <div class="ui-col ui-col-50">
                    <ul class="ui-list ui-list-text ui-list-link ui-border-tb">

                        <li class="ui-border-t ui-col">
                            <h4>付款方式 <br/><br/>到付</h4>
                        </li>

                    </ul>
                </div>
                <div class="ui-col ui-col-50">
                    <ul class="ui-list ui-list-text  ui-border-tb">

                        <li class="ui-border-t ui-col">
                            <h4>报价费用 <br/><br/>10 元</h4>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="ui-row">
                <div class="ui-col ui-col-50">
                    <ul class="ui-list ui-list-text ui-list-link ui-border-tb">

                        <li class="ui-border-t ui-col">
                            <h4>提货方式 <br/><br/>自提</h4>
                        </li>

                    </ul>
                </div>
                <div class="ui-col ui-col-50">
                    <ul class="ui-list ui-list-text ui-list-link ui-border-tb">

                        <li class="ui-border-t ui-col">
                            <h4>回单要求 <br/><br/>1 份</h4>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="ui-form-item ui-form-item-pure ui-border-b">
                <textarea placeholder="备注"></textarea>
            </div>

        </div>
        <div style="position:fixed;left:0;bottom:0;z-index:999;width:100%;">
            <div class="ui-row">
                <div class="ui-col ui-col-75" style="height: 60px;background-color: blue">订单总额：￥100元 仅供参考<br/>我同意万程运单条款</div>
                <div class="ui-col ui-col-25" style="height: 60px;line-height:60px;background-color: yellow">提交订单</div>
            </div>
        </div>
    </form>
</div>

<script>
    $('.ui-list li,.ui-tiled li').click(function () {
        if ($(this).data('href')) {
            location.href = $(this).data('href');
        }
    });
</script>
</body>
</html>