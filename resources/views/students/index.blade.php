@extends('layouts.main')
@section('title','Students') 
@section('head','All Students')
{{-- if commented default will show --}}
@section('content')

         @if(count($students) > 1)
        <table class="table">
            <tr> 
                <th> Name </th>
                <th> Age </th>
                <th> Edit </th>
                <th> Delete </th> 
            </tr>
            @foreach($students as $student)
            <tr>
                <td>  {{$student->name}}</td>
                <td>  {{$student->age}} </td>
                <td> <a href="{{url('/students/'.$student->id.'/edit')}}" class="btn-btn-default">Edit</a></td>
                <td> {{Form::open(['action'=>['StudentsController@destroy',$student->id], 'method'=>'POST','class'=>''])}}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {{Form::close()}}
{{--                 <td> <a href="/students/{{$student->id}}"> </a> </td>   show function --}}
            </tr>
            @endforeach
            </table>
{{--             {{$students->links()}}  for pagination --}}
        @else
            <p> No Students </p>
        @endif
@endsection