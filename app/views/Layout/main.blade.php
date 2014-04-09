<!DOCTYPE html>
<html>

{{HTML::style('assets/less/style.less')}}
{{HTML::style('assets/css/style.css')}}

{{ HTML::script('js/jquery-1.11.0.min.js') }}
{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/less.js/1.3.0/less.min.js') }}
{{ HTML::script('js/bootstrap.js') }}

    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="Scotch">


    <title>Bullshitbullshitbullshit</title>
     
     
    </head>


<body>

<nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container"> 
          <div class="navbar-header">  
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="#">Nehx</a>
        </div>


             <div class="collapse navbar-collapse navHeaderCollapse">
                <ul class="nav navbar-nav navbar-right">


                @if(Session::has('global'))
    	           <p>{{ Session::get('global') }}</p>
                @endif

                @include('layout.navigation')


                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="jumbotron">
    <div class="container"></div>

  <h1></h1>
 

  @yield('content')
  </div>
</div>

</body>



</html>