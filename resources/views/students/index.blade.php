@extends('layouts.main')
@section('title','Students') 
@section('head','All Students')
{{-- if commented default will show --}}
@section('content')

         @if(count($students) > 0)
{{--         <table class="table">
            <tr> 
                <th> Name </th>
                <th> Age </th>
                <th> Edit </th>
                <th> Delete </th> 
            </tr> --}}
            @foreach($students as $student)
                <div class="well">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="{{url('/storage/cover_images/'.$student->cover_image)}}">
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h4> Name: {{$student->name}} </h4>
                            <p> Age:{{$student->age}}  <p>
                            <div> <a href="{{url('/students/'.$student->id.'/edit')}}" class="btn-btn-default">Edit</a>
                   
                   {{Form::open(['action'=>['StudentsController@destroy',$student->id], 'method'=>'POST','class'=>''])}}
                           {{Form::hidden('_method','DELETE')}}
                           {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                       {{Form::close()}}
                       </div>
                        </div>
                    </div>
                </div>
{{--                 <td> <a href="/students/{{$student->id}}"> </a> </td>   show function --}}
            @endforeach
{{--             {{$students->links()}}  for pagination --}}
        @else
            <p> No Students </p>
        @endif
@endsection