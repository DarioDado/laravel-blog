<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blog Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
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
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>