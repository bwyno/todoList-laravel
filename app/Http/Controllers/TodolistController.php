<?php
  
namespace App\Http\Controllers;
  
use App\Models\Todolist;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $todolist = Todolist::latest()->paginate(5);
        
        return view('todolist.index',compact('todolist'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('todolist.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'description' => 'required',
            'targetDate' => 'required',
        ]);
        
        Todolist::create($request->all());
         
        return redirect()->route('todolist.index')
                        ->with('success','Todolist created successfully.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Todolist $todolist): View
    {
        return view('todolist.show',compact('todolist'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todolist $todolist): View
    {
        return view('todolist.edit',compact('todolist'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todolist $todolist): RedirectResponse
    {
        $request->validate([
            'description' => 'required',
            'targetDate' => 'required',
        ]);
        
        $todolist->update($request->all());
        
        return redirect()->route('todolist.index')
                        ->with('success','Todolist updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $todolist): RedirectResponse
    {
        $todolist->delete();
         
        return redirect()->route('todolist.index')
                        ->with('success','Todo deleted successfully');
    }

    
}