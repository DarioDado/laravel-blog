@extends ('layout')

@section ('content')

<h1>Edit your profile</h1>
<hr>

<form id="update-user-form" method="POST" action="/users/{{$user->id}}#update-user-form" enctype="multipart/form-data">
    {{csrf_field()}}
    @method('PUT')
    <div class="form-group">
        <label for="title">First name</label>
        <input type="text" class="form-control" id="first_name"  placeholder="Enter your first name" name="first_name" value="{{$user->first_name}}">
    </div>
    <div class="form-group">
        <label for="title">Last name</label>
        <input type="text" class="form-control" id="last_name"  placeholder="Enter your last name" name="last_name" value="{{$user->last_name}}">
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="text" class="form-control" id="email"  placeholder="Enter your email" name="email" value="{{$user->email}}">
    </div>
    <div class="upload-btn-wrapper form-group">
        <button class="ui secondary basic button">Change profil image</button>
        <input id="post-headline-image" type="file"  name="file" accept="image/*"/>
        <div  class="ui label file-name-label">
            <i class="upload icon"></i>
        </div>
    </div>
    <div class="form-group">
        <img id="upload-img-preview" src="{{ asset('storage/assets/' . $user->asset->id . $user->asset->name . '?' . now()->timestamp) }}" alt="">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

    @include('partials.form-errors')
</form>
@endsection