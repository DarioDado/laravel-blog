<div class="blog-post">
    <img class="headline-image" src="{{ asset('img/image.jpg') }}" alt="image">
    <h2 class="blog-post-title">{{$post->title}}</h2>
    <p class="blog-post-meta">{{$post->created_at->diffForHumans()}} by <a href="#">{{$post->user->name}}</a></p>

    <p>{{substr($post->body,0,150)}}...</p>
    <a href="/posts/{{$post->id}}">Continue reading...</a>
    <hr>
</div><!-- /.blog-post -->