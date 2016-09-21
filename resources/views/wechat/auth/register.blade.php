<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
    <title>注册</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/wcwl/dist/css/bootstrapValidator.min.css">

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/wcwl/dist/js/bootstrapValidator.min.js"></script>

    <style type="text/css">
        form {
            margin-top: 40px;
        }

        .control-label {
            padding-top: 7px;
            margin-bottom: 0;
            text-align: right;
            padding-right: 5px;
        }

    </style>
    <script>
        $(document).ready(function () {
            $('#hehe').bootstrapValidator({
                message: 'This value is not valid',
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    phone: {
                        messager: "手机号不正确",
                        validators: {
                            notEmpty: {
                                message: '请输入手机号！'
                            },
                            regexp: {
                                regexp: /^1[3458]\d{9}$/,
                                message: '输入的手机号格式不正确'
                            }
                        }
                    },
                    name: {
                        message: '名称不能为空',
                        validators: {
                            notEmpty: {
                                message: '名称不能为空'
                            },
                            regexp: {
                                regexp: /^[\u4e00-\u9fa5]+$/,
                                message: '请输入您的真实姓名'
                            },
                            stringLength: {
                                min: 2,
                                max: 4,
                                message: '名字应该在2-4个字之间，难道您是少数名族？'
                            },
                        }
                    },

                }

            });
        });

    </script>
</head>
<body>
<div class="container-fluid">
    <form role="form" class="form-horizontal" id="hehe" method="post" action="{{url('/h5/auth/registersend')}}">
        {!! csrf_field() !!}

        @if (isset($alert))
            <div class="alert alert-info text-center">
                {!! $alert !!}
            </div>
        @endif

        <div class="form-group hidden">
            <label for="openid" class="col-xs-3 control-label">openid</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="openid" id="openid" value="{!! $openid !!}"/>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-xs-3 control-label">姓名</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="name" id="name" value = "<?php if(isset($name)) echo $name?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-xs-3 control-label">手机号</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="phone" id="phone" value = "<?php if(isset($phone)) echo $phone?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-xs-3 control-label">验证码</label>
            <div class="col-xs-9">
                <div style="float:left">
                    <input type="text" class="form-control" name="identifying" id="identifying" style="width:150px;"/>
                </div>
                <div style="float:left">
                    <input type="button" class="btn btn-success" id="getidentifying" onclick="getCode(this,60)" value="获取">
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary col-xs-10 col-xs-offset-1">提交</button>
        </div>
    </form>
</div>

<script>
    function getCode(obj,n){
        if(!getMsgCode())
            return ;
        var t=obj.value;
        (function(){
            if(n>0){
                obj.disabled=true;
                obj.value=''+(n--)+'秒';
                setTimeout(arguments.callee,1000);
            }else{
                obj.disabled=false;
                obj.value=t;
            }
        })();
    }
    function getMsgCode(){
        var reCat = /^1[3458]\d{9}$/;
        var data = $('#phone').val();
        if(reCat.test(data)){
            $.get('/h5/auth/validate?tel='+$('#phone').val(),function(res){
                if(res.flag != true){
                    alert(res.msg);
                }
            });
        }else{
            alert('请输入正确的手机号！');
            return false;
        }
        return true;
    }
</script>
</body>
</html>