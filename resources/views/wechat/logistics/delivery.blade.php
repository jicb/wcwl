<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>我要发货</title>
    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}"/>
    <style>

    </style>

</head>
<body style="display:none;">

<div class="views">
    <div class="view view-main">
        <div class="pages">
            <!-- Pag has additional "with-subnavbar" class -->
            <div class="page">
                <div class="page-content" id="content">
                    <div class="list-block media-list">
                        <ul>
                            <li>
                                <a class="item-link item-content open-popup" data-popup="#popup-send"
                                   style="height:110px;" href="#">
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title" id="send-users"><span
                                                        id="send-user">@{{ send.name }}</span> <span
                                                        id="send-phone">@{{ send.phone }}</span></div>
                                            <div class="item-after">发货方</div>
                                        </div>
                                        <div class="item-subtitle" id="send-pca">@{{ send.pca }}</div>
                                        <div class="item-text" id="send-street">@{{ send.street }}</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="item-link item-content open-popup" style="height:110px;"
                                   href="#" data-popup="#popup-receive">
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title" id="receive-users"><span
                                                        id="receive-user">@{{ receive.name }}</span> <span
                                                        id="receive-phone">@{{ receive.phone }}</span></div>
                                            <div class="item-after">收货方</div>
                                        </div>
                                        <div class="item-subtitle" id="receive-pca">@{{ receive.pca }}</div>
                                        <div class="item-text" id="receive-street">@{{ receive.street }}</div>
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
            </div>
        </div>
    </div>
</div>

{{--<div class="row no-gutter" style="position: fixed;left:0;bottom:0;z-index: 100;width:100%;">
    <div class="col-75" style="height:4em;background-color: darkseagreen;text-align: center;padding-top:0.5em;">
        订单总额：￥100元 仅供参考<br/>我同意万程运单条款
    </div>
    <div class="col-25" style="height:4em;background-color: yellow;line-height: 4em;text-align: center">提交订单</div>
</div>--}}

<div class="popup" id="popup-send">
    <div class="views">
        <div class="view">
            <div class="pages">
                <!-- Pag has additional "with-subnavbar" class -->
                <div class="page">
                    <div class="page-content">
                        <div class="list-block">
                            <ul>
                                <!-- Text inputs -->
                                <li>
                                    <a class="item-link item-content open-popup" data-popup="#popup-send-select"
                                       href="#">
                                        <div class="item-inner" id="typevue">
                                            <div class="item-title">@{{ type }}</div>
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
                                        <div class="item-inner">
                                            <div class="item-title label">姓名</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="请输入名称" value="@{{ name }}"
                                                       id="send-insert-name"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">手机号</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="请输入手机号" value="@{{ phone }}"
                                                       id="send-insert-phone"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">地址</div>
                                            <div class="item-input">
                                                <input type="text" class='city-picker' value="@{{ pca }}"
                                                       id="send-insert-pca" />
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">详细地址</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="详细到门牌号" value="@{{ street }}"
                                                       id="send-insert-street"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="content-block">
                            <div class="row">
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-danger close-popup"
                                                       data-popup="#popup-send">取消</a>
                                </div>
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-success close-popup"
                                                       data-popup="#popup-send" onclick="insertSend()">提交</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup-send-select">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="left"><a href="#" class="close-popup" data-popup="#popup-send-select">取消</a></div>
                    <div class="center">@{{ type }}</div>
                    <div class="right"><a href="#" class="close-popup" data-popup="#popup-send-select"
                                          onclick="insertSendData()">确定</a>
                    </div>
                </div>
            </div>
            <div class="pages navbar-through">
                <div class="page">
                    <div class="page-content">
                        <div class="list-block media-list">
                            <ul>
                                <li v-for='it in items'>
                                    <label class="label-radio item-content">
                                        <input type="radio" name="send" value="@{{ $index }}"/>
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">@{{ it.name }} @{{ it.phone }}</div>
                                                <div class="item-after">@{{ type }}</div>
                                            </div>
                                            <div class="item-subtitle">@{{ it.pca }}</div>
                                            <div class="item-text">@{{ it.street }}</div>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="popup" id="popup-receive">
    <div class="views">
        <div class="view">
            <div class="pages">
                <!-- Pag has additional "with-subnavbar" class -->
                <div class="page">
                    <div class="page-content">
                        <div class="list-block">
                            <ul>
                                <!-- Text inputs -->
                                <li>
                                    <a class="item-link item-content open-popup" data-popup="#popup-receive-select"
                                       href="#">
                                        <div class="item-inner">
                                            <div class="item-title">@{{ type }}</div>
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
                                        <div class="item-inner">
                                            <div class="item-title label">姓名</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="请输入名称" value="@{{ name }}"
                                                       id="receive-insert-name"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">手机号</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="请输入手机号" value="@{{ phone }}"
                                                       id="receive-insert-phone"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">地址</div>
                                            <div class="item-input">
                                                <input type="text" class='city-picker' value="@{{ pca }}"
                                                       id="receive-insert-pca"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">详细地址</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="详细到门牌号" value="@{{ street }}"
                                                       id="receive-insert-street"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="content-block">
                            <div class="row">
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-danger close-popup"
                                                       data-popup="#popup-receive">取消</a>
                                </div>
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-success close-popup"
                                                       data-popup="#popup-receive" onclick="insertReceive()">提交</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup-receive-select">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="left"><a href="#" class="close-popup" data-popup="#popup-receive-select">取消</a></div>
                    <div class="center">@{{ type }}</div>
                    <div class="right"><a href="#" class="close-popup" data-popup="#popup-receive-select"
                                          onclick="insertReceiveData()">确定</a>
                    </div>
                </div>
            </div>
            <div class="pages navbar-through">
                <div class="page">
                    <div class="page-content">
                        <div class="list-block media-list">
                            <ul>
                                <li v-for='it in items'>
                                    <label class="label-radio item-content">
                                        <input type="radio" name="receive" value="@{{ $index }}"/>
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">@{{ it.name }} @{{ it.phone }}</div>
                                                <div class="item-after">@{{ type }}</div>
                                            </div>
                                            <div class="item-subtitle">@{{ it.pca }}</div>
                                            <div class="item-text">@{{ it.street }}</div>
                                        </div>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{!! URL::asset('js/vue.min.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{!! URL::asset('js/jquery.min.js') !!}"></script>


<script>
    var data = eval('(' + '<?php echo $data; ?>' + ')');

    var contentVue = new Vue({
        el: "#content",
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
    });

    var sendVue = new Vue({
        el: "#popup-send",
        data: {
            type: "常用发货方信息",
            name: $('#send-user').text(),
            phone: $('#send-phone').text(),
            pca: $('#send-pca').text(),
            street: $('#send-street').text()
        }
    });
    var sendSelectVue = new Vue({
        el: "#popup-send-select",
        data: {
            items: data.send,
            type: "发货方"
        }
    });


    var receiveVue = new Vue({
        el: "#popup-receive",
        data: {
            type: "常用收货方信息",
            name: $('#receive-user').text(),
            phone: $('#receive-phone').text(),
            pca: $('#receive-pca').text(),
            street: $('#receive-street').text()
        }
    });
    var receiveSelectVue = new Vue({
        el: "#popup-receive-select",
        data: {
            items: data.receive,
            type: "收货方"
        }
    });

</script>
<script>
    var myApp = new Framework7();

    // Export selectors engine
    var $$ = Dom7;

    // Add view
    var mainView = myApp.addView('.view-main', {
        // Because we use fixed-through navbar we can enable dynamic navbar
        dynamicNavbar: true
    });

    var ssq = {
        '安徽': {
            '合肥': ['蜀山', '包河', '庐阳'],
            '芜湖': ['无为', '怀远'],
            '马鞍山': ['5'],
            '铜陵': [],
            '池州': []
        },
        German: {'Audi': [], 'BMW': [], 'Mercedes': [], 'Volkswagen': [], 'Volvo': []},
        American: {'Cadillac': [], 'Chrysler': [], 'Dodge': [], 'Ford': []}
    };

    var ss = {
        '安徽': ['合肥', '芜湖', '马鞍山', '铜陵', '池州'],
        German: ['Audi', 'BMW', 'Mercedes', 'Volkswagen', 'Volvo'],
        American: ['Cadillac', 'Chrysler', 'Dodge', 'Ford']
    };

    var pickerDependent = myApp.picker({
        input: '.city-picker',
        rotateEffect: true,
        formatValue: function (picker, values) {
            return values[0] + " " + values[1] + " " + values[2];
        },
        cols: [
            {
                textAlign: 'left',
                values: ['安徽', 'German', 'American'],
                onChange: function (picker, sheng) {
                    if (picker.cols[1].replaceValues) {
                        picker.cols[1].replaceValues(ss[sheng]);
                    }
                }
            },
            {
                textAlign: 'left',
                values: ss['安徽'],
                onChange: function (picker, shi) {
                    if (picker.cols[2].replaceValues) {
                        picker.cols[2].replaceValues(ssq[picker.cols[0].value][shi]);
                    }
                }
            },
            {
                values: ssq['安徽']['合肥']
            }
        ]
    });
</script>
<script>

    function insertSend() {
        $('#send-user').text($('#send-insert-name').val());
        $('#send-phone').text($('#send-insert-phone').val());
        $('#send-pca').text($('#send-insert-pca').val());
        $('#send-street').text($('#send-insert-street').val());
    }

    function insertReceive() {
        $('#receive-user').text($('#receive-insert-name').val());
        $('#receive-phone').text($('#receive-insert-phone').val());
        $('#receive-pca').text($('#receive-insert-pca').val());
        $('#receive-street').text($('#receive-insert-street').val());
    }


    function insertSendData() {
        var selected = $("input[type='radio']:checked");
        if (selected && selected.length) {
            var index = selected.val();
            $('#send-insert-name').val(sendSelectVue.items[index].name);
            $('#send-insert-phone').val(sendSelectVue.items[index].phone);
            $('#send-insert-pca').val(sendSelectVue.items[index].pca);
            $('#send-insert-street').val(sendSelectVue.items[index].street);
        }
    }

    function insertReceiveData() {
        var selected = $("input[type='radio']:checked");
        if (selected && selected.length) {
            var index = selected.val();
            $('#receive-insert-name').val(receiveSelectVue.items[index].name);
            $('#receive-insert-phone').val(receiveSelectVue.items[index].phone);
            $('#receive-insert-pca').val(receiveSelectVue.items[index].pca);
            $('#receive-insert-street').val(receiveSelectVue.items[index].street);
        }
    }
    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>
</body>
</html>