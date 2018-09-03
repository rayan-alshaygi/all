<p> Add Task to {{$project->title}}
{{Form::open(['action' => 'TaskController@store', 'method'=>'POST'])}}
{{-- {{Form::hidden('id',request()->route('id'))}} --}}
{{Form::hidden('project_id',$project->id)}}
{{Form::label('description','Description:')}}
{{Form::text('description')}}
{{Form::label('requested_by','Requester:')}}
{{Form::text('requested_by')}}
{{Form::submit('save')}}
{{Form::close()}}