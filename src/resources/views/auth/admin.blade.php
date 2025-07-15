@extends('..layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection


@if (Auth::check())

@section('link')
<div class="header__link">
  <form class="form" action="/logout" method="post">
  @csrf
    <button class="header-nav__button">Logout</button>
  </form>
</div>
@endsection

@section('pagetitle')
<h2 class="header__pagetitle">Admin</h2>
@endsection

@section('content')
<!-- 検索画面 -->
<form class="search" action="/admin" method="post">
  @csrf
  <input class="search__name" type="text" name="search" placeholder="名前やメールアドレスを入力してください" value="{{$searchitem['search']}}"/>
  <select class="search__gender" name="gender">
    <option value=""  {{$searchitem['find'] == '' ? 'selected' :''}} >性別</option>
    <option value=""  {{$searchitem['find'] == '検索' ? 'selected' :''}} >全て</option>
    <option value="1" {{$searchitem['gender'] == '1' ? 'selected' :''}} >男性</option>
    <option value="2" {{$searchitem['gender'] == '2' ? 'selected' :''}} >女性</option>
    <option value="3" {{$searchitem['gender'] == '3' ? 'selected' :''}} >その他</option>
  </select>
  <select class="search__category" name="category_id">
    @if(old('category_id')=="")
      <option value="">選択してください</option>
    @foreach($categories as $category)
      <option value="{{ $category['id'] }}" @if($searchitem['category_id']  == $category['id']) selected @endif>{{ $category['content'] }}</option>
    @endforeach
    @else
    @foreach($categories as $category)
      <option value="{{ $category['id'] }}" @if($searchitem['category_id'] == $category['id']) selected @endif>{{ $category['content'] }}</option>
    @endforeach
    @endif
  </select>
  <input class="search__date" type="date" name="date" value="{{$searchitem['date'] }}"/>
  <input class="search__button" type="submit" name="find" value="検索"/>
  <input class="search__reset" type="submit" name="reset" value="リセット"/>
</form>
<!-- 検索画面おわり -->

<!-- エクスポートとページネーション -->
<div class="utility">
<form class="utility__export" action="/csv-download" method="post">
@csrf
  <input type="hidden" name="search" value="{{$searchitem['search']}}" />
  <input type="hidden" name="gender" value="{{$searchitem['gender']}}" />
  <input type="hidden" name="category_id" value="{{$searchitem['category_id']}}" />
  <input type="hidden" name="date" value="{{$searchitem['date']}}" />
  <button class="utility__export-button">エクスポート</button>
</form>
<div class="utility__pagenation">
{{ $contacts -> links() }}
</div>
</div>
<!-- おわり -->

<!-- 問い合わせ一覧 -->
    <table class="content-table">
      <tr class="content-table__header">
        <th class="content-table__header-text">名前</th>
        <th class="content-table__header-text">性別</th>
        <th class="content-table__header-text">メールアドレス</th>
        <th class="content-table__header-text">お問い合わせの種類</th>
        <th class="content-table__header-text"></th>
      </tr>
      @foreach($contacts as $contact)
      <tr class="content-table__contents">
        <td class="content-table__contents-text">{{$contact['last_name']}} {{$contact['first_name']}}</td>
        <td class="content-table__contents-text">{{$contact['gender']}}</td>
        <td class="content-table__contents-text">{{$contact['email']}}</td>
        <td class="content-table__contents-text">{{$contact['category']['content']}}</td>
        <td >
          <!-- モーダルを開くボタン・リンク -->
          <button onclick="modal{{$contact->id}}.showModal()" value="{{$contact->id}}"> 開く"{{$contact->id}}"</button>
          <!-- modalボタン終わり -->
            <!-- モーダルウィンドウ -->
            <dialog id="modal{{$contact->id}}">
            <form><button onclick="modal.close()">close</button></form>
              <p>{{$contact->id}}</p>
              <table class="modal-table">
                <tr class="modal-table__row">
                  <th class="modal-table__title">お名前</th>
                  <td class="modal-table__content">{{$contact['last_name']}} {{$contact['first_name']}}</td>
                </tr>
                <tr class="modal-table__row">
                  <th class="modal-table__title">性別</th>
                  <td class="modal-table__content">{{$contact['gender']}}</td>
                </tr>
                <tr class="modal-table__row">
                  <th class="modal-table__title">メールアドレス</th>
                  <td class="modal-table__content">{{$contact['email']}}</td>
                </tr>
                <tr class="modal-table__row">
                  <th class="modal-table__title">電話番号</th>
                  <td class="modal-table__content">{{$contact['tel']}}</td>
                </tr>
                <tr class="modal-table__row">
                  <th class="modal-table__title">住所</th>
                  <td class="modal-table__content">{{$contact['address']}}</td>
                </tr>
                <tr class="modal-table__row">
                  <th class="modal-table__title">建物名</th>
                  <td class="modal-table__content">{{$contact['building']}}</td>
                </tr>
                <tr class="modal-table__row">
                  <th class="modal-table__title">お問い合わせの種類</th>
                  <td class="modal-table__content">{{$contact['category']['content']}}</td>
                </tr>
                <tr class="modal-table__row">
                  <th class="modal-table__title">お問い合わせ内容</th>
                  <td class="modal-table__content">{{$contact['detail']}}</td>
                </tr>
                </table>
                <form action="/remove?id={{$contact->id}}" method="post">
                @csrf
                  <button>削除</button>
                </form>
            </dialog>
                <!-- モーダルウィンドウ終わり -->
        </td>
      </tr>
      @endforeach
    </table>
  </div>
@endsection
@endif
