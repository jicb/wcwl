<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>发货方信息</title>
    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}" />
</head>
<body style="display:none;">
<div class="views">
    <div class="view view-main">
        <div class="pages">
            <!-- Pag has additional "with-subnavbar" class -->
            <div class="page">
                <div class="page-content" id="conent">
                    <div class="list-block">
                        <ul>
                            <!-- Text inputs -->
                            <li>
                                <a class="item-link item-content" href="#">
                                    <div class="item-inner">
                                        <div class="item-title">@{{ method }}</div>
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
                                            <input type="text" placeholder="请输入名称">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content">
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
            </div>
        </div>
    </div>
</div>




<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{!! URL::asset('js/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('js/vue.min.js') !!}"></script>
<script>
    var contentVue = new Vue({
        el:"#content",
        data:{
            method:"常用发货方信息"
        }
    });

    var method = '<?php echo $method ?>';
    if(method = "receive"){
        contentVue.method = "常用收货方信息";
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>
</body>
</html>