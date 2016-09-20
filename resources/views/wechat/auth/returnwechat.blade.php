<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>返回微信</title>
    <script>
        var readyFunc = function onBridgeReady() {
            WeixinJSBridge.invoke('closeWindow',{
            },function(res){
                $.get('/h5/auth/returnregistered?openid={!! $openid !!}',function(res){

                });
            });
        }

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
