<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Laravel</title>
    </head>
    <body>
    <h1>画像アップロードフォーム</h1>
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

      <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="image">
        <br>
        <input type="submit" value="保存">
      </form>

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
        <img src="storage/app/public/images/{{$image}}">
    <p>{{$image}}</p>
        @endif
      </div>
      <hr class="cp_hr01" />
    </body>
</html>

<style>
h1 {text-align: center}
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