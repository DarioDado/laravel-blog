<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Blog Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>

<div class="container">
    
  @include('partials.header')
  @yield('jumbotron')

</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">

    @yield('content')

    </div><!-- /.blog-main -->

    @include ('partials.sidebar')

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
  <p>Bootstrap blog template</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
</body>
</html>