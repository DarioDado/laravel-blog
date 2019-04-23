@extends ('layout')

@section('jumbotron')
<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
        <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
    </div>
</div>
@endsection


@section('content')
    @foreach($posts as $post)
        @include('posts.single-post')
    @endforeach
    @if(request('month') && request('year'))
    {{ $posts->appends(['month' => request('month'), 'year' => request('year')])->links() }}
    @else
    {{ $posts->links() }}
    @endif
@endsection
