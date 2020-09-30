<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body>
    <h1>検索フォーム</h1>
    <div class="form">

      @if(count($errors)>0)
      <div class="alert alert-danger">
      <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
          </ul>
      </div>
      @endif

      <h2><a href="/index">画像アップロードフォームへ</a></h2>

      <h2>IDで検索</h2>
      <form action="{{route('searchId')}}" method="post">
        @csrf
      <input type="text" name="id">
        <br>
        <input type="submit" value="検索">
      </form>

      <h2>IDで削除</h2>
      <form action="{{route('deleteId')}}" method="POST">
        @csrf
        <input type="text" name="id">
        <br>
        <input type="submit" value="削除">
      </form>

        {{-- <h2>日付で検索</h2>
        <form action="{{route('searchDate')}}" method="get">
            @csrf
        <input type="date" name="from" placeholder="from_date">
        <span class="mx-3 text-grey">~</span>
        <input type="date" name="until" placeholder="until_date">
        <button type="submit">検索</button> --}}
    </form>

    </div>
    <hr class="cp_hr01" />

    <h1>検索結果</h1>
    <div class="image">
        @if($image!=null)
        <form action="{{route('updateId')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="id" value="{{$image->id}}">
            <br>
            <input type="file" name="image">
            <br>
            <input type="submit" value="画像を変更">
        </form>
        <img src="/storage/images/{{$image->image}}">
        @else
        <p class="id_text">該当データ無し</p>
        @endif
      </div>
      <hr class="cp_hr01" />
    </body>
</html>

<style>
h1 {text-align: center}
.id_text {text-align: center}
img{
  width:30%;
  height:30%;
  margin-left:33%;
  margin-top:50px;
}
.form{
  margin:7% 33% ;
}

.cp_hr01 {
	border-width: 1px 0 0 0;
	border-style: solid;
	border-color: #43a047;
}
</style>