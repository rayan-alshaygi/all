<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
// use DB; 
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
/*         $s=new Student;
        $s->name="Rayan";
        $s->age=23;
        $s->save(); */
/*        $student=Student::where('id',2)->get(); // first return one row where get return array
        dd($student);  */
/* 
        $student=Student::where('id',2)->first();
        return $student->age; */
/*         $student->age="22";                      // For Update
        $student->save(); */

/*         $student->delete();          // for Delete*/

        //$post=DB::select('Query'); // fo DB query

        // $student=Student::orderBy('created_at','desc')->paginate();  // for pagination

        $student=Student::all();
        return view('students.index')->with('students',$student); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v=\Validator::make($request->all(),[
            'name'=>'required',
            'age'=>'required',
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
            $fileNameToStore='noimage.png';
        }

        $s=new Student;
        $s->name=$request->name;
        $s->age=$request->age;
        $s->cover_image= $fileNameToStore;
        $s->save();
        return \Redirect::to('students')->with('success','Student Created'); // for not using the \ fog aktebe use Redirect
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $student=Student::find($id)
        // then send it to the view that shows that element
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view('students.edit')->with('student',$student);
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
        $v=\Validator::make($request->all(),[
            'name'=>'required',
            'age'=>'required',
        ])->validate();
        $s=Student::find($id);
        $s->name=$request->name;
        $s->age=$request->age;
        $s->save();
        return \Redirect::to('students')->with('success','Student Updated'); // for not using the \ fog aktebe use Redirect

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return \Redirect::to('students')->with('success','Student Deleted'); // for not using the \ fog aktebe use Redirect

    }
}
