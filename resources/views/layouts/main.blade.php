
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>@yield('title','Default title')</title>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Our Site</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('/about')}}">About</a></li>
      <li><a href="{{url('/services')}}">Services</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li> <a href="{{url('/students/create')}}"> Create student </a> </li>
    </ul>
  </div>
</nav>
  @include('inc.messages')
<div class="panel panel-primary">
      <div class="panel-heading"> @yield('head')</div>
      <div class="panel-body"> @yield('content')</div>
    </div> 
<footer>
     <div class="">
       <p class="float-left">
         <a href="#">Back to top</a>
       </p>
     </div>
    <div id="copyright text-right">© Copyright 2018 Rayan</div>
   </footer>
 
</html>
