<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
    	
    	$messages = Message::all();
    	return view('message.index',['messages' => $messages]);
    }

    public function update(Request $request) //新增
    {
        $user = Auth::user();
		$message = Message::create([
            'content' => $request->content,
            'user_id' => $user->id,
        ]);

    	return redirect('message');
    }

    public function destory(Request $request , Message $message)
    {
    	$message->delete();
		return redirect('message');
	}

    
}
