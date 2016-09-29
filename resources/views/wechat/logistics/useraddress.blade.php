<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>{!! $title !!}</title>
    <link rel="stylesheet" href="{!! URL::asset('css/framework7.min.css') !!}"/>
    <link rel="stylesheet" href="{!! URL::asset('css/wechat/common.css') !!}"/>
</head>
<body style="display:none;">
<div class="views">
    <div class="view view-main">
        <div class="pages">
            <!-- Pag has additional "with-subnavbar" class -->
            <div class="page">
                <div class="page-content">
                    <div class="list-block">
                        <ul>
                            <!-- Text inputs -->
                            <li>
                                <a class="item-content open-popup" href="#">
                                    <div class="item-inner" id="typevue">
                                        <div class="item-title">@{{ type }}</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="list-block" id="insertData">
                        <ul>
                            <!-- Text inputs -->
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">姓名</div>
                                        <div class="item-input">
                                            <input type="text" placeholder="请输入名称" value="@{{ name }}" id="insert-name"/>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">手机号</div>
                                        <div class="item-input">
                                            <input type="text" placeholder="请输入手机号" value="@{{ phone }}" id="insert-phone"/>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">地址</div>
                                        <div class="item-input">
                                            <input type="text" class='city-picker' value="@{{ pca }}" id="insert-pca"/>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content">
                                    <div class="item-inner">
                                        <div class="item-title label">详细地址</div>
                                        <div class="item-input">
                                            <input type="text" placeholder="详细到门牌号" value="@{{ street }}" id="insert-street"/>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="content-block">
                        <div class="row">
                            <div class="col-50"><a href="#" class="button button-big button-fill button-danger">取消</a>
                            </div>
                            <div class="col-50"><a href="#" class="button button-big button-fill button-success">提交</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup" id="popup">
    <div class="views">
        <div class="view">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="left"><a href="#" class="close-popup">取消</a></div>
                    <div class="center">@{{ type }}</div>
                    <div class="right"><a href="#" class="close-popup" v-on:click="insertData">确定</a></div>
                </div>
            </div>
            <div class="pages navbar-through">
                <div class="page">
                    <div class="page-content">
                        <div class="list-block media-list">
                            <ul>
                                <li>
                                <label class="label-radio item-content">
                                    <input type="radio" name="my-radio" checked>
                                    <div class="item-media"></div>
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-title">nihao</div>
                                            <div class="item-after">wohao</div>
                                        </div>
                                        <div class="item-subtitle">dajiahao</div>
                                        <div class="item-text">douhao</div>
                                    </div>
                                </label>
                                </li>
                                {{--<li v-for="item in items">
                                    <label class="label-radio item-content">
                                        <input type="radio"   v-model="@{{ $index }}"/>
                                        <div class="item-inner">
                                            <div class="item-title-row">
                                                <div class="item-title">@{{ item.name }} @{{ item.phone }}</div>
                                                <div class="item-after">@{{ type }}</div>
                                            </div>
                                            <div class="item-subtitle">@{{ item.pca }}</div>
                                            <div class="item-text">@{{ item.street }}</div>
                                        </div>
                                    </label>
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{!! URL::asset('js/vue.min.js') !!}"></script>
<script src="{!! URL::asset('js/framework7.min.js') !!}"></script>
<script src="{!! URL::asset('js/jquery.min.js') !!}"></script>
<script>

    var insertVue = new Vue({
        el: "#insertData",
        data: {
            name: "",
            phone: "",
            pca: "",
            street: ""
        }
    });


    var typeVue = new Vue({
        el: "#typevue",
        data: {
            type: "常用发货方信息"
        }
    });
    var popupVue = new Vue({
        el: '#popup',
        data: {
            items: "",
            type: ""
        },
        methods:{
            insertData:function(){
                var selected = $("input[type='radio']:checked");
                if (selected && selected.length) {
                    var index = selected.val();
                    $('#insert-name').val(items[index].name);
                    $('#insert-phone').val(items[index].phone);
                    $('#insert-pca').val(items[index].pca);
                    $('#insert-street').val(items[index].street);
                }
            }
        }
    });


    var data = eval('(' + '<?php echo $data;?>' + ')');
    var items = data.data;
    var type = '{!! $type !!}';


    if (type == "2") {
        typeVue.type = "常用收货方信息";
    }
    popupVue.items = items;

    //items.type = type == 1 ? '发货方' : '收货方';

    popupVue.type = type == 1 ? '发货方' : '收货方';

</script>
<script>
    var myApp = new Framework7();

    // Export selectors engine
    var $$ = Dom7;

    // Add view
    var mainView = myApp.addView('.view-main', {
        // Because we use fixed-through navbar we can enable dynamic navbar
        dynamicNavbar: true
    });

    var ssq = {
        '安徽': {
            '合肥': ['蜀山', '包河', '庐阳'],
            '芜湖': ['无为', '怀远'],
            '马鞍山': ['5'],
            '铜陵': [],
            '池州': []
        },
        German: {'Audi': [], 'BMW': [], 'Mercedes': [], 'Volkswagen': [], 'Volvo': []},
        American: {'Cadillac': [], 'Chrysler': [], 'Dodge': [], 'Ford': []}
    };

    var ss = {
        '安徽': ['合肥', '芜湖', '马鞍山', '铜陵', '池州'],
        German: ['Audi', 'BMW', 'Mercedes', 'Volkswagen', 'Volvo'],
        American: ['Cadillac', 'Chrysler', 'Dodge', 'Ford']
    };

    var pickerDependent = myApp.picker({
        input: '.city-picker',
        rotateEffect: true,
        formatValue: function (picker, values) {
            return values[0] + " " + values[1] + " " + values[2];
        },
        cols: [
            {
                textAlign: 'left',
                values: ['安徽', 'German', 'American'],
                onChange: function (picker, sheng) {
                    if (picker.cols[1].replaceValues) {
                        picker.cols[1].replaceValues(ss[sheng]);
                    }
                }
            },
            {
                textAlign: 'left',
                values: ss['安徽'],
                onChange: function (picker, shi) {
                    if (picker.cols[2].replaceValues) {
                        picker.cols[2].replaceValues(ssq[picker.cols[0].value][shi]);
                    }
                }
            },
            {
                values: ssq['安徽']['合肥']
            }
        ]
    });
</script>
<script>
    function itemSelected() {
        var selected = $("input[type='radio']:checked");
        if (selected && selected.length) {
            var index = selected.val();
            insertVue.name = items[index].name;
            insertVue.phone = items[index].phone;
            insertVue.pca = items[index].pca;
            insertVue.street = items[index].street;
        }
    }
    document.addEventListener('DOMContentLoaded', function () {
        document.body.style.display = 'block';
    });
</script>
</body>
</html>