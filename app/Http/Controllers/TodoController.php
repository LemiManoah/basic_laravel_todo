<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

class TodoController extends Controller
{
    /**
     * Display a listing of the todo items.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all todo items and pass them to the view
        $listItems = Todo::all();
        return view('welcome', compact('listItems'));
    }

    /**
     * Store a newly created todo item in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveItem(Request $request)
    {
        // Validate the input
        $request->validate([
            'listItem' => 'required|max:255',
        ]);

        // Create a new Todo item
        Todo::create([
            'name' => $request->listItem,
            'is_complete' => 0,
        ]);

        // Redirect to the home route
        return redirect()->route('home'); 
    }

    /**
     * Remove the specified todo item from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the Todo item by ID and delete it
        $todo = Todo::findOrFail($id);
        $todo->delete();

        // Redirect to the home route with a success message
        return redirect()->route('home')->with('success', 'Task deleted successfully!');
    }
}
