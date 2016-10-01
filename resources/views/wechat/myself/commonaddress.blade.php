<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>常用地址管理</title>

    <link rel="stylesheet" href="{!! URL::asset('framework7plus/dist/css/framework7.ios.min.css') !!}">
    <link rel="stylesheet" href="{!! URL::asset('framework7plus/dist/css/framework7.ios.colors.min.css') !!}">

</head>
<body style="display:none;">
<div class="views">
    <div class="view view-main"  id="sendreceive">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="left">
                    <a href="myself?openid={!! $openid !!}" class="link external">返回</a>
                </div>


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
                                <input type="text" placeholder="请输入名称" v-model="name" id="create-name" required>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title label">手机号</div>
                            <div class="item-input">
                                <input type="text" placeholder="请输入手机号" v-model="phone" id="create-phone" required>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title label">地址</div>
                            <div class="item-input">
                                <input type="text" class='city-picker' v-model="pca" id="pca" readonly required/>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="item-content">
                        <div class="item-inner">
                            <div class="item-title label">详细地址</div>
                            <div class="item-input">
                                <input type="text" placeholder="详细到门牌号" v-model="street" id="create-street" required/>
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
                <div class="col-50"><a href="#" class="button button-big button-fill button-success"
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
    var myApp = new Framework7();

    // Export selectors engine
    var $$ = Dom7;

    // Add view
    var mainView = myApp.addView('.view-main', {
        // Because we use fixed-through navbar we can enable dynamic navbar
        dynamicNavbar: true
    });
</script>

<script>
    var data = eval('(' + '<?php echo $data;?>' + ')');
    var SSQ = data.SSQ;
    var SS = data.SS;
    var Sheng = data.Sheng;
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
            pca: "湖北 武汉 江岸区",
            street: "",
        },
        methods: {
            create: function () {
                if(!createValidate()){
                    return false;
                }
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

                    myApp.closeModal();
                });
            }
        }

    });

</script>

<script>

    /*var ssq = {
        '湖北': {
            '武汉': ['江岸区', '江汉区', '硚口区', '汉阳区', '武昌区', '青山区', '洪山区', '东西湖区', '汉南区', '蔡甸区', '江夏区', '黄陂区', '新洲区']
        }
    };

    var ss = {
        '湖北': ['武汉'],
    };*/




    var pickerDependent = myApp.picker({
        input: '.city-picker',
        rotateEffect: true,
        formatValue: function (picker, values) {
            return values[0] + " " + values[1] + " " + values[2];
        },
        cols: [
            {
                textAlign: 'left',
                values: Sheng,
                onChange: function (picker, sheng) {
                    if (picker.cols[1].replaceValues) {
                        picker.cols[1].replaceValues(SS[sheng]);
                        picker.cols[2].replaceValues(SSQ[sheng][picker.cols[1].value]);
                    }
                }
            },
            {
                textAlign: 'left',
                values: SS[Sheng[0]],
                onChange: function (picker, shi) {
                    if (picker.cols[2].replaceValues) {
                        picker.cols[2].replaceValues(SSQ[picker.cols[0].value][shi]);
                    }
                }
            },
            {
                values: SSQ[Sheng[0]]['武汉']
            }
        ]
    });
</script>

<script>
    function createValidate(){
        if(!$('#create-name').val()){
            myApp.alert('姓名不能为空！！！');
            return false;
        }

        var phone = $('#create-phone').val();
        if(!(/^1[34578]\d{9}$/.test(phone))){
            myApp.alert('请填写正确的手机号码！！！');
            return false;
        }

        if(!$("#create-street").val()){
            myApp.alert('详细地址不能为空！！！');
            return false;
        }

        return true;
    }

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