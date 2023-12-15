@extends('layouts.app')

@section('content')

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

        <!-- Post Content-->

<form method="POST" action="{{ route('event.confirm') }}">
  @csrf
        <article class="mb-4">
            <div class="container">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                  
                    <div class="col-md-10 col-lg-8 col-xl-7">

                        <p>イベント名：
                        <input type ="text" name="title">
                        </p>

                        <p>日時：
                        <input type ="datetime-local" name="date">
                        </p>

                        <p>内容：
                        <textarea type ="text" name="contents"></textarea>
                        </p>

                        
                        <p>形式：
                        <select name="type">
                        <option value='0'>オフライン</option>
                        <option value='1'>オンライン</option>
                        </select>
                        </p>

                        <p>人数：
                        <input type ="text" name="capacity">人</p>

                        <p>参加費：
                        <input type ="text" name="fee">円</p>

                        <p>URL：
                        <input type ="url" name="url"></p>
                        
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