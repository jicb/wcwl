<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>常用地址管理</title>
    <link rel="stylesheet" href="{!! URL::asset('sui/dist/css/sm.min.css') !!}"/>
    {{--<link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>--}}
</head>
<body>
<div class="page-content">
    <div class="buttons-tab">
        <a href="#tab1" class="tab-link active button">全部</a>
        <a href="#tab2" class="tab-link button">待付款</a>
        <a href="#tab3" class="tab-link button">待发货</a>
    </div>

    <div class="tabs">
        <div id="tab1" class="tab active">
            <div class="content-block">
                <div class="buttons-row">
                    <a href="#tab1-1" class="tab-link active button">Tab 1</a>
                    <a href="#tab1-2" class="tab-link button">Tab 2</a>
                    <a href="#tab1-3" class="tab-link button">Tab 3</a>
                </div>
                <div class="tabs">
                    <p class='tab active' id='tab1-1'>This is tab 1-1 content</p>
                    <p class='tab' id='tab1-2'>This is tab 1-2 content</p>
                    <p class='tab' id='tab1-3'>13855589778</p>
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

{{--
<script src="{!! URL::asset('js/vue.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{{URL::asset('js/kitchen-sink.js')}}"></script>
--}}

<script type="text/javascript" src="{!! URL::asset('sui/dist/js/zepto.js') !!}"></script>
<script type="text/javascript" src="{!! URL::asset('sui/dist/js/sm.js') !!}"></script>

{{--<script src="{!! URL::asset('js/vue.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{{URL::asset('js/kitchen-sink.js')}}"></script>--}}

</body>
</html>