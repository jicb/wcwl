<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>常用地址管理</title>
    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
</head>
<body>
<div class="views">
    <div class="view view-main">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="left"></div>
                <div class="center"></div>
                <div class="right"></div>
                <!-- Sub navbar -->
                <div class="subnavbar">
                    <div class="buttons-row">
                        <a href="#tab-send" class="button tab-link active">发货方</a>
                        <a href="#tab-receive" class="button tab-link">收货方</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="pages navbar-through">
            <!-- Pag has additional "with-subnavbar" class -->
            <div data-page="home" class="page with-subnavbar">
                <div class="page-content hide-bars-on-scroll">
                    <div class="tabs">
                        <div id="tab-send" class="tab active">
                            <div class="content-block">
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="swipeout" v-for="item in send">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title"
                                                             style="display: none;">@{{ item.address_id }} </div>
                                                        <div class="item-title">@{{ item.name }} @{{ item.phone }}</div>
                                                        <div class="item-after">发货方</div>
                                                    </div>
                                                    <div class="item-subtitle">@{{ item.pca }}</div>
                                                    <div class="item-text">@{{ item.street }}</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <a href="#" class="to-top"
                                                   style="background-color: #00c795">置顶<span
                                                            style="display: none;">@{{ item.addr_id }}</span></a>
                                                <a href="#" style="background-color: red;" class="item-delete">删除<span
                                                            style="display: none;">@{{ item.addr_id }}</span></a>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="tab-receive" class="tab">
                            <div class="content-block">
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
                                                <a href="#" style="background-color: #00c795"
                                                   class="to-top">置顶<span
                                                            style="display: none;">@{{ item.addr_id }}</span></a>
                                                <a href="#" class="item-delete" style="background-color: red;">删除<span
                                                            style="display: none;">@{{ item.addr_id }}</span></a>
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
        <div class="toolbar">
            <div class="toolbar-inner" style="justify-content: center;">
                Hello
            </div>
        </div>
    </div>
</div>
<!-- Path to Framework7 Library JS-->
<script type="text/javascript" src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script>
    var myApp = new Framework7();

    // Export selectors engine
    var $$ = Dom7;

    // Add view
    var mainView = myApp.addView('.view-main',{
        // Because we use fixed-through navbar we can enable dynamic navbar
        dynamicNavbar: true
    });
</script>

</body>
</html>