<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
class TaskController extends Controller
{
    public function create($id)
    {
        $p=Project::find($id);
        return view('tasks.create')->with('project',$p);
    }

    public function store(Request $request)
    {
        $v=\Validator::make($request->all(),[
            'description'=>'required',
            'requested_by'=>'required',
        ])->validate();
       
        $t=new Task;
        $t->description=$request->description;
        $t->requested_by=$request->requested_by;
        $t->project_id=$request->project_id;
        $t->save();
        return \Redirect::to('projects/'.$request->project_id)->with('success','Project Created'); // for not using the \ fog aktebe use Redirect
    }
}
