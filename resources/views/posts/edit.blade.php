@extends ('layout')
@section ('content')

<h1>Edit post</h1>
<hr>

<form id="update-post-form" method="POST" action="/posts/{{$post->id}}#update-post-form" enctype="multipart/form-data">
    <div class="form-group">
        {{csrf_field()}}
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter title" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="summernote" cols="20" rows="5" class="form-control post-input" id="body" placeholder="Enter post body">{{$post->body}}</textarea>
    </div>
    <div class="form-group category-select">
        <label>Category</label>
        <select name="category" class="ui dropdown" id="select">
            <option value="">---</option>
            @foreach($categories as $category)
                @if ($category->id === $post->category_id)
                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                @else
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="upload-btn-wrapper form-group">
        <button class="ui secondary basic button">Change headline image</button>
        <input id="post-headline-image" type="file"  name="file" accept="image/*"/>
        <div  class="ui label file-name-label">
            <i class="upload icon"></i>
        </div>
    </div>
    <div class="form-group">
        <img id="upload-img-preview" src="{{ asset('storage/assets/' . $post->asset->id . $post->asset->name . '?' . now()->timestamp)}}" alt="">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

    @include('partials.form-errors')
</form>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.min.js"></script>
<script>
  $('#select')
    .dropdown();
</script>
@endsection