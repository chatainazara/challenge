@extends('..layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('link')
    <a class="login__button-submit" href="/login">Login</a>
@endsection

@section('content')
<div class="register-form__content">
  <div class="register-form__heading">
    <h2>Register</h2>
  </div>
  <form class="form" action="/register" method="post" novalidate>
  @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="name" value="{{ old('name') }}" />
        </div>
        @if($errors->has('name'))
        <div class="form__error">
          <div>{{$errors->first('name')}}</div>
        </div>
        @endif
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" value="{{ old('email') }}" />
        </div>
        <div class="form__error">
        @if($errors->has('email'))
        <div class="form__error">
          <div>{{$errors->first('email')}}</div>
        </div>
        @endif
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">パスワード</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="password" name="password" />
        </div>
        <div class="form__error">
        @if($errors->has('password'))
        <div class="form__error">
          <div>{{$errors->first('password')}}</div>
        </div>
        @endif
      </div>
    </div>
    <!-- <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">確認用パスワード</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="password" name="password_confirmation" />
        </div>
      </div>
    </div> -->
    <div class="form__button">
      <button class="form__button-submit" type="submit">登録</button>
    </div>
  </form>

</div>
@endsection
