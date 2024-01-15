@extends('layouts.app')

@section('content')

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

        <!-- Post Content-->
        <article class="mb-4">
          
            <div class="row gx-4 gx-lg-5 justify-content-center">
               
                <div class="col-md-10 col-lg-8 col-xl-7">

                    <h2 class="section-heading">プロフィール</h2>
                    <hr class="my-4" /><!-- 仕切り線-->
                       
                    <div class="d-flex justify-content-evenly">
                        
                    <img src="{{ asset('storage/'.$user->profile_image) }}" alt="プロフィール画像">

                    <p>{{ Auth::user()->name }}</p>
                    </div>

                    <div class="container px-4 px-lg-5">

                    <hr class="my-4" /><!-- 仕切り線-->

                    <h2>自己紹介</h2>
                    
            <!-- <form method="POST" action="{{ route('profile.edit',['id' => Auth::id()]) }}"> -->
                    <div class="card">
                        <div class="card-body">
                        {{ Auth::user()->profile }}
                        </div>
                    </div>
                    

                    <div class="d-flex justify-content-end mb-4">
                        <a class="btn btn-secondary text-uppercase" href="{{ route('profile.edit',['id' => Auth::id()] ) }}">編集</a>
                    </div>
    
                    <!-- <button class="btn btn-primary" type="submit" >編集</button> -->
            
            <!-- </form> -->

                    <hr class="my-4" /><!-- 仕切り線-->

                    <h2>お気に入り一覧</h2>

                    @foreach($likes as $like)
                    <div class="post-preview">
                    
                        <a href="{{ route('event.detail',['id' => $like['id']]) }}">
                            <p>{{ $like['name'] }}</p>
                        </a>
                        <!-- <p>
                        {{ $like['date'] }}
                        </p> -->
                  
                    </div>
                    @endforeach

                    </div>

                <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-secondary" href="{{ route('index') }}">戻る</a>
                </div>

                </div>
            </div>
        </article>
        </div>
        </div>
        </div>

        @endsection