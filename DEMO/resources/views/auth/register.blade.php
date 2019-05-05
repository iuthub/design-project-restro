@extends('layouts.app')

@section('content')
  <div class="card" style="position:absolute; top:50%;left:50%; transform: translate(-50%,-50%)">
    <div class="card-header" style="background: #FD6D24; color: #fff">{{ __('Register') }}</div>
    <div class="card-body">
      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <div class="col-md-12">
            <input id="name" placeholder="Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <div class="col-md-6">
            <input id="phone" placeholder="Phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>
            @if ($errors->has('phone'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
              </span>
            @endif
          </div>
          <div class="col-md-6">
            <input id="email" placeholder="Email address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
              @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-6">
            <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
          <div class="col-md-6">
            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-12">
            <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="avatar" name="avatar">
              <label class="custom-file-label" for="customFile">Choose image file</label>
            </div>
            <!-- <input id="avatar" style="display: " type="file" class="form-control" name="avatar"> -->
          </div>
        </div>

        <div class="form-group row" style="position:relative; margin-top: 35px;">
            <div class="" style="position:absolute; top:60%;left:50%; transform: translate(-50%,-50%)">
                <button type="submit" class="btn" style="background: #FD6D24; color: #fff">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
      </form>
    </div>
  </div>
@endsection
