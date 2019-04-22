@extends ('layout')

@section ('content')

<h1>Sign up</h1>
<hr>

<form method="POST" action="/register">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="name"  placeholder="Enter your full name" name="name">
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" class="form-control" id="email"  placeholder="Enter your email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password"  placeholder="Enter your password" name="password">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password confirmation</label>
        <input type="password" class="form-control" id="password_confirmation"  placeholder="Confirm your password" name="password_confirmation">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sign up</button>
    </div>

    @include('partials.form-errors')
</form>
@endsection