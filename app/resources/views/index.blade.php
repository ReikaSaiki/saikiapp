@extends('layouts.app')

@section('content')

       
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->




                      
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