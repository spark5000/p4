<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;


    public function getHello() {
        if(\Auth::check()) {
            return redirect()->to('/tasks');
        }
        return view ('layouts.hello');
    }

    public function getSearch() {
        return view('layouts.search');
    }

    public function postSearch(Request $request) {
        $tasks = \App\Task::where('description','LIKE','%'.$request->searchTerm.'%')->where('user_id', '=',\Auth::id())->get();
        return view('layouts.search-ajax')->with(
            ['tasks' => $tasks]
        );
    }

    public function getTasks() {
        $tasks = \App\Task::with('tags')->where('user_id', '=',\Auth::id())->orderBy('priority','asc')->orderBy('updated_at','desc')->get();
        return view ('layouts.tasks')->with('tasks',$tasks);
    }

    public function getIncompleteTasks() {
        $tasks = \App\Task::with('tags')->where('user_id', '=',\Auth::id())->where('completed', '=', 0)->orderBy('priority','asc')->orderBy('updated_at','desc')->get();
        return view ('layouts.incomplete')->with('tasks',$tasks);
    }

    public function getCompletedTasks() {
        $tasks = \App\Task::with('tags')->where('user_id', '=',\Auth::id())->where('completed', '!=', 0)->orderBy('updated_at','desc')->get();
        return view ('layouts.completed')->with('tasks',$tasks);
    }

    public function getEdit($id) {
        $task = \App\Task::with('tags')->find($id);
        if(is_null($task) or ($task->user_id !== \Auth::id()) ) {
            \Session::flash('message','Task not found');
            return redirect('/tasks');
        }
        $tags_for_checkboxes = \App\Tag::getTagsForCheckboxes();
        $tags_for_this_task = [];
        foreach($task->tags as $tag) {
            $tags_for_this_task[] = $tag->id;
        }
        return view('layouts.edit')
            ->with('tags_for_checkboxes',$tags_for_checkboxes)
            ->with('tags_for_this_task',$tags_for_this_task)
            ->with('task',$task);
    }

    public function postEdit(Request $request) {
        $task = \App\Task::find($request->id);
        $task->description = $request->description;
        $task->priority = $request->priority;
        if($request->tags){
            $tags = $request->tags;
        }
        else {
            $tags=[];
        }
        $task->tags()->sync($tags);
        $task->save();
        \Session::flash('message','Your changes were saved');
        return redirect('/task/edit/'.$request->id);
    }

    public function getDoComplete(Request $request) {
        $task = \App\Task::find($request->id);
        $task->completed = 1;
        $task->save();
        \Session::flash('message','Selected task was marked completed');
        return redirect('/tasks');
    }

    public function getDoDelete($id = null) {
        $task = \App\Task::find($id);
        if(is_null($task) or ($task->user_id !== \Auth::id()) ) {
            \Session::flash('message','Task was not found');
            return redirect('/tasks');
        }
        if ($task->tags()) {
            $task->tags()->detach();
        }
        $task->delete();
        \Session::flash('message','Deleted task successfully');
        return redirect('/tasks');
    }

    public function getCreate() {
        $tags_for_checkboxes = \App\Tag::getTagsForCheckboxes();
        return view('layouts.create')->with('tags_for_checkboxes',$tags_for_checkboxes);
    }

    public function postCreate(Request $request) {
        $this->validate($request, [
            'description' => 'required',
            'priority' => 'required'
        ]);
        $task = new \App\Task();
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->user_id = \Auth::id();
        $task->save();
        if($request->tags){
            $tags = $request->tags;
        }
        else {
            $tags=[];
        }
        $task->tags()->sync($tags);
        \Session::flash('message','Your task was added');
        return redirect('/tasks');
    }



}
