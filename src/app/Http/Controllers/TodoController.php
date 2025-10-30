<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function index()
    {
      $todos = Todo::all();
      return view('index', compact('todos'));//この回答を確認
    }

    public function store(TodoRequest $request)
    {
      $todo = $request->only(['content']);
      Todo::create($todo);//この回答を確認
      return redirect('/')
        ->with('success', 'Todoを作成しました');
    }
    //ここから回答を確認
    public function update(TodoRequest $request)
    {
      $todo = $request->only(['content']);
      Todo::find($request->id)->update($todo);
    //ここまで回答を確認
      return redirect('/')
        ->with('success', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
      Todo::find($request->id)->delete();
      return redirect('/')
        ->with('success', 'Todoを削除しました');
    }
}
