@extends ('layout')

@section ('content')

<h1>Create a new post</h1>
<hr>

<form method="POST" action="/posts">
    <div class="form-group">
        {{csrf_field()}}
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="" cols="20" rows="5" class="form-control post-input" id="body" placeholder="Enter post body"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Publish</button>
    </div>

    @include('partials.form-errors')
</form>
@endsection