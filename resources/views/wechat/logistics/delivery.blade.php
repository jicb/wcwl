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
<script src="{!! URL::asset('js/mydelivery.js') !!}"></script>



</body>
</html>