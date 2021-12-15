@extends('home.home')

@section('content')
    <div class="row container" style="margin-top: 26px;">
        <div class="col s12 m12">
            <div class="row">
                <div class="col s12 m12">
                    <h4>关于:</h4>
                    <blockquote>我从不相信什么懒洋洋的自由，我向往的自由是通过勤奋和努力实现更广阔的人生，那样的自由才是珍贵的、有价值的。我相信一万小时定律，我从来不相信天上掉馅饼的灵感和坐等的成就。做一个自由又自律的人，靠势必实现的决心认真地活着。</blockquote>
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
                                        <a href="#">个人首页</a>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">Github</div>
                                        <a href="#">个人首页</a>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">Coding</div>
                                        <a href="#">个人首页</a>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">Laravel-China</div>
                                        <a href="#">个人首页</a>
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
                                        <div class="chip">基本信息</div> XXX
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">工作年限</div> {{ floor((time() - strtotime('2015-03-01'))/86400/360) }}年
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">学历</div> XXX
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">职位</div> XXX
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">城市</div> XXX
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
                                        <div class="chip">2015/03 ≈ 2015/08</div> 个人学习 &nbsp;<div class="chip">参与开发和维护:</div>
                                        <div class="valign-wrapper">
                                            <div class="card-panel blue accent-1 center" style="width: 260px;">
                                              <span class="white-text">
                                                  仿乐视手机商城
                                              </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">2015/08 ≈ 至今</div> XXX有限公司 &nbsp;<div class="chip">参与开发和维护:</div>
                                        <div class="valign-wrapper">
                                            <div class="card-panel blue accent-1 center" style="width: 260px;">
                                              <span class="white-text">
                                                  XXXXXX系统
                                              </span>
                                            </div>
                                            <div class="card-panel blue accent-1 center" style="width: 260px; margin-left: 6px;">
                                              <span class="white-text">
                                                  XXX系统
                                              </span>
                                            </div>
                                            <div class="card-panel blue accent-1 center" style="width: 260px; margin-left: 6px;">
                                              <span class="white-text">
                                                  XXX系统
                                              </span>
                                            </div>
                                            <div class="card-panel blue accent-1 center" style="width: 260px; margin-left: 6px;">
                                              <span class="white-text">
                                                  XXX系统
                                              </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="chip">2015/03 ≈ 至今</div> 个人开发项目 &nbsp;<div class="chip">参与开发和维护:</div>
                                        <div class="valign-wrapper">
                                            <div class="card-panel blue accent-1 center" style="width: 260px;">
                                              <span class="white-text">
                                                  XXX企业站
                                              </span>
                                            </div>
                                            <div class="card-panel blue accent-1 center" style="width: 260px; margin-left: 6px;">
                                              <span class="white-text">
                                                  XXX
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
                                        <div class="progress tooltipped" style="height: 8px;" data-position="top" data-delay="50" data-tooltip="80%">
                                            <div class="determinate red accent-1" style="width: 80%;"></div>
                                        </div>
                                    </li>
                                    <li class="collection-item valign-wrapper">
                                        <div class="chip center" style="width: 82px;">Laravel</div>
                                        <div class="progress tooltipped" style="height: 8px;" data-position="top" data-delay="50" data-tooltip="75%">
                                            <div class="determinate red accent-1" style="width: 75%;"></div>
                                        </div>
                                    </li>
                                    <li class="collection-item valign-wrapper">
                                        <div class="chip center" style="width: 82px;">Linux</div>
                                        <div class="progress tooltipped" style="height: 8px;" data-position="top" data-delay="50" data-tooltip="65%">
                                            <div class="determinate red accent-1" style="width: 65%;"></div>
                                        </div>
                                    </li>
                                    <li class="collection-item valign-wrapper">
                                        <div class="chip center" style="width: 82px;">Vuejs</div>
                                        <div class="progress tooltipped" style="height: 8px;" data-position="top" data-delay="50" data-tooltip="70%">
                                            <div class="determinate red accent-1" style="width: 70%;"></div>
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