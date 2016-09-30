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
                                   href="#">
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
                                <a class="item-link item-content open-popup"
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
                            <li>
                                <a class="item-link item-content open-popup" style="height:110px;"
                                   href="#" data-popup="#popup-cargo">
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">名称：<span id="cargo-name"></span></div>
                                            <div class="item-after">货物</div>
                                        </div>
                                        <div class="item-subtitle">件数：<span id="cargo-count"></span></div>
                                        <div class="item-text">重量：<span id="cargo-weight"></span><br/>体积：<span
                                                    id="cargo-volume"></span></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="list-block" style="margin-top:-1em">
                        <ul>
                            <li>
                                <a href="#" class="item-link item-content" id="pay-method">
                                    <div class="item-inner">
                                        <div class="item-title">付款方式<span style="padding-left:2em;"
                                                                          id="pay">@{{paymethod}}</span></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="item-link item-content">
                                    <div class="item-inner">
                                        <div class="item-title">保价费用<span style="padding-left:2em;"
                                                                        id="cargo-insure">10</span>元
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="item-link item-content" id="take-way">
                                    <div class="item-inner">
                                        <div class="item-title">提货方式<span style="padding-left:2em;"
                                                                          id="take">@{{ takeway }}</span></div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="item-link item-content" id="receipt-style">
                                    <div class="item-inner">
                                        <div class="item-title">回单要求<span style="padding-left:2em;"
                                                                          id="receipt">@{{ receiptstyle }}</span></div>
                                    </div>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <div class="list-block" style="margin-top: -1em">
                        <ul>
                            <li class="align-top">
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-input">
                                            <textarea placeholder="备注" id="comment"></textarea>
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
                                                   data-popup="#popup-send" onclick="insertOrderWaybill()">提交</a>
                            </div>
                        </div>
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
                                                <input type="text" class='city-picker-send' value="@{{ pca }}"
                                                       id="send-insert-pca"/>
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
                                        <input type="radio" name="popup-send-index" value="@{{ $index }}"/>
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
                                                <input type="text" class='city-picker-receive' value="@{{ pca }}"
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
                                        <input type="radio" name="popup-receive-index" value="@{{ $index }}"/>
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

<div class="popup" id="popup-cargo">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="center">货物信息</div>
                </div>
            </div>
            <div class="pages navbar-through">
                <div class="page">
                    <div class="page-content">
                        <div class="list-block">
                            <ul>
                                <!-- Text inputs -->
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">名称</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="请输入货物名称" value="@{{ name }}"
                                                       id="cargo-insert-name"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">件数</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="请输入件数" value="@{{ count }}"
                                                       id="cargo-insert-count"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">重量</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="请输入重量" value="@{{ weight }}"
                                                       id="cargo-insert-weight"/>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-inner">
                                            <div class="item-title label">体积</div>
                                            <div class="item-input">
                                                <input type="text" placeholder="请输入体积" value="@{{ volume }}"
                                                       id="cargo-insert-volume"/>
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
                                                       data-popup="#popup-cargo">取消</a>
                                </div>
                                <div class="col-50"><a href="#"
                                                       class="button button-big button-fill button-success close-popup"
                                                       data-popup="#popup-cargo" onclick="insertCargo()">提交</a>
                                </div>
                            </div>
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
                pca: "",
                street: "详细地址"
            },
            receive: {
                name: "收货人信息",
                phone: "",
                pca: "",
                street: "详细地址"
            },
            paymethod: "发货方付款",
            takeway: "网点自提",
            receiptstyle: "1 份"
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

    var cargoVue = new Vue({
        el: "#popup-cargo",
        data: {
            name: $('#cargo-name').text(),
            count: $('#cargo-count').text(),
            weight: $('#cargo-weight').text(),
            volume: $('#cargo-volume').text()
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

    var pickeReceive = myApp.picker({
        input: '.city-picker-receive',
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
                textAlign: 'left',
                values: ssq['安徽']['合肥']
            }
        ]
    });
    var pickeSend = myApp.picker({
        input: '.city-picker-send',
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
                textAlign: 'left',
                values: ssq['安徽']['合肥']
            }
        ]
    });

    $('#pay-method').on('click', function () {
        var buttons1 = [
            {
                text: '选择付款方式',
                label: true
            },
            {
                text: '发货方付款',
                onClick: function () {
                    $('#pay').text('发货方付款');
                }
            },
            {
                text: '收货方付款',
                onClick: function () {
                    $('#pay').text('收货方付款');
                }
            },
            {
                text: '发货方月结',
                onClick: function () {
                    $('#pay').text('发货方月结');
                }
            }
        ];
        var buttons2 = [
            {
                text: '取消',
                color: 'red'
            }
        ];
        var groups = [buttons1, buttons2];
        myApp.actions(groups);
    });

    $('#take-way').on('click', function () {
        var buttons1 = [
            {
                text: '选择提货方式',
                label: true
            },
            {
                text: '网点自提',
                onClick: function () {
                    $('#take').text('网点自提');
                }
            },
            {
                text: '送货上门',
                onClick: function () {
                    $('#take').text('送货上门');
                }
            }
        ];
        var buttons2 = [
            {
                text: '取消',
                color: 'red'
            }
        ];
        var groups = [buttons1, buttons2];
        myApp.actions(groups);
    });


    $('#receipt-style').on('click', function () {
        var buttons1 = [
            {
                text: '选择回单要求',
                label: true
            },
            {
                text: '签回单',
                onClick: function () {
                    $('#receipt').text('签回单');
                }
            },
            {
                text: '签托运单',
                onClick: function () {
                    $('#receipt').text('签托运单');
                }
            },
            {
                text: '签信封',
                onClick: function () {
                    $('#receipt').text('签信封');
                }
            }
            ,
            {
                text: '签回单盖章',
                onClick: function () {
                    $('#receipt').text('签回单盖章');
                }
            }
            ,
            {
                text: '1份回单',
                onClick: function () {
                    $('#receipt').text('1份回单');
                }
            }, {
                text: '2份回单',
                onClick: function () {
                    $('#receipt').text('2份回单');
                }
            },
            {
                text: '3份回单',
                onClick: function () {
                    $('#receipt').text('3份回单');
                }
            }

        ];
        var buttons2 = [
            {
                text: '取消',
                color: 'red'
            }
        ];
        var groups = [buttons1, buttons2];
        myApp.actions(groups);
    });

</script>
<script>

    function getQuery() {
        var member_id = data.member_id;

        var from_name = $('#send-user').text();
        var from_phone = $('#send-phone').text();
        var from_pca = $('#send-pca').text();
        var from_street = $('#from-street').text();
        var to_name = $('#receive-user').text();
        var to_phone = $('#receive-phone').text();
        var to_pca = $('#receive-pca').text();
        var to_street = $('#receive-street').text();
        var cargo_name = $('#cargo-name').text();
        var cargo_count = $('#cargo-count').text();
        var cargo_weight = $('#cargo-weight').text();
        var cargo_volume = $('#cargo-volume').text();
        var cargo_insure = $('#cargo-insure').text();
        var exchange_type = $('#take').text();
        var receipt_type = $("#receipt").text();

        var price = cargo_insure;

        var comment = $('#comment').val();

        return {
            member_id: member_id,
            from_name: from_name,
            from_phone: from_phone,
            from_pca: from_pca,
            from_street: from_street,
            to_name: to_name,
            to_phone: to_phone,
            to_pca: to_pca,
            to_street: to_street,
            cargo_name: cargo_name,
            cargo_count: cargo_count,
            cargo_weight: cargo_weight,
            cargo_volume: cargo_volume,
            cargo_insure: cargo_insure,
            exchange_type: exchange_type,
            receipt_type:receipt_type,
            price: price,
            comment: comment
        };

    }

    function insertOrderWaybill() {
        myApp.confirm('您确定要提交订单吗？', '提交订单', function () {
            var query = getQuery();
            $.post('createorder',query,function(res){
                myApp.alert('订单已成功完成','订单提交',function(){
                    var readyFunc = function onBridgeReady() {
                        WeixinJSBridge.invoke('closeWindow',{
                        },function(res){
                        });
                    }

                    if (typeof WeixinJSBridge === "undefined") {
                        document.addEventListener('WeixinJSBridgeReady', readyFunc, false);
                    } else {
                        readyFunc();
                    }
                })
            });
        });


    }

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

    function insertCargo() {
        $('#cargo-name').text($("#cargo-insert-name").val());
        $('#cargo-count').text($("#cargo-insert-count").val());
        $('#cargo-weight').text($("#cargo-insert-weight").val());
        $('#cargo-volume').text($("#cargo-insert-volume").val());
    }


    function insertSendData() {
        var selected = $("input[name='popup-send-index']:checked");
        if (selected && selected.length) {
            var index = selected.val();
            $('#send-insert-name').val(sendSelectVue.items[index].name);
            $('#send-insert-phone').val(sendSelectVue.items[index].phone);
            $('#send-insert-pca').val(sendSelectVue.items[index].pca);
            $('#send-insert-street').val(sendSelectVue.items[index].street);
        }
    }

    function insertReceiveData() {
        var selected = $("input[name='popup-receive-index']:checked");
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