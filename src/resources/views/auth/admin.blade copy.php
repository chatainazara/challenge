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
<!-- <button onclick="modal.showModal()">open</button>
    <dialog id="modal">
      <p>Hello</p>
      <form method="dialog">
        <></>
      </form>
    </dialog> -->
<!-- 一覧 -->
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
        <!-- <form action="/remove?id={{$contact->id}}" method="post">
                  @csrf
                    <button class="modal-content__delete" type=submit>削除</button>
                </form> -->

      <!-- モーダルを開くボタン・リンク -->

                <button type="button" class="content-table__contents-button" data-toggle="modal" data-id="{{ $contact->id }}" data-target="#editModal{{ $contact->id }}">詳細</button>

                <!-- <button type="button" class="btn btn-primary mb-8" data-toggle="modal"  data-id="{{ $contact->id }}" data-target="#editModal{{ $contact->id }}">ボタンで開く</button> -->

    <!-- modalボタン終わり -->


<!-- ボタン・リンククリック後に表示される画面の内容 -->
    <div class="modal fade" id="editModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <!-- data-backdrop="static" :上記に加えると固定ウィンドウになる-->
      <div class="modal-dialog">
        <div class="modal-contents">
            <!-- <h4 class="modal-title" id="myModalLabel"></h4> -->
          <div class="modal-header">
            <button class="modal-contents__close" type="button" class="modal-close" data-dismiss="modal">✖️</button>
          </div>
            <!-- <div class="modal-header"> -->
            <div class="modal-body">
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

                <div class="modal-footer">
                <form action="/remove?id={{$contact->id}}" method="get">
                  <button id="test1" type="button" class="modal-content__delete" data-target="#deleteModal" onclick="location.href='/remove'">削除</button>
                  <button type="button" class="btn btn-primary"
                                onclick="location.href='{{ route('remove', ['id' => $contact->id])}}'">
                                削除
                            </button>
                  <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-title="{{ $contact->id }}" data-url="/remove">削除</button> -->
                </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- modalウィンドウ終わり -->
                </td>
                </tr>
      @endforeach

    </table>
  </div>


  <script>
    $('.delete-confirm').click(function(){
        $('#deletebtn').val( $(this).val() );
    });
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection
@endif
