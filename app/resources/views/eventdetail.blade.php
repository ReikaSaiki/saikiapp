@extends('layouts.app')

@section('content')

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    @foreach($events as $event)
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <h2 class="section-heading">{{ $event['name'] }}</h2>
                        <p>日時：{{ $event['date'] }}</p>
                        <p>内容：{{ $event['contents'] }}</p>

                   
                        <p>形式：</p>
                        @if($event['type_flg'] = 1)
                        <p>オンライン</p>
                        @else
                        <p>オフライン</p>
                        @endif
                  

                        <p>人数：{{ $event['capacity'] }}人</p>
                        <p>参加費：{{ $event['fee'] }}円</p>
                        <p>URL:{{ $event['link'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

@if($like_model->like_exist(Auth::user()->id,$events[0]['id']))
<p class="favorite-marke">
  <a class="js-like-toggle loved" href="" data-eventid="{{ $events[0]['id']}}"><i class="like-btn fas fa-heart"></i></a>

</p>
@else
<p class="favorite-marke">
  <a class="js-like-toggle" href="" data-eventid="{{ $events[0]['id']}}"><i class="like-btn fas fa-heart"></i></a>

</p>
@endif

            <a class="btn btn-primary" href="{{ route('index') }}">戻る</a>
        </article>
        </div>
        </div>
        </div>

        @endsection

        <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"> 
  </script>
  
<script>
  $(function () {
    var like = $('.js-like-toggle');
    var likeEventId;
    
    like.on('click', function () {
        var $this = $(this);
        likeEventId = $this.data('eventid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxlike',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'event_id': likeEventId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 
    
    //.likesCountの次の要素のhtmlを「data.eventLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.eventLikesCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });
  </script>

  