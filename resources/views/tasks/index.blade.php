<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    </head>
    <body>
        <h1>Tasks</h1>

        <ul>
        @foreach ($tasks as $task)
        <li><a href="/tasks/{{$task->id}}">{{$task->body}}</a></li>
        @endforeach
        </ul>
    </body>
</html>
