<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    {{--<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="apple-mobile-web-app-capable" content="no">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">--}}
    <title>发货方信息</title>
    <link rel="stylesheet" href="{!! URL::asset('sui/dist/css/sm.min.css') !!}"/>
</head>
<body>

<div class="content">
    <div class="list-block">
        <ul>
            <!-- Text inputs -->
            <li>
                <a class="item-link item-content goupi">
                    <div class="item-inner">
                        <div class="item-title">常用发货方信息</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="list-block">
        <ul>
            <!-- Text inputs -->
            <li>
                <div class="item-content">
                    <div class="item-media"><i class="icon icon-form-name"></i></div>
                    <div class="item-inner">
                        <div class="item-title label">姓名</div>
                        <div class="item-input">
                            <input type="text" placeholder="请输入名称">
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item-content">
                    <div class="item-media"><i class="icon icon-form-email"></i></div>
                    <div class="item-inner">
                        <div class="item-title label">手机号</div>
                        <div class="item-input">
                            <input type="text" placeholder="请输入手机号">
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item-content">
                    <div class="item-media"><i class="icon icon-form-password"></i></div>
                    <div class="item-inner">
                        <div class="item-title label">地址</div>
                        <div class="item-input">
                            <input type="text" class='city-picker'/>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="item-content">
                    <div class="item-media"><i class="icon icon-form-email"></i></div>
                    <div class="item-inner">
                        <div class="item-title label">详细地址</div>
                        <div class="item-input">
                            <input type="text" placeholder="详细到门牌号">
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="content-block">
        <div class="row">
            <div class="col-50"><a href="#" class="button button-big button-fill button-danger">取消</a></div>
            <div class="col-50"><a href="#" class="button button-big button-fill button-success">提交</a></div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{!! URL::asset('sui/dist/js/zepto.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm-city-picker.js') !!}"></script>
<script type="text/javascript" src="/js/app.js"></script>
<script>
    Zepto(function(){
       'use strict';
        var _$ = Zepto;

        $(document).on('click','.goupi', function () {
            var buttons1 = [
                {
                    text: '请选择',
                    label: true
                },
                {
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },
                {
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },
                {
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },
                {
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },
                {
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },
                {
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },
                {
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },
                {
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },
                {
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
                    }
                },{
                    text: '计长兵 15527219896湖北省武汉市江夏区光谷大道金融港博彦科技',
                    bold: true,
                    color: 'danger',
                    onClick: function() {
                        $.alert("你选择了“卖出“");
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
            _$.actions(groups);
        });

        _$(".city-picker").cityPicker({
            value: ['湖北', '武汉', '武昌区']
        });


        Zepto.init();
    });


 /*   Zepto(function () {

        'use strict';

        var _$ = Zepto;
        _$(".useraddress").picker({
            toolbarTemplate: '<header class="bar bar-nav">\
        <button class="button button-link pull-left">\
      按钮\
      </button>\
      <button class="button button-link pull-right close-picker">\
      确定\
      </button>\
      <h1 class="title">标题</h1>\
      </header>',
            cols: [
                {
                    textAlign: 'center',
                    values: ['计长兵 15527219896 湖北 武汉 江夏区 光谷大道金融港博彦科技5楼风行网', 'iPhone 4S', 'iPhone 5', 'iPhone 5S', 'iPhone 6', 'iPhone 6 Plus', 'iPad 2', 'iPad Retina', 'iPad Air', 'iPad mini', 'iPad mini 2', 'iPad mini 3'],
                    cssClass: 'picker-items-col-normal'
                }
            ]
        });


        Zepto.init();
    });*/
</script>
</body>
</html>