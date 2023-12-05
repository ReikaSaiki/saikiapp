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
                    @foreach($users as $user)
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <h2 class="section-heading">{{ $user['name'] }}</h2>
                        <p>プロフィール：</p>
                        <textarea></textarea>
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </article>
        </div>
        </div>
        </div>

        @endsection