@extends('layouts.main')
@section('title','Create Students') 
@section('head','Create New Student')
{{-- if commented default will show --}}
@section('content')
    {{Form::open(['action' => 'StudentsController@store', 'method'=>'POST','enctype'=>'multipart/form-data'])}}
    {{Form::label('name','Name:')}}
    {{Form::text('name','',['class'=>'form-control'])}}
    {{Form::label('age','age:')}}
    {{Form::text('age','',['class'=>'form-control'])}}
    {{Form::submit('save')}}
    <div class='form-control'>
    {{Form::file('cover_image')}}
    </div>
    {{Form::close()}}
@endsection