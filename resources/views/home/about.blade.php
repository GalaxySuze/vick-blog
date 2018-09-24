@extends('home.home')

@section('content')
    <div class="row container" style="margin-top: 26px;">
        <div class="col s12 m12">
            <div class="row">
                <div class="col s12 m12">
                    <h4>关于:</h4>
                    <blockquote>90后，PHP程序员。目前居住于上海。</blockquote>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m2 hide-on-med-and-down">
                    <div style="width: 180px; height: 560px;background: url('{{ asset('img/c5.jpg') }}');background-size: cover;background-position: 30% 0" class="z-depth-2">
                    </div>
                </div>
                <div class="col s12 m9">
                    <ul class="collapsible popout" data-collapsible="accordion">
                        <li>
                            <div class="collapsible-header active">
                                <i class="material-icons">perm_phone_msg</i>联系方式
                            </div>
                            <div class="collapsible-body">
                                <ul class="collection">
                                    <li class="collection-item">
                                        <div class="chip">Email</div> 1577972852@qq.com
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">QQ</div> 1577972852
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">微博</div>
                                        <a href="https://weibo.com/p/1005053213010731/home?from=page_100505&mod=TAB&is_all=1#place">个人首页</a>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">Github</div>
                                        <a href="https://github.com/GalaxySuze">个人首页</a>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">Coding</div>
                                        <a href="https://coding.net/u/VickStar">个人首页</a>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">Laravel-China</div>
                                        <a href="https://laravel-china.org/code-is-make-the-gods-cry">个人首页</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header">
                                <i class="material-icons">perm_contact_calendar</i>个人信息
                            </div>
                            <div class="collapsible-body">
                                <ul class="collection">
                                    <li class="collection-item">
                                        <div class="chip">基本信息</div> 张伟康/男/1994
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">工作年限</div> {{ floor((time() - strtotime('2015-03-01'))/86400/360) }}年
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">期望职位</div> PHP高级开发
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">期望城市</div> 上海/杭州
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header">
                                <i class="material-icons">assignment</i>工作经历
                            </div>
                            <div class="collapsible-body">
                                <ul class="collection">
                                    <li class="collection-item">
                                        <div class="chip">2015/03 ≈ 2015/08</div> 培训机构 <div class="chip">参与开发和维护:</div>
                                        <div class="valign-wrapper">
                                            <div class="card-panel blue accent-1 center" style="width: 260px;">
                                              <span class="white-text">
                                                  仿乐视手机商城
                                              </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">2015/08 ≈ 至今</div> 上海迈创智慧供应链有限公司 <div class="chip">参与开发和维护:</div>
                                        <div class="valign-wrapper">
                                            <div class="card-panel blue accent-1 center" style="width: 260px;">
                                              <span class="white-text">
                                                  联想手机海外售后服务系统
                                              </span>
                                            </div>
                                            <div class="card-panel blue accent-1 center" style="width: 260px; margin-left: 6px;">
                                              <span class="white-text">
                                                  小米手机售后维修系统
                                              </span>
                                            </div>
                                            <div class="card-panel blue accent-1 center" style="width: 260px; margin-left: 6px;">
                                              <span class="white-text">
                                                  小米手机售后计划系统
                                              </span>
                                            </div>
                                            <div class="card-panel blue accent-1 center" style="width: 260px; margin-left: 6px;">
                                              <span class="white-text">
                                                  上海通用汽车ASCM系统
                                              </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">2015/03 ≈ 至今</div> 个人开发项目 <div class="chip">参与开发和维护:</div>
                                        <div class="valign-wrapper">
                                            <div class="card-panel blue accent-1 center" style="width: 260px;">
                                              <span class="white-text">
                                                  福建亿利环境技术企业站
                                              </span>
                                            </div>
                                            <div class="card-panel blue accent-1 center" style="width: 260px; margin-left: 6px;">
                                              <span class="white-text">
                                                  Vick ` Blog
                                              </span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header">
                                <i class="material-icons">work</i>技能清单
                            </div>
                            <div class="collapsible-body">
                                <ul class="collection">
                                    <li class="collection-item valign-wrapper">
                                        <div class="chip center" style="width: 82px;">PHP</div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="determinate red accent-1" style="width: 80%;"></div>
                                        </div>
                                    </li>
                                    <li class="collection-item valign-wrapper">
                                        <div class="chip center" style="width: 82px;">Laravel</div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="determinate red accent-1" style="width: 75%;"></div>
                                        </div>
                                    </li>
                                    <li class="collection-item valign-wrapper">
                                        <div class="chip center" style="width: 82px;">Linux</div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="determinate red accent-1" style="width: 65%;"></div>
                                        </div>
                                    </li>
                                    <li class="collection-item valign-wrapper">
                                        <div class="chip center" style="width: 82px;">Vuejs</div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="determinate red accent-1" style="width: 80%;"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection