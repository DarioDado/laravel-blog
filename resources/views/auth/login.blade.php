@extends ('layout')

@section ('content')

<h1>Login</h1>
<hr>

<form method="POST" action="/login">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" class="form-control" id="email"  placeholder="Enter your email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password"  placeholder="Enter your password" name="password">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>

    @include('partials.form-errors')
</form>
@endsection