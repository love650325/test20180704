@extends('layouts.app')
@section('content')

    <script>
        $(function () {

            function format_float(num, pos) {
                var size = Math.pow(10, pos);
                return Math.round(num * size) / size;
            }

            function preview(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.preview').attr('src', e.target.result);
                        var KB = format_float(e.total / 1024, 2);
                        $('.size').text("檔案大小：" + KB + " KB");
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("body").on("change", ".upl", function () {
                preview(this);
            })

        })

    </script>
    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            <img src="{{ Session::get('path') }}">
        @endif
        <form class="form-horizontal" action="update/{{$post->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            {{method_field('PUT')}}

            <div class="row" style="margin-top: 100px;">
                <div class="col-md-1 col-sm-1"></div>

                <div class="col-md-5 col-sm-11"
                     style="background-color: rgba(245, 245, 245, 0.8);border-radius:0px;padding-top: 50px;padding-bottom: 30px">
                    <div class="form-group">
                        <div class="col-sm-3 control-label ">
                            <label for="exampleInputEmail1">評論</label>
                        </div>
                    </div>
                </div>
            </div>
          
                <div class="form-group">
                    <div class="col-sm-3 control-label ">
                    </div>
                    <div class="col-sm-7 control-label">

                        <input type="hidden" name="id" value="{{$post->id}}">
                        <textarea class="form-control" name="content">{{$post->content}}</textarea>
                    </div>
                </div>

                <div class="col-md-5 col-sm-0">
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-3 control-label ">
                            <label for="exampleInputEmail1">上傳檔案</label>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <div style="background-image: url({{$post->photo_url}});background-repeat: no-repeat;background-size: cover;width: 200px;height: 200px;margin-top: 20px;background-position:center;">
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3 col-sm-offset-1 control-label ">

                            <div class="form-group"
                                 style="background-image: url(img/cloud.png);width:250px;height: 150px; margin-left:50px;background-repeat: no-repeat; ">
                                <input type='file' class="upl" name="image" style="padding: 70px 45px">
                            </div>
                            <img class="preview" style="max-width: 150px; max-height: 200px; margin: 20px">
                            <div class="size"></div>
                        </div>
                    </div>
                </div>
            
            <div class="col-md-1 col-sm-1"></div>
            <div class="row">
                <div class="col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5">
                    <button type="submit" class="btn btn-success btn-lg" style="margin: 50px 0px 50px;padding: 10px;">
                        確認
                    </button>
                </div>
            </div>
        </form>
@endsection