@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <p>Login Page</p>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <br><div class="hr"><hr /></div><br>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="textareaClass">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" name="email" value="{{ old('email') }}">
                                <br>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" name="password">
                                <br>
                                @if ($errors->has('password'))
                                    <span class="textareaClass">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <input type="checkbox" class="input-assumpte" id="input-confidencial">
                                    <label for="input-confidencial" class="tag">Remember me</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                <br>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('aside')
    <div class="imageDiv">
        <input id="loginImage" type="image" src="{{ asset("images/20.png") }}">
    </div>
@endsection
