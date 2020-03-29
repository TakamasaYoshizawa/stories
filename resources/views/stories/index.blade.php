@extends('layouts.front')
@section('title', '登録済みニュースの一覧')

@section('content')
    <div class="container">
        @auth 
           @foreach($stories as $index => $story)
               {{$story['image']}}
           @endforeach

        @endauth

        <div class="row">
            <h1>ストーリー一覧</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="/stories/create" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
@endsection








