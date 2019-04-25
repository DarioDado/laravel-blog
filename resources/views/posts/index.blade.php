@extends ('layout')


@section('content')
    @foreach($posts as $post)
        @include('posts.single-post')
    @endforeach
    @if(request('month') && request('year'))
    {{ $posts->appends(['month' => request('month'), 'year' => request('year')])->links() }}
    @elseif (request('category'))
    {{ $posts->appends(['category' => request('category')])->links() }}
    @else
    {{ $posts->links() }}
    @endif
@endsection
