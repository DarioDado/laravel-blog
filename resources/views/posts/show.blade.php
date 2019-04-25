@extends ('layout')


@section('content')
<div class="blog-post">
        <img class="headline-image" src="{{ asset('storage/assets/' . $post->asset->id . $post->asset->name) }}" alt="headline image"> 
        <h2 class="blog-post-title">{{$post->title}}</h2>
        <p class="blog-post-meta">{{$post->created_at->diffForHumans()}} by <a href="#">{{$post->user->name}}</a></p>

        <p>{{$post->body}}</p>
</div><!-- /.blog-post -->
<hr>
@include('comments.comments')
@endsection