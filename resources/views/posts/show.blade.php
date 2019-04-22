@extends ('layout')


@section('content')
<div class="blog-post">
        <h2 class="blog-post-title">{{$post->title}}</h2>
        <p class="blog-post-meta">{{$post->created_at->diffForHumans()}} by <a href="#">{{$post->user->name}}</a></p>

        <p>{{$post->body}}</p>
</div><!-- /.blog-post -->
<hr>
@include('comments.comments')
@endsection