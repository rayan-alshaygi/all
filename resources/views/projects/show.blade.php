@extends('layouts.main')
@section('title','Projects') 
@section('content')
<h3>{{$project->title}} </h3>
<p> {{$project->description}}</p>
<p> type:{{$project->project_type}}</p>
<p> <img height="20%" width="20%" src="{{url('/storage/cover_images/'.$project->cover_image)}}"></p>
<p> responsible:{{$responsible}}</p>
<a href="{{url('/projects/'.$project->id.'/tasks/create')}}" > Add Task </a>
<p>Progress<p>
@if(count($tasks) > 0)
<table class="table" border="0"> 
        <tr>
            <th> description </th>
            <th>status</th>
            <th> done by </th>
        </tr>
@foreach($tasks as $task)
    <tr>
    <td>{{$task->description}}</td> 
    @php
    $c=false;
    if($task->done_by ==! NULL)
        $c=true;
    @endphp
    <td>{{Form::checkbox('done', '', $c,['id'=>$task->id,'onChange'=>'doubleCheck(this.id,'.$task->id.','.$task->project_id.')'])}}</td>
    <td>{{$task->doer}}</td>
</tr>
@endforeach
</table>
@endif

<script>
    function doubleCheck(clickedid,$id,$pid) { 
        if (document.getElementById(clickedid).checked == true) {
            var box= confirm("Are you sure this task is done ?");
            if (box==true)
            {   
                window.location.href = '@php echo URL::to('tasks/done/')@endphp/'+ $id+'/'+$pid ;
                return true;
            }
            else
               document.getElementById(clickedid).checked = false;
          } else {
                return false;
          }
        }
    </script>


@endsection