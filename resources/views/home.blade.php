@extends('layouts.app')


<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HOME</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <br>
        <br>
        <div class="tab-content"> <!--顯示全部-->
            <div role="tabpanel" class="tab-pane active masonry" id="home2">
                <input type="hidden" name="user_id" value="{{ Auth::user() }}">
                <div class="row" style="margin:50px 20px 30px 20px">

                    @foreach ($posts as $post )
                        @if(Auth::user()->id===$post->user_id)
                            <div class="col-md-3 col-xs-12" style="height: 550px;margin-top: 20px;">
                                <div class="thumbnail">
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <center>
                                        <div style="background-image: url({{$post->photo_url}});background-repeat: no-repeat;background-size: cover;width: 200px;height: 200px;margin-top: 20px;background-position:center;">
                                        </div>
                                    </center>
                                    <div class="caption">
                                        <center>
                                            <p>編號：{{$post->id}}</p>
                                            <p>姓名：{{$post->name}}</p>
                                            <p>內文：{{$post->content}}</p>
                                            
                                          
                                            <form action="message" method="post" style="display: inline-block;">
                                                @csrf
                                                {{method_field('POST')}}
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <button class="btn btn-primary btn-sm">檢視</button>
                                            </form>
                                           
                                            
                                            <form action="update" method="post" style="display: inline-block;">
                                                @csrf
                                                {{method_field('POST')}}
                                                <input type="hidden" name="id" value="{{$post->id}}">
                                                <button class="btn btn-warning btn-sm" type="submit">修改</button>
                                            </form>
                                     
                                            <form action="post/{{ $post->id }}" method="POST"style="display: inline-block">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button class="btn btn-danger btn-sm" type="submit">刪除</button>
                                            </form>
                                            </center>
                                       </div>  
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
    </body>
</html>

