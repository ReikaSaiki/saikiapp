@extends('layouts.app')

@section('content')

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

        <!-- Post Content-->

<form method="POST" action="{{ route('event.register') }}">
  @csrf

        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                  
                    <div class="col-md-10 col-lg-8 col-xl-7">
                         <p>イベント名：{{ $details['title'] }} </p>
                       

                        <p>日時：{{ $details['date'] }} </p>
                    

                        <p>内容：{{ $details['contents'] }}</p>
                   

                        <p>形式：{{ $details['type'] }}</p>
                      

                        <p>人数：{{ $details['capacity'] }}人</p>

                        <p>参加費：{{ $details['fee'] }}円</p>

                        <p>URL：{{ $details['url'] }}</p>
                   
                        
                    </div>
 
                <a class="btn btn-primary" >登録</a>
                
                </form>
                    
                </div>
            </div>
        </article>
        </div>
        </div>
        </div>

        @endsection