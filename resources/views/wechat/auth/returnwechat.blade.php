<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>返回微信</title>
    {{--<script src="/js/jweixin.js"></script>--}}
    <script>
        window.onload = function onBridgeReady() {
            WeixinJSBridge.invoke('closeWindow',{
            },function(res){

            });

        };
    </script>
</head>
<body>

</body>
</html>