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
                                  @else
                                      「 微云谈河汉，疏雨滴梧桐。 」
                                  @endif
                              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m12 l6 push-l3" style="margin-top: 16px;">
                <div class="row">
                    <form class="col s12" action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">email</i>
                                <input id="email" name="email" type="email" class="validate" autocomplete="off" value="{{ old('email') }}">
                                <label for="email">邮箱</label>
                            </div>
                        </div>
                        <div class="row center">
                            <div class="input-field col s12">
                                <button class="btn waves-effect blue accent-1" type="submit" name="action">
                                    <i class="material-icons right">send</i>发送密码重置链接
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
    @if (session('status'))
        Materialize.toast('{{ session('status') }}', 3000)
    @endif
@endsection

