<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>返回微信</title>
    {{--<script src="/js/jweixin.js"></script>--}}
    <script>
        var readyFunc = function onBridgeReady() {
            var curid;
            var curAudioId;
            var playStatus = 0;



            WeixinJSBridge.invoke('closeWindow',{
            },function(res){

            });
        }

        window.onload = readyFunc;

        if (typeof WeixinJSBridge === "undefined") {
            document.addEventListener('WeixinJSBridgeReady', readyFunc, false);
        } else {
            readyFunc();
        }
    </script>
</head>
<body>

</body>
</html>
