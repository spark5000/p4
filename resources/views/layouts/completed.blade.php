@extends('layouts.master')

@section('title')
    Completed Tasks
@stop

@section('head')

@stop

@section('completed_tasks')
    class="active"
@stop


@section('content')
    <article class="small-12 small-centered columns">
        <h3>Completed tasks</h3>

        @if(count($tasks->where('completed', 1)) == 0)
            <p>There are no completed tasks!</p>
        @else
            <table class="completed_tasks_table hover">
                <thead>
                    <tr>

                        <th>Task Description</th>
                        <th>Completed at</th>

                        <th>actions</th>
                    </tr>
                </thead>

            @foreach ($tasks->where('completed', 1) as $task)
                <tr class="completed_tasks_table_row">
                    <td>
                        {{ $task->description }}
                        @foreach ($task->tags as $tag)
                            <span class="tag_color label">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $task->updated_at }}</td>
                    <td>
                        <a data-open="ModalTask{{$task->id}}" class="small hollow alert button">Delete</a>
                    </td>
                </tr>
            @endforeach
            </table>
        @endif


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
