@extends('..layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<h2>Admin</h2>

<form>
  <input />
  <select><option></option></select>
  <select><option></option></select>
  <input type="date" />
  <button>検索</button>
  <button>リセット</button>
</form>

<div>
{{ $contacts->links() }}
</div>

<div class="attendance__content">
  <div class="attendance__panel">
   
  </div>
  <div class="attendance-table">
    <table class="attendance-table__inner">
      <tr class="attendance-table__row">
        <th class="attendance-table__header">名前</th>
        <th class="attendance-table__header">性別</th>
        <th class="attendance-table__header">メールアドレス</th>
        <th class="attendance-table__header">お問い合わせの種類</th>
        <th class="attendance-table__header"></th>
      </tr>

      @foreach($contacts as $contact)
      <tr class="attendance-table__row">
        <td class="attendance-table__item">{{$contact['first_name']}}{{$contact['last_name']}}</td>
        <td class="attendance-table__item">{{$contact['gender']}}</td>
        <td class="attendance-table__item">{{$contact['email']}}</td>
        <td class="attendance-table__item">{{$contact['detail']}}</td>
        <td class="attendance-table__item">

      <!-- モーダルを開くボタン・リンク -->
    <div class="container">
        <div class="row mb-5">
            <div class="col-2">
                <button type="button" class="btn btn-primary mb-12" data-toggle="modal" data-id="{{ $contact->id }}" data-target="#editModal{{ $contact->id }}">詳細</button>
            </div>
        </div>
    </div>
    <!-- modalボタン終わり -->

<!-- ボタン・リンククリック後に表示される画面の内容 -->
    <div class="modal fade" id="editModal{{ $contact->id }}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <ul>
                      <li>{{$contact['first_name']}}</li>
                      <li>{{$contact['gender']}}</li>
                      <li>{{$contact['email']}}</li>
                      <li>{{$contact['detail']}}</li>
                    </ul>
                </div>
                <div class="modal-body">
                データを削除しますか？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">削除</button>
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
</div>
@endsection


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>