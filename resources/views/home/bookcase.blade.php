@extends('home.home')

@section('content')
    <div class="container section">
        <div class="col s12 m12 white">
            <div class="carousel">
                <a class="carousel-item" href="#one!"><img src="http://img3m5.ddimg.cn/15/34/23628345-1_w_1.jpg"></a>
                <a class="carousel-item" href="#two!"><img src="http://img3m1.ddimg.cn/51/21/23800641-1_w_2.jpg"></a>
                <a class="carousel-item" href="#three!"><img src="http://img3m6.ddimg.cn/32/10/25180286-1_w_3.jpg"></a>
                <a class="carousel-item" href="#four!"><img src="http://img3m3.ddimg.cn/2/21/22628333-1_w_2.jpg"></a>
                <a class="carousel-item" href="#five!"><img src="http://img3m2.ddimg.cn/80/32/24037082-1_w_2.jpg"></a>
            </div>
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i> Vuejs</div>
                    <div class="collapsible-body">
                        <div class="row">
                            <div class="col s12 m2">
                                <div style="background: url('http://img3m5.ddimg.cn/15/34/23628345-1_w_1.jpg'); background-size: cover;background-repeat: no-repeat;width: 200px;height: 200px;">
                                </div>
                            </div>
                            <div class="col s12 m10">
                                人的一生，其实就是一场自己对自己的战争。
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>二</div>
                    <div class="collapsible-body"><p>人的一生，其实就是一场自己对自己的战争。</p></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>三</div>
                    <div class="collapsible-body"><p>人的一生，其实就是一场自己对自己的战争。</p></div>
                </li>
            </ul>
        </div>
    </div>
@endsection