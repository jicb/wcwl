<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>常用发货方信息</title>
    <link rel="stylesheet" href="{!! URL::asset('sui/dist/css/sm.min.css') !!}"/>
</head>
<body>

<header class="bar bar-nav" id="nav">
    <a class="button button-link button-nav pull-left back" href="useraddress">
        <span class="icon icon-left"></span>
        返回
    </a>
    <a class="button button-link button-nav pull-right" href="#" v-on:click="sure" id="sure">
        确定
    </a>
</header>

<div class="content">
    <div class="list-block media-list">
        <ul>
            <li>
                <label class="label-checkbox item-content">
                    <input type="radio" name="my-radio">
                    <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="useraddressid" style="display:none;">123</div>
                            <div class="item-title">计长兵 15527219896</div>
                            <div class="item-after">发货方</div>
                        </div>
                        <div class="item-subtitle">湖北省 武汉市 江夏区</div>
                        <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                    </div>
                </label>
            </li>
            <li>
                <label class="label-checkbox item-content">
                    <input type="radio" name="my-radio">
                    <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">计长兵 15527219896</div>
                            <div class="item-after">发货方</div>
                        </div>
                        <div class="item-subtitle">湖北省 武汉市 江夏区</div>
                        <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                    </div>
                </label>
            </li>
            <li>
                <label class="label-checkbox item-content">
                    <input type="radio" name="my-radio">
                    <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">计长兵 15527219896</div>
                            <div class="item-after">发货方</div>
                        </div>
                        <div class="item-subtitle">湖北省 武汉市 江夏区</div>
                        <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                    </div>
                </label>
            </li>
            <li>
                <label class="label-checkbox item-content">
                    <input type="radio" name="my-radio">
                    <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">计长兵 15527219896</div>
                            <div class="item-after">发货方</div>
                        </div>
                        <div class="item-subtitle">湖北省 武汉市 江夏区</div>
                        <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                    </div>
                </label>
            </li>
            <li>
                <label class="label-checkbox item-content">
                    <input type="radio" name="my-radio">
                    <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">计长兵 15527219896</div>
                            <div class="item-after">发货方</div>
                        </div>
                        <div class="item-subtitle">湖北省 武汉市 江夏区</div>
                        <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                    </div>
                </label>
            </li>
            <li>
                <label class="label-checkbox item-content">
                    <input type="radio" name="my-radio">
                    <div class="item-media"><i class="icon icon-form-checkbox"></i></div>
                    <div class="item-inner">
                        <div class="item-title-row">
                            <div class="item-title">计长兵 15527219896</div>
                            <div class="item-after">发货方</div>
                        </div>
                        <div class="item-subtitle">湖北省 武汉市 江夏区</div>
                        <div class="item-text">光谷大道金融港博彦科技5楼风行网</div>
                    </div>
                </label>
            </li>

        </ul>
    </div>
</div>


<script type="text/javascript" src="{!! URL::asset('sui/dist/js/zepto.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm.js') !!}"></script>
<script src="{!! URL::asset('js/vue.js') !!}"></script>

<script>
    var nav = new Vue({
        el:'#nav',
        methods:{
            sure:function(){
                var ckd = $("input[type='radio']:checked").parent();
                var title = ckd.find('.useraddressid').text();
                var arr = '<?php echo $testArray; ?>';
                $('#sure').attr('href','delivery?');
            }
        }
    })

</script>
</body>
</html>