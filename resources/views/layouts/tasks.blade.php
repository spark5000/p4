@extends('layouts.master')

@section('title')
    Task manager
@stop

@section('head')

@stop

@section('task_manager_home')
    class="active"
@stop

@section('content')
    <article class="small-12 small-centered columns">
        <h3>List of all tasks</h3>
        <table class="task_manager_table hover">
            <thead>
                <tr>
                    <th>Task Description</th>
                    <th>Completed?</th>
                    <th>Created at</th>
                    <th>Last update at</th>
                    <th>Task priority</th>
                    <th>Available actions</th>
                </tr>
            </thead>

            @foreach ($tasks as $task)
                <tr class="task_manager_table_row @if($task->completed !== 0) task_manager_table_row_completed @endif">
                    <td>
                        {{ $task->description }}
                        @foreach ($task->tags as $tag)
                            <span class="tag_color label">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @if($task->completed == 0) Incomplete
                        @else Completed
                        @endif
                    </td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->updated_at }}</td>
                    <td class="priority_class">
                        @if($task->priority == 1) <span class="alert label">High</span>
                        @elseif($task->priority == 2) <span class="success label">Normal</span>
                        @elseif($task->priority == 3) <span class="warning label">Low</span>
                        @endif
                    </td>
                    <td>
                        @if($task->completed == 0)<a data-open="CompleteTask{{$task->id}}" class="small hollow success button">Mark as completed</a>@endif
                        @if($task->completed == 0)<a class="small hollow warning button" href="/task/edit/{{ $task->id }}">Edit</a>@endif
                        <a data-open="ModalTask{{$task->id}}" class="small hollow alert button">Delete</a>

                    </td>
                </tr>
            @endforeach
        </table>

        @foreach ($tasks as $task)
            <div class="reveal" id="ModalTask{{$task->id}}" data-reveal>
              <p class="lead">Are you sure you want to delete the following task: </p>
              <p>Description: {{ $task->description }}</p>
              <p>
                  <a class="small alert button" href="/task/delete/{{ $task->id }}">Yes, Delete</a>
                  <a class="small warning button" data-close aria-label="Close modal">Cancel</a>
              </p>
              <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endforeach

        @foreach ($tasks as $task)
            <div class="reveal" id="CompleteTask{{$task->id}}" data-reveal>
              <p class="lead">Are you sure you want to mark the following task as completed: </p>
              <p>Description: {{ $task->description }}</p>
              <p>
                  <a class="small success button" href="/task/complete/{{ $task->id }}">Yes, mark as completed</a>
                  <a class="small warning button" data-close aria-label="Close modal">Cancel</a>
              </p>
              <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endforeach
	</article>

@stop

@section('body')

@stop
