@extends('..layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('pagetitle')
<h2 class="header__pagetitle">Confirm</h2>
@endsection

@section('content')
<!-- 表部分 -->
<form action="/thanks" method="post">
  @csrf
  <input type="hidden" name="category_id" value="{{$contact['category_id']}}" />
  <input type="hidden" name="first_name" value="{{$contact['first_name']}}" />
  <input type="hidden" name="last_name" value="{{$contact['last_name']}}" />
  <input type="hidden" name="gender" value="{{$contact['gender']}}" />
  <input type="hidden" name="email" value="{{$contact['email']}}" />
  <input type="hidden" name="tel" value="{{$contact['tel1']}}-{{$contact['tel2']}}-{{$contact['tel3']}}" />
  <input type="hidden" name="tel1" value="{{$contact['tel1']}}" />
  <input type="hidden" name="tel2" value="{{$contact['tel2']}}" />
  <input type="hidden" name="tel3" value="{{$contact['tel3']}}" />
  <input type="hidden" name="address" value="{{$contact['address']}}" />
  <input type="hidden" name="building" value="{{$contact['building']}}" />
  <input type="hidden" name="detail" value="{{$contact['detail']}}" />

<table class="attendance-table__inner">
  <tr class="attendance-table__row">
    <th class="attendance-table__header">名前</th>
    <td class="attendance-table__item">{{$contact['last_name']}}  {{$contact['first_name']}}</td>
  </tr>
  <tr class="attendance-table__row">
    <th class="attendance-table__header">性別</th>
    <td class="attendance-table__item">{{$gender_name}}</td>
  </tr>
  <tr class="attendance-table__row">
    <th class="attendance-table__header">メールアドレス</th>
    <td class="attendance-table__item">{{$contact['email']}}</td>
  </tr>
  <tr class="attendance-table__row">
    <th class="attendance-table__header">電話番号</th>
    <td class="attendance-table__item">{{$contact['tel1']}}-{{$contact['tel2']}}-{{$contact['tel3']}}</td>
  </tr>
  <tr class="attendance-table__row">
    <th class="attendance-table__header">住所</th>
    <td class="attendance-table__item">{{$contact['address']}}</td>
  </tr>
  <tr class="attendance-table__row">
    <th class="attendance-table__header">建物名</th>
    <td class="attendance-table__item">{{$contact['building']}}</td>
  </tr>
  <tr class="attendance-table__row">
    <th class="attendance-table__header">お問い合わせの種類</th>
    <td class="attendance-table__item">{{$category['content']}}</td>
  </tr>
  <tr class="attendance-table__row">
    <th class="attendance-table__header">お問い合わせ内容</th>
    <td class="attendance-table__item">{{$contact['detail']}}</td>
  </tr>
</table>
<div class="button">
<button class="submit-button" name="submit">送信</button>
<button class="fix-button" type="submit" name="fix">修正</button>
</div>
</form>
@endsection
