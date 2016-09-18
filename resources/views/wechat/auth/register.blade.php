<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>注册</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/wcwl/dist/css/bootstrapValidator.min.css">

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/wcwl/dist/js/bootstrapValidator.min.js"></script>

    <style type="text/css">
        form {
            margin-top: 25px;
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
                    sex: {
                        message: '性别不能为空',
                        validators: {
                            notEmpty: {
                                message: '性别不能为空'
                            },
                        }
                    },
                    password: {
                        message: '密码不正确',
                        validators: {
                            notEmpty: {
                                message: '密码不能为空'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: '密码长度在6到30个字符之间'
                            },
                        }
                    },
                    repassword: {
                        validators: {
                            notEmpty: {
                                message: '确认密码不能为空'
                            },
                            stringLength: {
                                min: 6,
                                max: 30,
                                message: '密码长度在6到30个字符之间'
                            },
                            identical: {
                                field: 'password',
                                message: '与支付密码不一致'
                            }
                        }
                    },
                }

            });
        });

    </script>
</head>
<body>
<div class="container-fluid">
    <form role="form" class="form-horizontal" id="hehe" method="post" action="{{url('/wechat/ppp')}}">
        {!! csrf_field() !!}
        <div class="alert alert-success" style="display: none;">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
        </div>
        <div class="form-group">
            <label for="phone" class="col-xs-3 control-label">手机号</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="phone" id="phone"/>
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
            <label for="name" class="col-xs-3 control-label">姓名</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="name" id="name"/>
            </div>
        </div>
        <div class="form-group">
            <label for="sex" class="col-xs-3 control-label">性别</label>
            <div class="col-xs-8" id="sex">
                <label class="checkbox-inline">
                    <input type="radio" name="sex" id="man"
                           value="man" checked> 男
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="sex" id="woman"
                           value="woman"> 女
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-xs-3 control-label">支付密码</label>
            <div class="col-xs-8" id="password">
                <input type="password" class="form-control" name="password" placeholder="用于支付，妥善保管"/>
            </div>
        </div>
        <div class="form-group">
            <label for="repassword" class="col-xs-3 control-label">确认密码</label>
            <div class="col-xs-8" id="repassword">
                <input type="password" class="form-control" name="repassword"/>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary col-xs-10 col-xs-offset-1">提交</button>
        </div>
    </form>
</div>

<script>
    function getCode(obj,n){
        $.get('/h5/auth/register/validate?tel='+$('#phone').val(),function(res){

        })
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
</script>
</body>
</html>