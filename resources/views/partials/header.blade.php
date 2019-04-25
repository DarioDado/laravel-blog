<header class="blog-header py-3">
<div class="row flex-nowrap justify-content-between align-items-center">
    <div class="col-4 pt-1">
    @if (Auth::check())
    <a class="text-muted" href="/posts/create">Create a new post</a>
    @endif
    </div>
    <div class="col-4 text-center">
    <a class="blog-header-logo text-dark" href="/posts">Junior</a>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
    <a class="text-muted" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
    </a>
    @if (Auth::check())
    <a class="btn btn-sm btn-outline-secondary header-right-button" href="">{{Auth::user()->name}}</a>
    <a class="btn btn-sm btn-outline-secondary" href="/logout">Logout</a>
    @else
    <a class="btn btn-sm btn-outline-secondary header-right-button" href="/login">Login</a>
    <a class="btn btn-sm btn-outline-secondary" href="/register">Sign up</a>
    @endif
    </div>
</div>
</header>
@if($message = session('message'))
<div id="flash-message" class="alert alert-success flash-message" role="alert">
    <p>{{$message}}</p>
</div>
@endif

<div class="nav-scroller py-1 mb-2">
<nav class="nav d-flex justify-content-between">
	@foreach($categories as $category)
	<a class="p-2 text-muted" href="/posts?category={{$category->id}}">{{$category->name}}</a>
	@endforeach
</nav>
</div>