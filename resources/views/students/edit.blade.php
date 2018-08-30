@extends('layouts.main')
@section('title','Edit Students') 
@section('head','Edit Student')
{{-- if commented default will show --}}
@section('content')
    {{Form::open(['action' => ['StudentsController@update',$student->id], 'method'=>'POST'])}}
    {{Form::label('name','Name:')}}
    {{Form::text('name',$student->name,['class'=>'form-control'])}}
    {{Form::label('age','age:')}}
    {{Form::text('age',$student->age,['class'=>'form-control'])}}
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Update')}}

    {{Form::close()}}
@endsection