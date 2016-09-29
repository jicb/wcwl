<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>常用地址管理</title>

    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}" />

</head>
<body style="display:none;">
<div class="views">
    <div class="view view-main"  id="sendreceive">
        <div class="navbar">
            <div class="navbar-inner">
                <!-- Sub navbar -->
                <div class="subnavbar">
                    <div class="buttons-row">
                        <a href="#tab-send" class="button tab-link active" v-on:click="issend">发货方</a>
                        <a href="#tab-receive" class="button tab-link" v-on:click="isreceive">收货方</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pages navbar-through">
            <!-- Pag has additional "with-subnavbar" class -->
            <div data-page="home" class="page with-subnavbar">
                <div class="page-content">
                    <div class="tabs">
                        <div id="tab-send" class="tab active">
                            <div class="content">
                                <div class="list-block media-list">
                                    <a href="#" class="button button-big button-fill open-popup">添加</a>
                                    <ul>
                                        <li class="swipeout" v-for="item in send">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">@{{ item.name }} @{{ item.phone }}</div>
                                                        <div class="item-after">发货方</div>
                                                    </div>
                                                    <div class="item-subtitle">@{{ item.pca }}</div>
                                                    <div class="item-text">@{{ item.street }}</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <span style="display: none;">@{{ item.member_id }}</span>
                                                <a href="#" class="to-top"
                                                   style="background-color: #00c795" onclick="totop_item()">置顶<span
                                                            style="display: none;">@{{ item.addr_id }}</span></a>
                                                <span style="display: none;">@{{ item.addr_id }}</span>
                                                <span style="display: none;">@{{ item.member_id }}</span>
                                                <a href="#" style="background-color: red;" class="item-delete" onclick="delete_item()">删除</a>
                                                <span style="display: none;">@{{ item.addr_id }}</span>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="tab-receive" class="tab">
                            <div class="content">
                                <div class="list-block media-list">
                                    <a href="#" class="button button-big button-fill open-popup">添加</a>
                                    <ul>
                                        <li class="swipeout" v-for="item in receive">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">@{{ item.name }} @{{ item.phone }}</div>
                                                        <div class="item-after">收货方</div>
                                                    </div>
                                                    <div class="item-subtitle">@{{ item.pca }}</div>
                                                    <div class="item-text">@{{ item.street }}</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <span style="display: none;">@{{ item.member_id }}</span>
                                                <a href="#" class="to-top"
                                                   style="background-color: #00c795" onclick="totop_item()">置顶<span
                                                            style="display: none;">@{{ item.addr_id }}</span></a>
                                                <span style="display: none;">@{{ item.addr_id }}</span>
                                                <span style="display: none;">@{{ item.member_id }}</span>
                                                <a href="#" style="background-color: red;" class="item-delete" onclick="delete_item()">删除</a>
                                                <span style="display: none;">@{{ item.addr_id }}</span>
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
        {{--<div class="toolbar">
            <div class="toolbar-inner open-popup" style="justify-content: center;background-color: green;">
                添加
            </div>
        </div>--}}
    </div>
</div>

<div class="popup">
    <div class="content" id="createAddress">
        <div class="list-block">
            <ul>
                <!-- Text inputs -->
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title label">姓名</div>
                            <div class="item-input">
                                <input type="text" placeholder="请输入名称" v-model="name">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title label">手机号</div>
                            <div class="item-input">
                                <input type="text" placeholder="请输入手机号" v-model="phone">
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title label">地址</div>
                            <div class="item-input">
                                <input type="text" class='city-picker' v-model="pca" id="pca" readonly/>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title label">详细地址</div>
                            <div class="item-input">
                                <input type="text" placeholder="详细到门牌号" v-model="street" />
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="content-block">
            <div class="row">
                <div class="col-50"><a href="#" class="button button-big button-fill button-danger close-popup">取消</a>
                </div>
                <div class="col-50"><a href="#" class="button button-big button-fill button-success close-popup"
                                       v-on:click="create">提交</a></div>
            </div>
        </div>
    </div>
</div>



{{--<script src="{!! URL::asset('sui/dist/js/zepto.js) !!}"></script>--}}
{{--<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm-city-picker.js') !!}"></script>--}}

<script src="{!! URL::asset('js/vue.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{!! URL::asset('js/kitchen-sink.js') !!}"></script>
<script src="{!! URL::asset('js/jquery.min.js') !!}"></script>

<script>
    var data = eval('(' + '<?php echo $data;?>' + ')');
    var issend = true;
    var sendreceive = new Vue({
        el: "#sendreceive",
        data: {
            send: data.send,
            receive: data.receive,
        },
        methods: {
            issend: function () {
                issend = true;
            },
            isreceive: function () {
                issend = false;
            }
        },
    });

    var createAddress = new Vue({
        el: "#createAddress",
        data: {
            name: "",
            phone: "",
            pca: "",
            street: "",
        },
        methods: {
            create: function () {
                var query = {
                    name: this.name,
                    phone: this.phone,
                    pca: $('#pca').val(),
                    street: this.street,
                    type: issend ? 1 : 2,
                    member_id: data.member_id,
                };
                $.get('address/create', query, function (res) {
                    var res = eval('(' + res + ')');
                    if (res.type == 1) {
                        sendreceive.send = res.data;
                    } else {
                        sendreceive.receive = res.data;
                    }

                    this.name = "";
                    this.phone = "";
                    this.pca = "湖北 武汉 武昌区";
                    this.street = "";
                });
            }
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
    function delete_item(){
        var addr_id = event.target.nextElementSibling.textContent;
        var member_id = event.target.previousElementSibling.textContent;
        myApp.confirm('确定要删除此条常用地址？', '删除', function () {
            var query = {
                addr_id: addr_id,
                type: issend ? 1 : 2,
                member_id:member_id
            };
            $.get('address/delete', query, function (res) {
                var res = eval('(' + res + ')');
                if (issend) {
                    sendreceive.send = res.data;
                } else {
                    sendreceive.receive = res.data;
                }
            });
        });
    }

    function totop_item() {
        var addr_id = event.target.nextElementSibling.textContent;
        var member_id = event.target.previousElementSibling.textContent;
        var type = issend ? 1 : 2;
        var priority = 1000;
        if (type == 1) {
            priority = sendreceive.send[0].priority + 2;
        } else {
            priority = sendreceive.receive[0].priority + 2;
        }
        var query = {
            addr_id: addr_id,
            type: type,
            priority: priority,
            member_id: member_id
        }

        $.get('address/totop', query, function (res) {
            var res = eval('(' + res + ')');
            if (issend) {
                sendreceive.send = res.data;
            } else {
                sendreceive.receive = res.data;
            }
        })
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>

</body>
</html>