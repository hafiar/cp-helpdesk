@extends('layouts.auth')
@section('content')

<div class="text-center my-4">
    <img src="/img/cp-removebg-preview.png" alt="centrepark" width="200" height="180">
</div>

<div class="row justify-content-center">
    <div class="col-md-6 col-sm-8 col-10">
        <div class="card mx-4">
            <div class="card-body p-4">
                <!--Teks Bagian Login-->
                <h4 class="text-center"><strong>{{ trans('Reporting System') }}</strong></h4>
                <marquee behavior="scroll" direction="center" scrollamount="10">
                    <p class="text-bold">{{ trans('Welcome! Please Login To Continue To Next Page.') }}</p>
                </marquee>

                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            {{ trans('global.login') }}
                        </button>
                    </div>
                     
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
