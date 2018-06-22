@extends('home.home')

@section('content')
    <!-- 目录 -->
    <div class="hide-on-med-and-down" id="catalog">
        <ul class="section table-of-contents">
            <li><a href="#a">介绍</a></li>
            <li><a href="#b">结构</a></li>
            <li><a href="#c">初始化</a></li>
        </ul>
    </div>
    <div class="section">
        <div class="row">
            <div class="container center-align">
                <!-- 分类和标题 -->
                <div class="col s12 m12">
                    <div class="section">
                        <div class="chip tooltipped" data-position="top" data-delay="50" data-tooltip="点击查看标签">
                            <img src="{{ asset('img/icon/python.png') }}" class="responsive-img" alt="PHP" >Python
                        </div>
                        <div class="chip tooltipped" data-position="top" data-delay="50" data-tooltip="点击查看标签">
                            <img src="{{ asset('img/icon/laravel.png') }}" class="responsive-img" alt="PHP" >Laravel
                        </div>
                        <div class="chip tooltipped" data-position="top" data-delay="50" data-tooltip="点击查看标签">
                            <img src="{{ asset('img/icon/nginx.png') }}" class="responsive-img" alt="PHP" >Nginx
                        </div>
                        <div class="flow-text">
                            <h4>一季年华，渐渐消逝。一度夕阳，望见曾经。一座青山，承载时光。一纸文字，柔情缱绻。一片风景，天上人间。</h4>
                        </div>
                    </div>
                </div>

                <!-- 文章信息 -->
                <div class="col s12 m12">
                    <div class="valign-wrapper" style="color: #757575; font-size: 0.5rem; display: -webkit-inline-flex; display: inline-flex;">
                        <i class="material-icons red-text">assignment_ind</i>&nbsp; Vick &nbsp;&nbsp;
                        <i class="material-icons yellow-text">visibility</i>&nbsp; 80 &nbsp;&nbsp;
                        <i class="material-icons green-text">thumb_up</i>&nbsp; 66 &nbsp;&nbsp;
                        <i class="material-icons blue-text slide-comments-btn tooltipped" data-activates="slide-comments" data-position="bottom" data-delay="50" data-tooltip="点击查看评论区">textsms</i>&nbsp; 22 &nbsp;&nbsp;
                        <i class="material-icons pink-text">schedule</i>&nbsp; 2017-09-09
                    </div>
                </div>

                <!-- 分割线 -->
                <div class="col s12 m12">
                    <hr class="grey darken-1" style="height: 2px; border: none;">
                </div>

                <!-- 文章 -->
                <div class="col s12 m12">
                    <div class="section flow-text">
                        <pre>
            一季年华，渐渐消逝。一度夕阳，望见曾经。一座青山，承载时光。一纸文字，柔情缱绻。一片风景，天上人间。

　　——题记

　　<span id="a" class="scrollspy">青山依旧【旧】</span>

　　夕阳西下，青山依旧，来到老家的门前，如此，山离我很近，夕阳离我很远。青草葱葱，似时光葱葱，野花绽放，如记忆中承载的笑靥如花。

　　还记得那年，房后的核桃树，结满了果实，我们一起去摘，用石头砸碎，吃嫩嫩的核仁，染了双手绿，无法洗去贪吃的痕迹。

　　还记得那天，漆黑的夜里，我们玩捉迷藏，你躲我藏，我躲你藏，玩得不亦乐乎，都忘了回家吃饭，最后一身泥土的回去了，家人亦是无语。

　　还记得那年，秋千拴在槐花树之间，我们荡来荡去，如风中飘飞的树叶，自由自在，好想就那样永远的悠哉着，淹没时光的秘密。

　　还记得那天，我们将游戏一一检阅，玩着玩着，忘了疲惫，忘了自己，忘了别人，忘了从前，忘了以后，也忘了现在，那样的单纯，那样的美丽。

　　还记得那年，还记得那天，只是时光匆匆流逝，我们再也回不去了。流年童真，芬芳弥漫，犹如，映日荷花别样红，亦如，水光潋滟晴方好。

　　青山依旧，绿水长流，望着老屋房后的青山，忽然觉得时光穿梭到了那年，那天，你我还是小小的模样，跑来跑去，淡淡的清香。

　　<span id="b" class="scrollspy">素年锦时【时】</span>

　　青春的面庞，素颜的我们，清水出芙蓉，天然去雕饰。你的俊俏，她的清秀，你的帅气，她的温柔，年轻的心，总是那样雀跃，年轻的心，总是那样美丽。

　　那年花季，漫步在雨中，感受着初春的温润的气息，躺在草地里，感受着夏日的烈日的分别，登高在山上，感受着初秋的成熟的脉搏，嬉戏在雪里，感受着冬日的浪漫。

　　那年雨季，你爱上了一个人，你结交了知心朋友，你有了自己的秘密花园，你有了自己不能言说的秘密，温暖，也悲伤，你有了值得一生相伴的他们，相亲相爱，也相互争吵。

　　那年的朋友，我们无话不说，那年的朋友，我们相互理解，那年的朋友，我们珍藏心中，那年的朋友，我们携手走过，那年的朋友，我们共同渡过。

　　流水落花，素年已经远去了，锦时的记忆友谊还留在心间，只是曾经远了，回忆深了，时间紧了，友谊深了，却还是习惯了，掩饰自己的伤，因为成熟了。

　　那时的朋友，会说，我变了，文字中的我总是淡淡的忧伤，而不是昔日的言笑晏晏。其实，我还是那时的我，和那时的朋友在一起，依然会一如当初的快乐。

　　那时的朋友，会说，我不看你的文字，文绉绉的，悲伤，哲理，真看不懂。我说，不用看，不用看，看我就行了。一笑而过。

　　其实，我还是希望他们来看一看，心里会欣慰，却不希望他们懂得，因为悲伤是一种生活的沧桑沉淀，我耽溺于此，却不希望他们如此，而是衷心希望他们过得安好。

　　素年锦时，相逢是首歌，再见，不曾说出口，因为懂得，家乡始终是我们相聚的港湾，如此，流浪远方，我们也不会觉得别离。

　　<span id="c" class="scrollspy">旖旎风光【光】</span>

　　光辉岁月，软丈红尘，相聚，离别，已经成了一个古老而又新鲜的故事，在岁月的沉淀中跳跃，又在跳跃的时光中沉淀，绽放婉转流离的美。

　　枯藤老树昏鸦，背井离乡的秋日，小桥流水人家，古典的意韵风光，古道西风瘦马，流浪在外的他乡客。如此，岁月沧桑流，风景旧曾谙，夕阳西下，断肠人在天涯。

　　那年的奖状，还在书里夹着，那年的风光，还在不远曾经，那年的喜悦，还在心中残留，那年的他们，还在为你祝贺，那年的温暖，还在心间流淌。

　　也许，无论是曾经的深深落泪，还是曾经的人海嬉笑，都是最唯美的旧时光，那是无可替代的回忆，今生属于自己的唯一。

　　或许，我们曾经失望，伤感，落泪，沮丧，寂寞，孤单，彷徨，落魄，流离，徘徊，呐喊，绝望，窒息，难过，忧郁，无奈，彳亍。

　　或许，我们曾经快乐，喜悦，开心，潇洒，美丽，温柔，大方，柔情，微笑，婷婷，漂亮，善良，开朗，幸福，安静，活泼，安好。

　　时过境迁，我们渐渐长大，不再如当初一般，一无所知。我们迈向了成熟的殿堂，历经风雨，见了彩虹，历经霜雪，闻见花香。

　　一纸素笺，写尽红尘悲欢离合。明媚笑靥，一如曾经般绚烂，只是，双眸多了一丝成熟的忧伤。一笔流伤，掩尽红尘风流沧桑。微笑如花，一如往昔般唯美，只是，泪水多了一缕心灵的触痛。

　　我依然，喜欢那年的我，那年的你，一如蓝色的天空般，永恒。当时明月在，曾照彩云归，旖旎风光，岁月深处的旧时光，永远。

　　后记：今天，去了旧时住的地方，待了一会。时光，经不起流逝，岁月，经不起蹉跎，我们都在匆匆中，长大，成熟，老却了……
        </pre>
                    </div>
                </div>

                <!-- 图钉 -->
                <div class="fixed-action-btn horizontal left">
                    <a class="btn-floating btn-large grey">
                        <i class="large material-icons">menu</i>
                    </a>
                    <ul>
                        <li>
                            <a href="#" class="btn-floating red slide-comments-btn" data-activates="slide-comments">
                                <i class="material-icons">textsms</i>
                            </a>
                        </li>
                        <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                        <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                        <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                    </ul>
                </div>

                <!-- 评论功能 -->
                <ul id="slide-comments" class="side-nav">
                    <li>
                        <div class="userView">
                            <span class="white-text email" style="padding-bottom: 8%; font-size: 24px;">评论区</span>
                            <div class="background">
                                <img src="{{ asset('img/c5.jpg') }}">
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="container">
                            <div class="row">
                                <form class="col s12 m12" action="" method="post">
                                    <input placeholder="昵称(必填)" id="name" type="text">
                                    <input placeholder="邮箱(必填,不会被公开)" id="email" type="email" class="validate">
                                    <textarea placeholder="评论" id="textarea" class="materialize-textarea"></textarea>
                                    <button type="button" class="red accent-1 waves-effect waves-light btn">提交</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li><div class="divider"></div></li>
                    <li>
                        <b>评论总数：12</b>
                    </li>
                    <li>
                        <div class="card lighten-4 hoverable">
                            <div class="card-content grey lighten-5">
                                <span class="card-title"><b>Jack</b></span>
                                <p>我是一个很简单的卡片。我很擅长于包含少量的信息。我很方便，因为我只需要一个小标记就可以有效地使用。</p>
                            </div>
                            <div class="card-action" style="padding: 0;">
                                #1 · 一周前 · <a href="#" style="display: inline;padding: 0">回复</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card lighten-4 hoverable">
                            <div class="card-content grey lighten-5">
                                <span class="card-title"><b>Rose</b></span>
                                <p>
                                    <a href="#" style="display: inline;padding: 0">@Jack</a>
                                    这个评论功能将呈现十分美妙的效果。敬请期待哟~
                                </p>
                            </div>
                            <div class="card-action" style="padding: 0;">
                                #1 · 一周前 · <a href="#" style="display: inline;padding: 0">回复</a>
                            </div>
                        </div>
                    </li>
                </ul>

                <!-- 分割线 -->
                <div class="col s12 m12">
                    <hr class="grey darken-1" style="height: 2px; border: none;">
                </div>

                <!-- 分享和附言 -->
                <div class="col s12 m12">
                    <blockquote class="valign-wrapper">
                        <i class="large material-icons" style="font-size: 25px;">info_outline</i>
                        <i class="large material-icons" style="font-size: 25px;">language</i>
                        <i class="large material-icons" style="font-size: 25px;">query_builder</i>
                        <i class="large material-icons" style="font-size: 25px;">settings_input_svideo</i>
                        <i class="large material-icons" style="font-size: 25px;">swap_vertical_circle</i>
                        <i class="large material-icons" style="font-size: 25px;">offline_pin</i>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#navbar-div">P.S 点击标题下面的留言图标打开评论区~</a>
                    </blockquote>
                </div>
            </div>

        </div>
    </div>
@endsection