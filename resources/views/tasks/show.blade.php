<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    </head>
    <body>
        <h1>{{$task->body}}</h1>
        <p><strong>ID:</strong> {{$task->id}}</p>
        <p><strong>Created at:</strong> {{$task->created_at}}</p>
        <p><strong>Updated at:</strong> {{$task->updated_at}}</p>
        <br>
        <br>
        <a href="/tasks">Back</a>
    </body>
</html>