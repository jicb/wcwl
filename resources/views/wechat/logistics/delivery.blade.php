<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="apple-mobile-web-app-capable" content="no">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>我要发货</title>
    <link rel="stylesheet" href="{!! URL::asset('sui/dist/css/sm.min.css') !!}"/>
    {{--<link rel="stylesheet" href="dist/css/sm-extend.min.css"/>--}}
</head>
<body>

<div class="content">
    <div class="content-block-title">发/收货方信息</div>
    <div class="list-block media-list">
        <ul>
            <li>
                <a class="item-link item-content">
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">发货人信息</div>
                        </div>
                        <div class="item-subtitle">发货地址</div>
                        <div class="item-text">详细地址</div>
                    </div>
                </a>
            </li>
            <li>
                <a class="item-link item-content">
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">计长兵 15527219896</div>
                        </div>
                        <div class="item-subtitle">湖北 武汉 江夏区</div>
                        <div class="item-text">光谷大道金融港博彦科技五楼风行网</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="list-block media-list">
        <ul>
            <li class="item-link item-content">
                <div class="item-media">
                    <i class="icon" style="width:1.45em;height:1.45em;background-image:url({!! URL::asset('sui/img/logistics/supermarket7.png') !!})"></i>
                </div>
                <div class="item-inner">
                    <div class="item-title">货物信息</div>
                </div>
            </li>
        </ul>
    </div>

    <div class="list-block">
        <ul>
            <li>
                <a href="#" class="item-link item-content">
                    <div class="item-inner">
                        <div class="item-title">付款方式<span style="padding-left:2em;">到付</span></div>
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
</div>
<div class="row no-gutter" style="position: fixed;left:0;bottom:0;z-index: 100;width:100%;">
    <div class="col-75" style="height:4em;background-color: darkseagreen">50%</div>
    <div class="col-25" style="height:4em;background-color: yellow;line-height: 4em;text-align: center">提交订单</div>
</div>


<script type="text/javascript" src="{!! URL::asset('sui/dist/js/zepto.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm.js' !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm-city-picker.js') !!}"></script>
{{--<script type="text/javascript">

    /**
     * 因为Zepto和jQuery框架的$冲突，又不想清掉jQuery的重置，所以改用Zepto调用
     * 其中sm.js有修改
     * 其中的dataPicker在官方文件中不存在，是自己加的
     */

    Zepto(function () {

        'use strict';

        var _$ = Zepto;
        _$(".J-choose-address").cityPicker({
            value: ['湖北', '武汉', '武昌区']
        });

        _$(".J-choose-sex").picker({
            toolbarTemplate: '<header class="bar bar-nav">\
              <button class="button button-link pull-right close-picker">确定</button>\
              <h1 class="title">请选择性别</h1>\
              </header>',
            cols: [
                {
                    textAlign: 'center',
                    values: ['男', '女']
                }
            ]
        });

        _$(".J-choose-birth").datePicker({
            value: ["2000", "01", "01"]
        });
        Zepto.init();
    });

</script>
--}}
</body>
</html>