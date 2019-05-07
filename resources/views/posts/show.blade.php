@extends ('layout')


@section('content')
<div class="blog-post">
        <img class="headline-image" src="{{ asset('storage/assets/' . $post->asset->id . $post->asset->name . '?' . now()->timestamp)}}" alt="headline image"> 
        <h2 class="blog-post-title">{{$post->title}}</h2>
        <p class="blog-post-meta">{{$post->created_at->diffForHumans()}} by <a href="#">{{$post->user->first_name}} {{$post->user->last_name}}</a></p>

        <p>{!! $post->body !!}</p>
        @if(Auth::check() &&  Auth::user()->id === $post->user->id)
        <div class="form-wraper">
                <form id="delete-form" action="/posts/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="delete-button" class="btn btn-danger">Delete</button>
                        <button id="delete-confirmation-button" class="btn btn-danger">Confirm</button>
                </form>
                <a id="edit-button" href="#" class="btn btn-secondary">Edit</a>
        </div>
        @endif
</div><!-- /.blog-post -->
<hr>
@include('comments.comments')
@endsection

@section('scripts')
<script>
$('#delete-button').click(function(e){
        e.preventDefault();
        $('#delete-button').hide();
        $('#delete-confirmation-button').show();
})
$('#delete-confirmation-button').click(function(e){
        e.preventDefault();
        $('#delete-form').submit();
})
</script>
@endsection