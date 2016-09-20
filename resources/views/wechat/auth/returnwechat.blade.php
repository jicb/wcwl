<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>返回微信</title>
    {{--<script src="/js/jweixin.js"></script>--}}
    <script>
        var readyFunc = function onBridgeReady() {
            WeixinJSBridge.invoke('closeWindow',{
            },function(res){

            });
        }

        //window.onload = readyFunc;

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
