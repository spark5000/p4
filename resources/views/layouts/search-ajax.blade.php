@if(sizeof($tasks) == 0)
    No results found.
@endif

@foreach($tasks as $task)
    <div class='task'>
        <a href='/task/edit/{{$task->id}}'>{{ $task->description }}</a>
    </div>
@endforeach
