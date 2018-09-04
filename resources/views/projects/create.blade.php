{{Form::open(['action' => 'ProjectController@store', 'method'=>'POST','enctype'=>'multipart/form-data'])}}
{{Form::label('title','Title:')}}
{{Form::text('title')}}
{{Form::label('description','Description:')}}
{{Form::text('description')}}
{{Form::label('cover_image','Image:')}}
{{Form::file('cover_image')}}
{{Form::label('type','Type:')}}
{{Form::radio('type','internal','true')}}
{{Form::label('internal','Intenral:')}}
{{Form::radio('type','external')}}
{{Form::label('external','External:')}}
{{Form::label('responsible','Responsible:')}}
@if(count($users)>0)
{{Form::select('responsible',$users)}}
@endif
{{-- @php 
if(count($users)>0){
    $a=array(); 
    foreach ($users as $key => $user) {
        $a[$key]="'".$user->id"'" =>"'".$user->name."'";
    } 
    }
@endphp --}}
{{-- {{Form::text('responsible')}} --}}
{{Form::submit('save')}}
{{Form::close()}}