<?php

namespace App\Http\Controllers;
use DB; 
use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\User;
class ProjectController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects=Project::orderBy('created_at','desc')->paginate(6);
        return view('projects.index')->with('projects',$projects); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users=User::pluck('name','id');
        return view('projects.create')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v=\Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'type'=>'required',
            'responsible'=>'required',
            'cover_image'=>'image|nullable|max:1990',
        ])->validate();
        // handle file upload
        if($request->hasFile('cover_image')){
            // get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload image
            $path= $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }

        $p=new Project;
        $p->title=$request->title;
        $p->description=$request->description;
        $p->project_type=$request->type;
        $p->cover_image= $fileNameToStore;
        $p->responsible=$request->responsible;
        $p->save();
        return \Redirect::to('projects')->with('success','Project Created'); // for not using the \ fog aktebe use Redirect
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project=Project::find($id);
        // to get tasks
        $tasks=Task::where('project_id',$id)->get();
        $tid=1;
        $tasks=DB::select('Select users.name AS doer,tasks.* from tasks join users on tasks.done_by=users.id
        where tasks.project_id='.$id);
        // to get responsible name
        //$responsible=DB::select('Select name from users where id='.$project->responsible);
        $responsiblerow=DB::table('users')->where('id', $project->responsible)->first();
        $responsible=$responsiblerow->name;
        return view('projects.show')->with('project',$project)->with('tasks',$tasks)->with('responsible',$responsible);
    }

    public function completeTask($id,$pid)
    {
        $task=Task::find($id);
        $task->done_by=$id;
        $task->done_date=now();
        $task->save();
        return $this->show($pid);
      }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
/*         $project=Project::find($id);
        return view('projects.edit')->with('project',$project); */
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
/*         $v=\Validator::make($request->all(),[
            'name'=>'required',
            'age'=>'required',
        ])->validate();
        $s=Student::find($id);
        $s->name=$request->name;
        $s->age=$request->age;
        $s->save();
        return \Redirect::to('projects')->with('success','Project Updated'); // for not using the \ fog aktebe use Redirect
 */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       /*  $project=project::find($id);
        $project->delete();
        return \Redirect::to('projects')->with('success','Project Deleted'); // for not using the \ fog aktebe use Redirect
 */
    }
}
