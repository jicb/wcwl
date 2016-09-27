<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>常用地址管理</title>

    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('sui/dist/css/sm.min.css') !!}"/>
</head>
<body style="display:none;">
<div class="views">
    <div class="view view-main">
        <div class="content" id="content" style="margin-top:1.45em;">
            <div class="tabs" id="sendreceive">
                <div id="tab1" class="tab active">
                    <div class="content">
                        <div class="buttons-row">
                            <a href="#tab1-1" class="tab-link active button" v-on:click="issend">发货方</a>
                            <a href="#tab1-2" class="tab-link button" v-on:click="isreceive">收货方</a>
                        </div>
                        <div class="tabs">
                            <div class='tab active' id='tab1-1'>
                                <div class="list-block media-list">
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
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete" style="background-color: #00c795">置顶</a>
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete">删除</a>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class='tab' id='tab1-2'>
                                <div class="list-block media-list">
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
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete" style="background-color: #00c795">置顶</a>
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete">删除</a>
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
    </div>
</div>

<div class="row no-gutter" style="position: fixed;left:0;bottom:0;z-index: 10000;width:100%;margin-top:1.45em;">
    <div class="col-100 open-popup"
         style="height:2.5em;background-color: #0894ec;line-height: 2.5em;text-align: center">添加
    </div>
</div>

<div class="popup tablet-fullscreen">
    <div class="content" id="createAddress">
        <div class="list-block">
            <ul>
                <!-- Text inputs -->
                <li>
                    <div class="item-content">
                        <div class="item-media"><i class="icon icon-form-name"></i></div>
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
                        <div class="item-media"><i class="icon icon-form-email"></i></div>
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
                        <div class="item-media"><i class="icon icon-form-password"></i></div>
                        <div class="item-inner">
                            <div class="item-title label">地址</div>
                            <div class="item-input">
                                <input type="text" class='city-picker' v-model="pca"/>
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
                                <input type="text" placeholder="详细到门牌号" v-model="street">
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


{{--
<script src="{!! URL::asset('js/vue.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{{URL::asset('js/kitchen-sink.js')}}"></script>
--}}


<script src="{!! URL::asset('js/vue.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/zepto.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm.js') !!}"></script>
<script src="{!! URL::asset('js/kitchen-sink.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm-city-picker.js') !!}"></script>
<script>
    Zepto(function () {
        $(".city-picker").cityPicker({
            value: ['湖北', '武汉', '武昌区']
        });
    })

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
                    pca: this.pca,
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
                });
            }
        }

    })




    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>
</body>
</html>