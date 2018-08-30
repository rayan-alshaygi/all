@extends('layouts.main')
@section('title','main page') 
{{-- if commented default will show --}}
@section('content')
        @foreach($names as $name)
            {{$name}} <br/>
            @endforeach
        <p> hello {{$name}}</p>

        {{-- @isset ,,@empty --}}
@endsection