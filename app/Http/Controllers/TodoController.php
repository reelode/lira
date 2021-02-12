<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoCollection;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TodoCollection(Todo::paginate(20));
        //
    }



    /**
     * This method returns all todos from a user, sorted descendingly by y-position. good for almost nothing
     */
    public function getByUser()
    {
        return new TodoCollection(Todo::where('user_id', Auth::id())->orderByDesc('y_position')->get());
    }

    public function getListsAndTodos()
    {
        $user_id = Auth::id();
        //this is a MAJOR request that will, when completed, return all lists of a user, with 
        //todos sorted by Y-position in the lists. maybe split up into smaller ones?
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->list_col_id = $request->list_col_id;
        $todo->user_id = Auth::id();
        $todo->y_position = Todo::getHighestYPos($todo->user_id, $todo->list_col_id) + 1; //good starting point
        $todo->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
        return new TodoResource($todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
