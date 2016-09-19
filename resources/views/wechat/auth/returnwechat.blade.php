<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>返回微信</title>
    {{--<script src="/js/jweixin.js"></script>--}}
    <script>
        window.onload = function(){
            WeixinJSBridge.invoke('closeWindow',{},function(res){

                //alert(res.err_msg);
                //
                /*$.get('/h5/auth/returnregistered?openid={!! $openid !!}',function(res){

                });*/

            });
            //wx.closeWindow();
        }
    </script>
</head>
<body>

</body>
</html>