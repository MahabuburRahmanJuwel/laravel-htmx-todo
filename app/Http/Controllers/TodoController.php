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
        $query = Todo::query();

           if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }


        if ($request->has('filter_category') && $request->filter_category != 'All') {
            $query->where('category', $request->filter_category);
        }

        $todos = $query->latest()->get();


        if ($request->header('HX-Request')) {
            return view('todos.partials.list', compact('todos'));
        }

        return view('todos.index', compact('todos'));
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
            'title' => 'required|string|max:255',
            'category' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        Todo::create([
            'title' => $request->title,
            'category' => $request->category ?? 'General',
            'due_date' => $request->due_date,
        ]);

        $todos = Todo::latest()->get();
        return view('todos.partials.list', compact('todos'));
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
        return view('todos.partials.edit-form', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        $todo->update($request->only(['title', 'category', 'due_date']));

        $todos = Todo::latest()->get();
        return view('todos.partials.list', compact('todos'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
          $todo->delete();

        $todos = Todo::latest()->get();
        return view('todos.partials.list', compact('todos'));
    }

     public function toggle(Todo $todo)
    {
        $todo->update(['is_completed' => !$todo->is_completed]);

        $todos = Todo::latest()->get();
        return view('todos.partials.list', compact('todos'));
    }
}
