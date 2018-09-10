@extends('home.home')

@section('body')
    <div class="container">
        <div class="row" style="margin: 5% auto;">
            <div class="col s12 m12 l12 center">
                <div class="col s12 m12 l6 push-l3">
                    <div class="card-panel blue-grey lighten-5 z-depth-1">
                        <div class="section valign-wrapper">
                            <div class="col s2">
                                <img src="{{ asset('img/cat.jpg') }}" alt="" class="circle responsive-img">
                            </div>
                            <div class="col s10">
                              <span class="black-text">
                                  @if ($errors->has('email'))
                                      <blockquote>
                                          <strong class="red-text">{{ $errors->first('email') }}</strong>
                                      </blockquote>
                                  @elseif ($errors->has('password'))
                                      <blockquote>
                                          <strong class="red-text">{{ $errors->first('password') }}</strong>
                                      </blockquote>
                                  @else
                                      「 闭门即是深山，读书随处净土。 」
                                  @endif
                              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l6 push-l3" style="margin-top: 16px;">
                <div class="row">
                    <form class="col s12" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="email" name="email" type="email" class="validate" autocomplete="off" value="{{ old('email') }}">
                                <label for="email">邮箱</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="password" name="password" type="text" class="validate" autocomplete="off">
                                <label for="password">密码</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m9 l9">
                                <i class="material-icons prefix">lock_open</i>
                                <input id="auth_code" type="text" class="validate" autocomplete="off">
                                <label for="auth_code">验证码</label>
                            </div>
                            <div class="input-field col s12 m3 l3">
                                <div style="width: 150px; height: 50px; border: 1px black solid; text-align: center; font-size: 30px;">7UOX</div>
                            </div>
                        </div>
                        <div class="row center">
                            <div class="input-field col s4">
                                <button class="btn waves-effect blue accent-1" type="submit" name="action">
                                    <i class="material-icons right">send</i>立即登录
                                </button>
                            </div>
                            <div class="input-field col s4">
                                <a href="{{ route('password.request') }}" class="btn waves-effect blue-grey" type="submit" name="action">
                                    <i class="material-icons right">ring_volume</i>忘记密码
                                </a>
                            </div>
                            <div class="input-field col s4">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">记住状态</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
