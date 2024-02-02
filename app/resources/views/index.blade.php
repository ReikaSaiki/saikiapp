@extends('layouts.app')

@section('content')

       
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->

        <div class="search">
        <form action="{{ route('index') }}" method="GET">
            @csrf
            <div>
                <label for="">キーワード
                    <input type="text" name="keyword" value="{{ $keyword }}">
                </label>
            </div>

            <div>
            <label for="">日付検索</label>
            <input type="date" name="from" placeholder="from_date" value="{{ $from }}">
                <span class="mx-3">~</span>
            <input type="date" name="until" placeholder="until_date" value="{{ $until }}">
            </div>

            <div>
            <label for="">形式</label>
            <select name="type" value="{{ $type }}">
                <option value="">未選択</option>
                <option value='0'>オフライン</option>
                <option value='1'>オンライン</option>
            </select>
            
            <input type="submit" class="btn btn-primary" value="検索">
            </div>
          
        </form>
    </div>
                    

        

    <!-- <form>
        <div>
            <label for="">日付検索</label>
            <input type="date" name="from" placeholder="from_date" value="{{ $from }}">
                <span class="mx-3">~</span>
            <input type="date" name="until" placeholder="until_date" value="{{ $until }}">
            <button type="submit">検索</button>
        </div>
    </form> -->

                      
                    @foreach($events as $event)
                    <hr class="my-4" /><!-- 仕切り線-->
                  
                    <div class="post-preview">
                    
                        <a href="{{ route('event.detail',['id' => $event['id']]) }}">
                            <h2 class="post-title">
                            {{ $event['name'] }}
                        </h2>
                        </a>
                        <p class="post-meta">
                        {{ $event['date'] }}
                        </p>
                  
                    </div>
                    @endforeach

                    <hr class="my-4" /><!-- 仕切り線-->
                    
                    {{ $events->links() }}
                    
                   
                    <!-- Pager-->
  
                </div>
            </div>
        </div>

        <div class="d-inline-flex p-2"><a class="btn btn-secondary text-uppercase" href="{{ route('event.form') }}">イベント登録</a></div>

@endsection