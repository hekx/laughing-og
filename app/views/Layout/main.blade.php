<!DOCTYPE html>
<html>

{{ HTML::style('assets/css/style.css'); }}
{{ HTML::style('assets/css/head.css'); }}


    <head>

{{ HTML::script('assets/js/jquery-1.11.0.min.js') }}
{{ HTML::script('assets/js/bootstrap.js') }}
{{ HTML::script('assets/js/less-1.7.0.min.js') }}


    
    <title>KG Design</title>

    </head>


<body>


<header class="navbar navbar-static-top navbar-x" id="top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="img" href="index.html"> <img src="images/kg.png" class=".l"></a>
    </div>
    <nav class="navbar-collapse bs-navbar-collapse collapse" role="navigation" style="height: 1px;">
      <ul class="nav navbar-nav navbar-right">
                    @if(Session::has('global'))
                     <p>{{ Session::get('global') }}</p>
                    @endif

                    @include('layout.navigation')
      </ul>
    </nav>
  </div>
</header>




<div class="jumbotron">
    <div class="container-fluid"></div>

  <h1></h1>
 

  @yield('content')
  </div>
</div>

 </body>



</html>