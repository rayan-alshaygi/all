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
{{Form::text('responsible')}}
{{Form::submit('save')}}
{{Form::close()}}