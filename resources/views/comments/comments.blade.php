@if(Auth::check())
<form id="comments-form" method="POST" action="/comments#comments-form">
    {{csrf_field()}}
    <input type="hidden" value="{{$post->id}}" name="post_id">
    <div class="form-group">
        <textarea name="body" id="" cols="30" rows="10" class="form-control" id="body" placeholder="Create a new comment"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </div>
    @include('partials.form-errors')
</form>
@endif

@foreach($post->comments as $comment)
<span>{{$comment->created_at->diffForHumans()}} by <a href="#">{{$comment->user->name}}</a></span>
<div class="alert alert-secondary" role="alert">
{{$comment->body}}
</div>
@endforeach