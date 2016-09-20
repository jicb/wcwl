<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>返回微信</title>
    <script>
        var readyFunc = function onBridgeReady() {
            WeixinJSBridge.invoke('closeWindow',{
            },function(res){

            });


        }

        window.onload = readyFunc;
    </script>
</head>
<body>
<p style="display: none;">welcome</p>
</body>
</html>
