@extends('layouts.app')

@section('content')


            <button type="button" class="btn btn-primary form-btn" data-toggle="modal" data-target="#exampleModalCenter">
                    確認画面へ
                </button>
            </div>
       
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">確認画面</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['route' => 'process', 'method' => 'POST']) !!}
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">お名前（全角10文字以内）<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-name"></p>
                                    <input class="modal-name" type="hidden" name="name" value="">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">メールアドレス<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-email"></p>
                                    <input class="modal-email" type="hidden" name="email" value="">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">電話番号</p>
                                <div class="col-sm-8">
                                    <p class="modal-tel"></p>
                                    <input class="modal-tel" type="hidden" name="tel" value="">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">性別<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-gender"></p>
                                    <input class="modal-gender" type="hidden" name="gender" value="">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">選択（複数選択可）<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-checkbox"></p>
                                    <input class="modal-checkbox" type="hidden" name="checkbox" value="">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <p class="col-sm-4 col-form-label">お問い合わせ内容<span class="badge badge-danger ml-1">必須</span></p>
                                <div class="col-sm-8">
                                    <p class="modal-contents"></p>
                                    <input class="modal-contents" type="hidden" name="contents" value="">
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">修正する</button>
                                {{ Form::submit('送信', ['name' => 'submit', 'class' => 'btn btn-primary']) }}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->

                    @foreach($events as $event)
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
                    
                   
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">次のページへ</a></div>
                </div>
            </div>
        </div>

        <div class="d-inline-flex p-2"><a class="btn btn-secondary text-uppercase" href="#!">イベント登録</a></div>

@endsection