<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>常用地址管理</title>
    <link rel="stylesheet" href="{!! URL::asset('sui/dist/css/sm.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
</head>
<body>
<div class="content">
    <div class="tabs">
        <div id="tab1" class="tab active">
            <div class="content-block">
                <div class="buttons-row">
                    <a href="#send" class="tab-link active button">发货方</a>
                    <a href="#receive" class="tab-link button">收货方</a>
                </div>
                <div class="tabs">
                    <div class='tab active' id='send'>
                        <div class="list-block media-list">
                            <ul>
                                <li class="swipeout">
                                    <div class="item-content swipeout-content">
                                        <div class="item-inner">
                                            <div class="item-title">Swipe left on me please</div>
                                        </div>
                                    </div>
                                    <div class="swipeout-actions-right">
                                        <a href="#" data-confirm="Are you sure you want to delete this item?" class="swipeout-delete" style="background-color: #00c795">置顶</a>
                                        <a href="#" data-confirm="Are you sure you want to delete this item?" class="swipeout-delete">删除</a>
                                    </div>
                                </li>

                                {{--<li>
                                    <a class="item-link item-content"style="height:110px;">
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">@{{ senduser }}</div>
                                                <div class="item-after">发货方</div>
                                            </div>
                                            <div class="item-subtitle">@{{ sendaddress }}</div>
                                            <div class="item-text">@{{ sendaddressdetail }}</div>
                                        </div>
                                    </a>
                                </li>--}}

                                <li class="swipeout">
                                    <div class="item-content swipeout-content">
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">计长兵 15527219896</div>
                                            </div>
                                            <div class="item-subtitle">湖北省武汉市江夏区</div>
                                            <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                                        </div>
                                        <div class="swipeout-actions-right">
                                            <a href="#" data-confirm="Are you sure you want to delete this item?"  style="background-color: #00c795">置顶</a>
                                            <a href="#" data-confirm="Are you sure you want to delete this item?" class="swipeout-delete">删除</a>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <p class='tab' id='receive'>receive</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{!! URL::asset('sui/dist/js/zepto.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm.js') !!}"></script>
<script src="{!! URL::asset('js/vue.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{{URL::asset('js/kitchen-sink.js')}}"></script>
</body>
</html>