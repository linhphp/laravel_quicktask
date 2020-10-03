<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Config;
use App\Task;
use Session;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectTo($message = null)
    {
        return redirect()->back()->with($message);
    }

    public function redirectRoute($route = null, $message = null)
    {
        return redirect()->route($route)->with($message);
    }

    public function index()
    {
        //
        $tasks = Task::Select('id', 'name', 'created_at')->paginate(Config::get('paginates.tasks'));
        return view('pages.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //
        Task::create(
            ['name' => $request->name]
        );
        return($this->redirectTo(['stored' => '']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //
        $task = Task::find($id);
        if($task)
        {
            return view('pages.edit', compact('task'));
        }
        else
        {
            return($this->redirectTo(['warning' => '']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        //
        $task = Task::find($id);
        if($task)
        {
            $task->name = $request->name;
            $task->save();
            return($this->redirectTo(['updated' => '']));
        }
        else
        {
            return($this->redirectTo(['warning' => '']));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Task::destroy($id))
        {
            return ($this->redirectRoute('tasks.index', ['deleted' => '']));
        }
        else
        {
            return ($this->redirectRoute('tasks.index', ['warning' => '']));
        }
    }

    public function changeLanguage($language)
    {
        //
        Session::put('lang', $language);
        return redirect()->back();
    }
}
