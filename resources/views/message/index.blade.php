@extends('layouts.app')
@section('content')



        @foreach($messages as $message)
        @if(Auth::user()->id===$message->user_id)
                            <div class="col-md-3 col-xs-12" style="height: 550px;margin-top: 20px;">
                                <div class="thumbnail">
                                    <input type="hidden" name="message_id" value="{{$message->id}}">
                                    <div class="caption">
                                        <center>
                                            <p>編號：{{$message->id}}</p>
                                            <p>內文：{{$message->content}}</p>
                                            </center>
                                       </div>  
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

@endsection