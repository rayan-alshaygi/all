@extends('layouts.main')
@section('title','Projects') 
@section('head','All Projects')
{{-- if commented default will show --}}
@section('content')

         @if(count($projects) > 0)
         @php $counter=0;
         @endphp
           <div class="well">
                <div class="row">
            @foreach($projects as $project)
                @if($counter%3 == 0 && $counter!=0)
                </div>
                <div class="row">
                @endif 
                        <div class="col-md-4 col-sm-4">
                            <img height="100%" width="100%" src="{{url('/storage/cover_images/'.$project->cover_image)}}">
                            <h4> <a href="{{url('/projects/'.$project->id)}}"> {{$project->title}} </h4> 
                        </div>
{{--                 <td> <a href="/projects/{{$project->id}}"> </a> </td>   show function --}}
            @php $counter+=1; @endphp
            @endforeach
        </div>
    </div>
            {{$projects->links()}}
        @else
            <p> No projects </p>
        @endif
@endsection