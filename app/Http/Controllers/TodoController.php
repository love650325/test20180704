<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
     public function index()
    {
    	$todos = Todo::all();
    	//dd($todos)

    	return view('todo.index',['todos' => $todos]);
    }

     public function update(Request $request)
    {
    	/*$todo = new Todo();
    	$todo->title=$request->title; //request index的name
    	$todo->save();
    	*/
        $user = Auth::user();
		$todo = Todo::create([
            'title' => $request->title,
            'user_id' => $user->id,
        ]);

		//$todo = Todo::create($request->all()) 只能用在Todo中 有設定的變數上
    	return redirect('todo');
    }

    public function destory(Request $request , Todo $todo)
    {
    	$todo->delete();
		return redirect('todo');
	}
/*
    public function __construct()
    {
        $this->middleware('auth');
    }
   */ 
}
