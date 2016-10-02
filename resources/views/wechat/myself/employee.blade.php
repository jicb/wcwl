<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>员工通道</title>

    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}"/>

    <style>
        .col-card{
            height:80px;
            border-radius: 15px;
            line-height:80px;
            text-align: center;
            font-size: 1.5em;
        }

        .row-my{
            margin-bottom: 1em;
        }
    </style>
</head>
<body style="display:none;">
<div class="views">
    <div class="view view-main">
        <div class="pages">
            <!-- Pag has additional "with-subnavbar" class -->
            <div class="page">
                <div class="page-content">
                    <div class="content-block">
                        <div class="row row-my">
                            <div class="col-50 col-card" style="background-color: #00d449;">新单核价</div>
                            <div class="col-50 col-card" style="background-color: yellowgreen;">订单收现</div>
                        </div>
                        <div class="row row-my">
                            <div class="col-50 col-card" style="background-color: purple;">网点添加</div>
                            <div class="col-50 col-card" style="background-color: darkred;">收送范围</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
    /*var notend = data.notend;
     var ended = data.ended;
     var member_id = '{!! $member_id !!}';
     var tab_notend = new Vue({
     el: "#tab-notend",
     data: {
     notend: notend,
     },
     });
     var tab_ended = new Vue({
     el: "#tab-ended",
     data: {
     ended: ended,
     },
     });*/
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>

</body>
</html>

