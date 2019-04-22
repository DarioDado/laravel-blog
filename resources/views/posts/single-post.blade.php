<div class="blog-post">
    <h2 class="blog-post-title">{{$post->title}}</h2>
    <p class="blog-post-meta">{{$post->created_at->diffForHumans()}} by <a href="#">{{$post->user->name}}</a></p>

    <p>{{substr($post->body,0,150)}}...</p>
    <a href="/posts/{{$post->id}}">Continue reading...</a>
    <hr>
</div><!-- /.blog-post -->