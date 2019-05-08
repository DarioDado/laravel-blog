@extends ('layout')


@section('content')

    @if (count($posts) < 1)
    <div class="no-result">
        <p><i class="meh outline icon no-result-icon"></i></p>
        <p class="no-result-msg">No posts yet</p>
    </div>
    @endif
    
    @foreach($posts as $post)
        @include('posts.single-post')
    @endforeach

    @if(request('month') && request('year'))
    {{ $posts->appends(['month' => request('month'), 'year' => request('year')])->links() }}
    @else
    {{ $posts->links() }}
    @endif

@endsection