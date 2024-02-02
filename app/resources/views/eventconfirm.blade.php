@extends('layouts.app')

@section('content')

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

        <!-- Post Content-->

<form method="POST" action="{{ route('event.register') }}">
  @csrf
  <input type="hidden" name="title" value="{{ $details['title'] }}">
  <input type="hidden" name="date" value="{{ $details['date'] }}">
  <input type="hidden" name="contents" value="{{ $details['contents'] }}">
  <input type="hidden" name="type_flg" value="{{ $details['type_flg'] }}">
  <input type="hidden" name="capacity" value="{{ $details['capacity'] }}">
  <input type="hidden" name="fee" value="{{ $details['fee'] }}">
  <input type="hidden" name="link" value="{{ $details['link'] }}">



        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                  
                    <div class="col-md-10 col-lg-8 col-xl-7">
                         <p name="title">イベント名：{{ $details['title'] }} </p>
                       

                        <p name="date">日時：{{ $details['date'] }} </p>
                    

                        <p name="contents">内容：{{ $details['contents'] }}</p>
                   

                        <p name="type_flg">形式：
                        @if(  $details['type_flg'] = 1)
                        <p>オンライン</p>
                        @else
                        <p>オフライン</p>
                        @endif
                        </p>
                      

                        <p name="capacity">人数：{{ $details['capacity'] }}人</p>

                        <p name="fee">参加費：{{ $details['fee'] }}円</p>

                        <p name="link">URL：{{ $details['link'] }}</p>
                   
                        
                    </div>
 
               <button class="btn btn-primary" type="submit">登録</button>
               <button type="button" id="btn--back" class="btn btn-secondary">戻る</button>
               <script> const back = document.getElementById('btn--back'); back.addEventListener('click', (e) => { history.back(); return false; }); </script>
                </form>
                    
                </div>
            </div>
        </article>
        </div>
        </div>
        </div>

        @endsection