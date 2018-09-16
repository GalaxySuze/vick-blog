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
                                  @if ($errors->has('name'))
                                      <blockquote>
                                          <strong class="red-text">{{ $errors->first('name') }}</strong>
                                      </blockquote>
                                  @elseif ($errors->has('email'))
                                      <blockquote>
                                          <strong class="red-text">{{ $errors->first('email') }}</strong>
                                      </blockquote>
                                  @elseif ($errors->has('password'))
                                      <blockquote>
                                          <strong class="red-text">{{ $errors->first('password') }}</strong>
                                      </blockquote>
                                  @elseif ($errors->has('captcha'))
                                      <blockquote>
                                          <strong class="red-text">{{ $errors->first('captcha') }}</strong>
                                      </blockquote>
                                  @else
                                      「 醉后不知天在水，满船清梦压星河。 」
                                  @endif
                              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l6 push-l3" style="margin-top: 16px;">
                <div class="row">
                    <form class="col s12" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="name" name="name" type="text" class="validate" autocomplete="off" value="{{ old('name') }}">
                                <label for="name">名称</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" name="email" type="email" class="validate" autocomplete="off" value="{{ old('email') }}">
                                <label for="email">邮箱</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">vpn_key</i>
                                <input id="password" name="password" type="password" class="validate" autocomplete="off">
                                <label for="password">密码</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">done</i>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="validate" autocomplete="off">
                                <label for="password_confirmation">确认密码</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m8 l8">
                                <i class="material-icons prefix">lock_open</i>
                                <input id="captcha" name="captcha" type="text" class="validate" autocomplete="off">
                                <label for="captcha">验证码</label>
                            </div>
                            <div class="input-field col s12 m4 l4 center">
                                <img src="{{ captcha_src('flat') }}" class="z-depth-2" alt="验证码" onclick="this.src='/captcha/flat?'+Math.random()">
                            </div>
                        </div>
                        <div class="row center">
                            <div class="input-field col s12 m12 l12">
                                <button class="btn waves-effect blue accent-1" type="submit" name="action">
                                    <i class="material-icons right">send</i>注册
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptContent')
    Materialize.toast('欢迎注册 Vick ` Blog', 3000)
@endsection