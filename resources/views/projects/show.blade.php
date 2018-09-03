@extends('layouts.main')
@section('title','Projects') 
@section('content')
<h3>{{$project->title}} </h3>
<p> {{$project->description}}</p>
<p> type:{{$project->project_type}}</p>
<p> <img height="20%" width="20%" src="{{url('/storage/cover_images/'.$project->cover_image)}}"></p>
<p> responsible:{{$project->responsible}}</p>
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
    </tr>

@endforeach
</table>
@endif
@endsection