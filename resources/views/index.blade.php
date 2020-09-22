@extends('layouts.upload_image_app')

@section('title', 'Upload')
<h1>画像アップロードフォーム</h1>

<!-- エラーメッセージがあれば表示 -->
@if ($errors->any())
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">

    <!-- アップロードした画像があれば表示 -->
    @isset ($filename)
    <div>
        <img src="{{ asset('storage/' . $filename) }}">
    </div>
    @endisset

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    {{ csrf_field() }}
    <button class="btn btn-success"> Upload </button>
</form>