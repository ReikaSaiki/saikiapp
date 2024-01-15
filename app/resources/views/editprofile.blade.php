@extends('layouts.app')

@section('content')

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

        <!-- Post Content-->

<form method="POST" action="{{ route('profile.confirm',['id' => Auth::id()]) }}" enctype="multipart/form-data">
  @csrf
        <article class="mb-4">
            <div class="container">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                  
                <div class="col-md-10 col-lg-8 col-xl-7">

                <h2>プロフィール</h2>

                <p>プロフィール画像：</p>
                <img src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="プロフィール画像">
                <input type="file" name="profile_image"></input>
                           
                <p>名前：</p>
                <input name="name" value="{{ Auth::user()->name }}"></input>

                <p>自己紹介：</p>
                <textarea name="profile" class="form-control">
                {{ Auth::user()->profile }}
                </textarea>
                    
                </div>

                <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-primary" type="submit">確認画面へ</button>
                <a class="btn btn-secondary text-uppercase" href="{{ route('index') }}">戻る</a>
                </div>
            </div>
        </article>
        </form>

        </div>
        </div>
        </div>

        @endsection