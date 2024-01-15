@extends('layouts.app')

@section('content')

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

        <!-- Post Content-->

<form method="POST" action="{{ route('profile.update',['id' => Auth::id()]) }}">
  @csrf
  <input type="hidden" name="name" value="{{ $profile['name'] }}">
  <input type="hidden" name="profile" value="{{ $profile['profile'] }}">

        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                  
                <div class="col-md-10 col-lg-8 col-xl-7">
                    
                <h2>プロフィール</h2>

                    <div class="card">
                        <div class="card-body">

                        <p>プロフィール画像</p>
                        <!-- <img src="{{ asset('storage/'.$profile['profile_image']) }}" input type="file" name="profile_image"></p>
                        -->
                        <!-- <img src="{{ asset('storage/'.$img) }}" alt="" width="40%" input type="file" name="profile_image"> -->

                        <p>名前</p>
                        <p name="name">{{ $profile['name'] }} </p>

                        <p>自己紹介</p>
                        <p name="profile">{{ $profile['profile'] }} </p>
                        </div>
                    </div>
                </div>
 
               <button class="btn btn-primary" type="submit">登録</button>
               <a class="btn btn-secondary text-uppercase" href="{{ route('profile.edit',['id' => Auth::id()]) }}">戻る</a>
                
                </form>
                    
                </div>
            </div>
        </article>
        </div>
        </div>
        </div>

        @endsection