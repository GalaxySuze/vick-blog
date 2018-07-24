<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="images/x-icon" href="{{ asset('icon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Vick`Blog @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">
    <link rel="stylesheet" href="{{ asset('editormd/css/editormd.min.css') }}">

    <style>
        body {
            background-color: #f5f8fa;
        }

        .layui-table th {
            text-align: center;
        }

        .layui-laypage-limits select {
            color: #009688;
        }

        .layui-table thead tr {
            background: #393D49;
            color: #fff;
        }
    </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo layui-bg-orange layui-anim layui-anim-scale">Vick ` Blog Admin</div>
        <ul class="layui-nav layui-layout-left" style="font-size: 20px;">
            <li class="layui-nav-item">
                <a href="{{ url('backstage/dashboard') }}">
                    <i class="layui-icon layui-icon-home"></i> 主页
                </a>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="#">
                    <i class="layui-icon layui-icon-notice" style="font-size: 20px;"></i><span
                            class="layui-badge-dot layui-bg-red"></span>
                </a>
            </li>
            <li class="layui-nav-item">
                <a href="#">
                    <img src="{{ asset('icon.png') }}" class="layui-nav-img">
                    Vick
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">退出</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                @inject('BuildNav', 'App\Services\NavigationServices\BackstageNavService')
                @foreach($BuildNav->setNav() as $navTitle => $navInfo)
                    <li class="layui-nav-item {{ $navTitle=='文章管理' ? 'layui-nav-itemed' : '' }}">
                        <a href="{{ isset($navInfo['subNav']) ? '#' : $navInfo['navItemRoute'] }}">
                            <i class="layui-icon {{ $navInfo['icon'] }}" style="color: {{ $navInfo['color'] }};"></i>&nbsp;
                            {{ $navTitle }}
                        </a>
                        @if(isset($navInfo['subNav']))
                            <dl class="layui-nav-child" style="text-align: center;">
                                @foreach($navInfo['subNav'] as $navName => $nav)
                                    <dd>
                                        <a href="{{ $nav['navChildRoute'] ?? $nav }}">{{ $nav['name'] }}</a>
                                    </dd>
                                @endforeach
                            </dl>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <div class="layui-row layui-col-space15" style="padding: 20px;">
            <div class="layui-col-md12">
                <fieldset class="layui-elem-field layui-field-title">
                    <legend style="font-size: 15px;">主页 / 文章管理 / 文章中心</legend>
                </fieldset>
            </div>
            @section('main')
                <div class="layui-col-md12">
                    <div class="layui-row layui-col-space15">
                        <div class="layui-col-md3">
                            <div class="layui-card layui-anim layui-anim-scale" style="text-align: center;">
                                <div class="layui-card-header">
                                    <i class="layui-icon layui-icon-edit" style="font-size: 42px;color: #5FB878"></i>
                                </div>
                                <div class="layui-card-body">
                                    <h4>这周文章数：10</h4>
                                </div>
                            </div>
                        </div>
                        <div class="layui-col-md3">
                            <div class="layui-card layui-anim layui-anim-scale" style="text-align: center">
                                <div class="layui-card-header">
                                    <i class="layui-icon layui-icon-flag" style="font-size: 42px;color: #1E9FFF"></i>
                                </div>
                                <div class="layui-card-body">
                                    <h4>未发布文章数：10</h4>
                                </div>
                            </div>
                        </div>
                        <div class="layui-col-md3">
                            <div class="layui-card layui-anim layui-anim-scale" style="text-align: center">
                                <div class="layui-card-header">
                                    <i class="layui-icon layui-icon-reply-fill"
                                       style="font-size: 42px;color: #FFB800"></i>
                                </div>
                                <div class="layui-card-body">
                                    <h4>这周新增评论数：10</h4>
                                </div>
                            </div>
                        </div>
                        <div class="layui-col-md3">
                            <div class="layui-card layui-anim layui-anim-scale" style="text-align: center">
                                <div class="layui-card-header">
                                    <i class="layui-icon layui-icon-fire" style="font-size: 42px;color: #FF5722"></i>
                                </div>
                                <div class="layui-card-body">
                                    <h4>今日文章浏览量：10</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-col-md12">
                    <blockquote class="layui-elem-quote" style="border-left-color: #FFB800;">光阴似箭：</blockquote>
                </div>
                <div class="layui-col-md9">
                    <ul class="layui-timeline">
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                            <div class="layui-timeline-content layui-text">
                                <h3 class="layui-timeline-title">8月18日</h3>
                                <p>
                                    layui 2.0 的一切准备工作似乎都已到位。发布之弦，一触即发。
                                    <br>不枉近百个日日夜夜与之为伴。因小而大，因弱而强。
                                    <br>无论它能走多远，抑或如何支撑？至少我曾倾注全心，无怨无悔 <i class="layui-icon"></i>
                                </p>
                            </div>
                        </li>
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                            <div class="layui-timeline-content layui-text">
                                <h3 class="layui-timeline-title">8月16日</h3>
                                <p>杜甫的思想核心是儒家的仁政思想，他有“<em>致君尧舜上，再使风俗淳</em>”的宏伟抱负。个人最爱的名篇有：</p>
                                <ul>
                                    <li>《登高》</li>
                                    <li>《茅屋为秋风所破歌》</li>
                                </ul>
                            </div>
                        </li>
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                            <div class="layui-timeline-content layui-text">
                                <h3 class="layui-timeline-title">8月15日</h3>
                                <p>
                                    中国人民抗日战争胜利72周年
                                    <br>常常在想，尽管对这个国家有这样那样的抱怨，但我们的确生在了最好的时代
                                    <br>铭记、感恩
                                    <br>所有为中华民族浴血奋战的英雄将士
                                    <br>永垂不朽
                                </p>
                            </div>
                        </li>
                        <li class="layui-timeline-item">
                            <i class="layui-icon layui-timeline-axis">&#xe63f;</i>
                            <div class="layui-timeline-content layui-text">
                                <div class="layui-timeline-title">过去</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="layui-col-md3">
                    <div class="layui-collapse" lay-accordion>
                        <div class="layui-colla-item">
                            <h2 class="layui-colla-title"><i class="layui-icon layui-icon-form"
                                                             style="color: #FF5722"></i> ToDo List</h2>
                            <div class="layui-colla-content layui-show">
                                <ul>
                                    <li>*《登高》</li>
                                    <li>*《茅屋为秋风所破歌》</li>
                                </ul>
                            </div>
                        </div>
                        <div class="layui-colla-item">
                            <h2 class="layui-colla-title"><i class="layui-icon layui-icon-survey"
                                                             style="color: #FF5722"></i> 备忘录</h2>
                            <div class="layui-colla-content layui-show">内容区域</div>
                        </div>
                        <div class="layui-colla-item">
                            <h2 class="layui-colla-title"><i class="layui-icon layui-icon-snowflake"
                                                             style="color: #FF5722"></i> 今天天气</h2>
                            <div class="layui-colla-content layui-show">内容区域</div>
                        </div>
                    </div>
                </div>
            @show
        </div>
    </div>

    <div class="layui-footer">
        <center>© Vick ` Blog - 「 指落惊风雨，码成泣鬼神 」</center>
    </div>
</div>
<!-- JS -->
<script src="{{ asset('layui/layui.js') }}"></script>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="{{ asset('editormd/js/editormd.js') }}"></script>
<script type="text/javascript">
    layui.use(['element', 'carousel', 'form', 'laydate', 'upload', 'jquery', 'table'], function () {
        var element = layui.element,
            carousel = layui.carousel,
            form = layui.form,
            upload = layui.upload,
            layuiDate = layui.laydate,
            table = layui.table,
            $ = layui.$;

        var interfaceEXMsg = '接口请求异常，请打开debug，通过浏览器调试工具查看错误信息!';
        var loadingMask = 'loading';

        // 在线markdown编辑器
        if ($('#editormdBox').length > 0) {
            var editorBox = editormd("editormdBox", {
                height: '500px',
                syncScrolling: "single",
                path: "{{ asset('editormd/lib/') }}/",
                pluginPath: "{{ asset('editormd/pluginPath/') }}/"
            });
        }

        layuiDate.render({
            elem: '#release_time'
        });

        @if(!empty(session('msg')))
            layer.msg('{{ session('msg') }}');
        @endif

        function submitAjax(type, url, data, tableRow) {
            layer.load(1);
            $.ajax({
                type: type,
                url: url,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (result) {
                    layer.closeAll(loadingMask);
                    if (result.code !== 0) {
                        var warning = result.msg ? result.msg : result;
                        layer.open({
                            content: warning
                        });
                    } else {
                        if (tableRow) {
                            tableRow.del();
                        }
                        if (result.msg === '删除图片成功!') {
                            delImgDone();
                            layer.msg(result.msg);
                        } else {
                            window.location.href = result.data;
                        }
                    }
                },
                error: function (e) {
                    layer.closeAll(loadingMask);
                    layer.alert(errMsg(e), {
                        icon: 2,
                        skin: 'layui-layer-lan',
                        anim: 6,
                        closeBtn: 0
                    });
                }
            });
            return false;
        }

        function errMsg(ajaxErrResult) {
            var errMsgStr = '';
            $.each(ajaxErrResult.responseJSON.errors, function (k, v) {
                for (var i = 0; i < v.length; i++) {
                    errMsgStr += v[i] + '<br/>';
                }
            });
            if (!errMsgStr) {
                return interfaceEXMsg;
            }
            return errMsgStr;
        }

        function showUploadImgBox(boxId) {
            layer.photos({
                photos: boxId,
                anim: 5
            });
        }
        showUploadImgBox('.uploadImageAlbum');

        //监听工具条
        table.on('tool(listTable)', function (obj) {
            var row = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）

            if (layEvent === 'del') {
                layer.confirm('是否确认删除!', function (index) {
                    submitAjax('get', row.delRoute, row.id, obj);
                });
            } else if (layEvent === 'edit') { //编辑
                window.location.href = row.editRoute;
            }

        });

        @yield('scriptMain')
    });
</script>
</body>
</html>