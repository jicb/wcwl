<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
   {{-- <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">--}}
    <title>常用地址管理</title>

    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('sui/dist/css/sm.min.css') !!}"/>
</head>
<body style="display:none;">
<div  class="views">
    <div class="view view-main">
        <div class="content" id="content" style="margin-top:1.45em;">
            <div class="tabs">
                <div id="tab1" class="tab active">
                    <div class="content">
                        <div class="buttons-row">
                            <a href="#tab1-1" class="tab-link active button">@{{ send }}</a>
                            <a href="#tab1-2" class="tab-link button">收货方</a>
                        </div>
                        <div class="tabs">


                            <div class='tab active' id='tab1-1'>
                                <div class="list-block media-list">
                                    <ul>
                                        <li class="swipeout">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">Swipe left on me please</div>
                                                        <div class="item-after">发货方</div>
                                                    </div>
                                                    <div class="item-subtitle">湖北省武汉市江夏区</div>
                                                    <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete" style="background-color: #00c795">置顶</a>
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete">删除</a>
                                            </div>
                                        </li>
                                        <li class="swipeout">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">Swipe left on me please</div>
                                                        <div class="item-after">发货方</div>
                                                    </div>
                                                    <div class="item-subtitle">湖北省武汉市江夏区</div>
                                                    <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete" style="background-color: #00c795">置顶</a>
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete">删除</a>
                                            </div>
                                        </li>
                                        <li class="swipeout">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">Swipe left on me please</div>
                                                        <div class="item-after">发货方</div>
                                                    </div>
                                                    <div class="item-subtitle">湖北省武汉市江夏区</div>
                                                    <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete" style="background-color: #00c795">置顶</a>
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete">删除</a>
                                            </div>
                                        </li>
                                        <li class="swipeout">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">Swipe left on me please</div>
                                                        <div class="item-after">发货方</div>
                                                    </div>
                                                    <div class="item-subtitle">湖北省武汉市江夏区</div>
                                                    <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete" style="background-color: #00c795">置顶</a>
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete">删除</a>
                                            </div>
                                        </li>
                                        <li class="swipeout">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">Swipe left on me please</div>
                                                        <div class="item-after">发货方</div>
                                                    </div>
                                                    <div class="item-subtitle">湖北省武汉市江夏区</div>
                                                    <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete" style="background-color: #00c795">置顶</a>
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete">删除</a>
                                            </div>
                                        </li>
                                        <li class="swipeout">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">Swipe left on me please</div>
                                                        <div class="item-after">发货方</div>
                                                    </div>
                                                    <div class="item-subtitle">湖北省武汉市江夏区</div>
                                                    <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                                                </div>
                                            </div>
                                            <div class="swipeout-actions-right">
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete" style="background-color: #00c795">置顶</a>
                                                <a href="#" data-confirm="Are you sure you want to delete this item?"
                                                   class="swipeout-delete">删除</a>
                                            </div>
                                        </li>

                                        <li class="swipeout">
                                            <div class="item-content swipeout-content">
                                                <div class="item-inner">
                                                    <div class="item-title-row">
                                                        <div class="item-title">Swipe left on me please</div>
                                                        <div class="item-after">发货方</div>
                                                    </div>
                                                    <div class="item-subtitle">湖北省武汉市江夏区</div>
                                                    <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
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
                            <p class='tab' id='tab1-2'>This is tab 1-2 content</p>

                        </div>
                    </div>
                </div>
                <div id="tab2" class="tab">
                    <div class="content-block">
                        <p>This is tab 2 content</p>
                    </div>
                </div>
                <div id="tab3" class="tab">
                    <div class="content-block">
                        <p>This is tab 3 content</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row no-gutter" style="position: fixed;left:0;bottom:0;z-index: 10000;width:100%;margin-top:1.45em;">
    <div class="col-100 open-popup" style="height:2.5em;background-color: #0894ec;line-height: 2.5em;text-align: center">添加</div>
</div>

<div class="popup tablet-fullscreen">
    <div class="content" id="content">
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
                <div class="col-50"><a href="#" class="button button-big button-fill button-danger close-popup">取消</a></div>
                <div class="col-50"><a href="#" class="button button-big button-fill button-success close-popup">提交</a></div>
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
    new Vue({
        el:"#content",
        data:{
            send:"发货方"
        }
    })
    Zepto(function(){
        $(".city-picker").cityPicker({
            value: ['湖北', '武汉', '武昌区']
        });
    })


    document.addEventListener('DOMContentLoaded',function(){
        document.body.style.display = 'block';
    });
</script>
</body>
</html>