<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all(); // fetch all tasks from DB
        return view('index', compact('tasks')); // pass tasks to view
    }

    /**
     * Show the form for creating a new resource in the db.
     */
    public function create() {}

    /**
     * Store a newly created resource in db.
     */
    public function store(Request $request)
    {
        Task::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified db.
     */
    public function show(Task $task)
    {
        return $task;
    }

    /**
     * Show the form for editing the specified db.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in db.
     */

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->back();
    }


    /**
     * Remove the specified resource from db.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
