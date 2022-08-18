<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodosCollection;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $todo;
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = Todo::get();

        return TodosCollection::collection($todos);
    }

    public function add(Request $request)
    {
        $data = [
            'content' => $request->content,
            'checked'=> $request->checked,
            'completed'=> $request->completed
        ];
        $this->todo->create($data);
        $todos = Todo::get();

        return TodosCollection::collection($todos);
    }

    public function destroy(Request $request)
    {
        $this->todo->find($request->id)->delete();
        $todos = Todo::get();

        return TodosCollection::collection($todos);

    }

    public function deleteAll(Request $request)
    {
        foreach($request->params as $param) {
            if($param['checked'] == 1) {
                $this->todo->find($param['id'])->delete();
            }
        }
        $todos = Todo::get();

        return TodosCollection::collection($todos);

    }

    public function doneAll(Request $request)
    {
        
        foreach($request->params as $param) {
            if($param['checked'] == 1) {
                $data = $this->todo->find($param['id']);
                $data->completed = 1;
                $data->save();
            }
        }
        $todos = Todo::get();

        return TodosCollection::collection($todos);

    }

}
