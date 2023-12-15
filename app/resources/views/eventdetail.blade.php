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
                  

                        <p>人数：{{ $event['capacity'] }}</p>
                        <p>参加費：{{ $event['fee'] }}</p>
                        <p>URL:{{ $event['link'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <a class="btn btn-primary" href="{{ route('index') }}">戻る</a>
        </article>
        </div>
        </div>
        </div>

        @endsection