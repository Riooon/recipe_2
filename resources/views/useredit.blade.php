<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')

@if ($user->id==Auth::user()->id)

<div class="user_inputs">
    <form action="{{ url('user/update') }}" method="POST"  enctype="multipart/form-data">
    {{ csrf_field() }}
    <dl>
        <dt>アイコン画像</dt>
        <dt><img id="preview"></dt>
        <dd><input type="file" name="icon" class="input_text" id="icon"></dd>
        <dt>ユーザー名</dt>
        <dd><input type="text" name="name" class="input_text" value="{{ $user->name }}"></dd>
        <dt>メールアドレス</dt>
        <dd><input type="email" name="email" class="input_text" value="{{ $user->email }}"></dd>
        <dt>パスワード</dt>
        <dd><input type="password" name="password" class="input_text"></dd>
        <input type="hidden" value="{{ $user->id }}" name="id">
        <input type="submit" class="submit" value="更新">
    </dl>
    </form>
</div>

<div class="wdithdraws">
    <div class="btn">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('ログアウト') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
    </div>
    <form action="{{ url('user/'.Auth::user()->id) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" id="delete" class="btn btn-danger">アカウント削除</button>
    </form>
</div>


@endif
@endsection
