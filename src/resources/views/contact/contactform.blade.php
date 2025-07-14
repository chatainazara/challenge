@extends('..layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contactform.css') }}">
@endsection

@section('content')
<h2>Contact</h2>

                    <form action="/confirm" method="post">
                    @csrf
                    <table>
                    <tr>
                      <th>お名前<strong>※</strong></th>
                      <td>
                      <input class="" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例：山田"/>
                      @if($errors->has('last_name'))
                      <div class="form__error">
                      <div>{{$errors->first('last_name')}}</div>
                      </div>
                      @endif
                      <input class="" type="text" name="first_name" value="{{ old('first_name') }}"placeholder="例：太郎"/>
                      @if($errors->has('first_name'))
                      <div class="form__error">
                      <div>{{$errors->first('first_name')}}</div>
                      </div>
                      @endif</td>
                    </tr>
                    <tr>
                      <th>性別<strong>※</strong></th>
                      <td>
                        <input type="radio" name="gender" value="1" {{old('gender') == '1' ? 'checked' :''}} checked/> 男性
                        <input type="radio" name="gender" value="2" {{old('gender') == '2' ? 'checked' :''}} /> 女性
                        <input type="radio" name="gender" value="3" {{old('gender') == '3' ? 'checked' :''}} /> その他
                        @if($errors->has('gender'))
                        <div class="form__error">
                        <div>{{$errors->first('gender')}}</div>
                        </div>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <th>メールアドレス<strong>※</strong></th>
                      <td><input class="" type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com"/>
                      @if($errors->has('email'))
                        <div class="form__error">
                        <div>{{$errors->first('email')}}</div>
                        </div>
                      @endif
                    </td>
                    </tr>
                    <tr>
                      <th>電話番号<strong>※</strong></th>
                      <td>
                      <input type="tel" name="tel1" size="3" maxlength="3" placeholder="080" value="{{ old('tel1') }}"/> -
                      <input type="tel" name="tel2" size="4" maxlength="4" placeholder="1234" value="{{ old('tel2') }}"/> -
                      <input type="tel" name="tel3" size="4" maxlength="4" placeholder="5678" value="{{ old('tel3') }}"/>
                      @if($errors->has('tel1'))
                        <div class="form__error">
                        <div>{{$errors->first('tel1')}}</div>
                        </div>
                      @endif
                      @if($errors->has('tel2'))
                        <div class="form__error">
                        <div>{{$errors->first('tel2')}}</div>
                        </div>
                      @endif
                      @if($errors->has('tel3'))
                        <div class="form__error">
                        <div>{{$errors->first('tel3')}}</div>
                        </div>
                      @endif
                      </td>
                    </tr>
                    <tr>
                      <th>住所<strong>※</strong></th>
                      <td><input class="" type="text" name="address" value="{{ old('address') }}" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3"/>
                      @if($errors->has('address'))
                        <div class="form__error">
                        <div>{{$errors->first('address')}}</div>
                        </div>
                      @endif
                      </td>
                    </tr>
                    <tr>
                      <th>建物名</th>
                      <td><input class="" type="text" name="building" value="{{ old('building') }}" placeholder="例：千駄ヶ谷マンション101"/></td>
                    </tr>
                    <tr>
                      <th>お問い合わせの種類<strong>※</strong></th>
                      <td>
                      <select name="category_id">
                      @if(old('category_id')=="")
                      <option value="">選択してください</option>
                      @foreach($categories as $category)
                      <option value="{{ $category['id'] }}" @if(old('category_id') == $category['id']) selected @endif>{{ $category['content'] }}
                      </option>
                      @endforeach
                      @else
                      @foreach($categories as $category)
                      <option value="{{ $category['id'] }}" @if(old('category_id') == $category['id']) selected @endif>{{ $category['content'] }}
                      </option>
                      @endforeach
                      @endif
                      </select>
                      @if($errors->has('category_id'))
                        <div class="form__error">
                        <div>{{$errors->first('category_id')}}</div>
                        </div>
                      @endif
                      </td>
                    </tr>
                    <tr>
                      <th>お問い合わせ内容<strong>※</strong></th>
                      <td><input class="" type="text" name="detail" value="{{ old('detail') }}" placeholder="お問い合わせ内容をご記載ください"/>
                      @if($errors->has('detail'))
                        <div class="form__error">
                        <div>{{$errors->first('detail')}}</div>
                        </div>
                      @endif
                      </td>
                    </tr>
                </table>
                </div>
                
                <div class="modal-footer">
                    <button class="btn btn-danger">確認画面</button>
                </form>

@endsection
