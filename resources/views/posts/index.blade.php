@extends ('layout')


@section('content')

    @if (request('term') && count($posts) < 1)
    <div class="no-result">
        <p><i class="meh outline icon no-result-icon"></i></p>
        <p class="no-result-msg">We couldn't find any post matching your search</p>
    </div>
    @endif

    @foreach($posts as $post)
        @include('posts.single-post')
    @endforeach

    @if(request('month') && request('year'))
    {{ $posts->appends(['month' => request('month'), 'year' => request('year')])->links() }}
    @elseif (request('category'))
    {{ $posts->appends(['category' => request('category')])->links() }}
    @elseif (request('term'))
    {{ $posts->appends(['term' => request('term')])->links() }}
    @else
    {{ $posts->links() }}
    @endif

@endsection
