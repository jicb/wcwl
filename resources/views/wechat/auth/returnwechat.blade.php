<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>返回微信</title>
    {{--<script src="/js/jweixin.js"></script>--}}
    <script>
        /*window.onload = function(){
         WeixinJSBridge.invoke('closeWindow',{},function(res){

         //alert(res.err_msg);
         //
         /!*$.get('/h5/auth/returnregistered?openid={!! $openid !!}',function(res){

         });*!/

         });
         //wx.closeWindow();

         }*/
        window.onload = readyFunc;
    </script>
</head>
<body>
<button type="type" id="closeWindow">关闭网页</button>
<script>
    var readyFunc = function onBridgeReady() {
        var curid;
        var curAudioId;
        var playStatus = 0;


        // 关闭当前webview窗口 - closeWindow
        //document.querySelector('#closeWindow').addEventListener('click', function(e){
        WeixinJSBridge.invoke('closeWindow',{
        },function(res){

            //alert(res.err_msg);

        });
        //});

    }


    if (typeof WeixinJSBridge === "undefined") {
        document.addEventListener('WeixinJSBridgeReady', readyFunc, false);
    } else {
        readyFunc();
    }
</script>
</body>
</html>
