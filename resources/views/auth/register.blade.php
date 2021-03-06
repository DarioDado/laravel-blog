@extends ('layout')

@section ('content')

<h1>Sign up</h1>
<hr>

<form method="POST" action="/register" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
        <label for="title">First name</label>
        <input type="text" class="form-control" id="first_name"  placeholder="Enter your first name" name="first_name">
    </div>
    <div class="form-group">
        <label for="title">Last name</label>
        <input type="text" class="form-control" id="last_name"  placeholder="Enter your last name" name="last_name">
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

    <div class="upload-btn-wrapper form-group">
        <button class="ui secondary basic button">Select a profil image</button>
        <input id="post-headline-image" type="file"  name="file" accept="image/*"/>
        <div  class="ui label file-name-label">
            <i class="upload icon"></i>
        </div>
    </div>
    <div class="form-group">
        <img id="upload-img-preview" src="" alt="">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Sign up</button>
    </div>

    @include('partials.form-errors')
</form>
@endsection