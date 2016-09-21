<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>我要发货</title>
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    <style>
        .height1{
            height:57px;
            max-height: 57px;
            min-height: 57px;
            display:table;
        }
        hr{
            margin-top:1px;
            margin-bottom: 1px;
            padding:0 auto;
            width:100%;
        }
        .vertical-middle{
            display:table-cell;
            vertical-align:middle;
            font-size:12px;
        }
        .hr-middle{
            text-align:center;
        }
        .bottom0{
            margin-bottom: 0;
            font-size: 14px;
        }
        .btn-center{
            margin:0;
            padding:2px 4px;
        }

        .border-right{
            border-right: 1px solid;
        }

        .myfoot{
            position:fixed;
            z-index: 999;
            bottom: 0;
            left:0;
            width:100%;
        }



    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-9 height1">
            <div class="vertical-middle border-right">
                <p class="text-success bottom0">计长兵 15527219896</p>
                <p class="text-info bottom0">湖北省 武汉市 江夏区</p>
                <p class="text-info bottom0">万达小区 2号楼1单元4C</p>
            </div>
        </div>
        <div class="col-xs-3 height1">
            <div class="vertical-middle hr-middle"><button class="btn btn-warning btn-center vertical-middle"><span class="glyphicon glyphicon-pencil"></span> 更新</button></div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-xs-9 height1 ">
            <div class="vertical-middle border-right">请输入收货方信息</div>
        </div>
        <div class="col-xs-3 height1 ">
            <div class="vertical-middle hr-middle"><button class="btn btn-warning btn-center vertical-middle"><span class="glyphicon glyphicon-pencil"></span> 更新</button></div>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="pull-left"><span class="glyphicon glyphicon-glass"></span> </div>
        <div class="pull-left">请输入货物信息</div>
        <div class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span> </div>
    </div>
    <hr />

    <div class="row">
        <div class="col-xs-6">
            付款方式
            <div class="pull-right">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </div>
        </div>
        <div class="col-xs-6">
            付款方式
            <div class="pull-right">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            付款方式
            <div class="pull-right">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </div>
        </div>
        <div class="col-xs-6">
            付款方式
            <div class="pull-right">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </div>
        </div>
    </div>
    <hr />
    <div class="row text-center">
        备注
    </div>
    <div class="myfoot">
        <div class="row">
            <div class="col-xs-8 bg-info">
                同意
            </div>
            <div class="col-xs-4 bg-warning">
                提交
            </div>
        </div>
    </div>
</div>

</body>
</html>