@extends('layouts.dashboard')

@section('body')
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>{{ __('dashboard.title') }}</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">

            <p class="login-box-msg">Sign in to start your session</p>

            {!! Form::open(['route' => ['login'], 'method' => 'post', 'class' => 'form-group has-feedback']) !!}

            <div class="form-group has-feedback">
                {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'autocomplete' => 'off', 'required']) }}
            </div>
            <div class="form-group has-feedback">
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'autocomplete' => 'off', 'required']) }}
            </div>

            @if($errors->has('username'))
                <div class="callout callout-danger">
                    {{ $errors->first('username') }}
                </div>
            @endif

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false"
                                 style="position: relative;">
                                {{ Form::checkbox('remember', false, ['hidden']) }}
                                <ins class="iCheck-helper"
                                     style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                            </div>
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    {!! Form::button('Sign In', ['class' => 'btn btn-primary btn-block btn-flat', 'type' => 'submit']) !!}
                </div>
                <!-- /.col -->
            </div>

        {!! Form::close() !!}

        <!-- /.social-auth-links -->

            <a href="#">I forgot my password</a><br>
            <a href="#" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    </body>
@endsection

@section('js')
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
@endsection