<aside class="col-md-4 blog-sidebar">
@if(Request::segment(1) === 'users' && Request::segment(2))
<div class="profil-wraper">
    <img src="{{ asset('storage/assets/' . $user->asset->id . $user->asset->name . '?' . now()->timestamp) }}" alt="profil image" class="avatar">
    <div class="profil-info">
        <h3>{{$user->first_name}} {{$user->last_name}}</h3>
    </div>
</div>
@endif
<div class="p-4 mb-3 bg-light rounded sidebar-about">
    <h4 class="font-italic">About</h4>
    <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
</div>

<div class="p-4 sidebar-archives">
    <h4 class="font-italic">Archives</h4>
    <ol class="list-unstyled mb-0">
        @foreach($archive as $stats)
            @if(Request::segment(1) === 'users' && Request::segment(2))
            <li><a href="/users/{{Request::segment(2)}}?month={{$stats->month}}&year={{$stats->year}}">{{$stats->month}} {{$stats->year}} ({{$stats->published}})</a></li>
            @else
            <li><a href="/posts?month={{$stats->month}}&year={{$stats->year}}">{{$stats->month}} {{$stats->year}} ({{$stats->published}})</a></li>
            @endif
        @endforeach
    </ol>
</div>
</aside><!-- /.blog-sidebar -->