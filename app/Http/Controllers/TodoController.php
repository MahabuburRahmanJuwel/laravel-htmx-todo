<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Todo::where('user_id', auth()->id())->latest()->get();
        if ($request->header('HX-Request')) {
            return view('todos.list', compact('data'));
        }
        return view('todos.home', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'title' => [
                    'required',
                    'string',
                    'max:255',
                ],
        ],[],
            [
                'title' => 'Todo',
            ]
        );
        

        Todo::create([
            'title' => $request->title,
            'user_id' => auth()->id()
        ]);


        return response('', 200)
    ->header('HX-Trigger', 'todoCreated');
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', [
            'todo' => $todo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
             'title' => [
                    'required',
                    'string',
                    'max:255',
                ],
        ],[],
            [
                'title' => 'Todo',
            ]
        );
        

        $todo->update([
            'title' => $request->title,
            'status' => $request->status
        ]);


        return response('', 200)
    ->header('HX-Trigger', 'todoCreated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response('');
    }
}
