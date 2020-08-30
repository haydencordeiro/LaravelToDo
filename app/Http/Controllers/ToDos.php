<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;
use DB;
class ToDos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $todoList=DB::table('to_dos')->where('userr_id', auth()->id())->get();
    return view('todo')->with('todos',$todoList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
        $user_id=auth()->user();
        
        $newToDo=new ToDo;
        $newToDo->task=$request->input('todo');
        $newToDo->completed='f';
        $newToDo->user_id=$user_id->id;
        $newToDo->userr_id=$user_id->id;
        $newToDo->save();
        return redirect('/list');

        // return view('create');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = ToDo::findOrFail($id);
        if ($todo->completed=='f'){
            $todo->completed='t';
        }
        else{
            $todo->completed='f';

        }
        $todo->update();
        return redirect('/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $todo = ToDo::findOrFail($id);
        $todo->delete();
        return redirect('/list');
    }


}
