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

                <div class="form-group row">
                <p class="col-sm-4 col-form-label">プロフィール画像</p>
                <div class="col-sm-8">

                @if(!empty($profile_image))
                   <img src="{{ $profile_image }}" name="profile_image" alt="">
                   @else
                   <img src="{{ asset('storage/'.$img) }}" name="img" alt="">
                   @endif

                </div>
                <input type="hidden" name="newImageName" value="{{ $newImageName }}">
                </div>

                        <p>名前</p>
                        <p name="name">{{ $profile['name'] }} </p>

                        <p>自己紹介</p>
                        <p name="profile">{{ $profile['profile'] }} </p>
                        </div>
                    </div>
                </div>
 
               <button class="btn btn-primary" type="submit">登録</button>
              
                </form>

                <button type="button" id="btn--back" class="btn btn-secondary">戻る</button>
                <script> const back = document.getElementById('btn--back'); back.addEventListener('click', (e) => { history.back(); return false; }); </script>
                
                    
                </div>
            </div>
        </article>
        </div>
        </div>
        </div>

        @endsection