@extends('layouts.master')


@section('title')
    Edit task
@stop



@section('head')

@stop



@section('task_manager_home')
    class="active"
@stop


@section('content')
    <article class="small-12 columns">
        <h3>Edit task</h3>

        @if($task->completed !== 0)

            <div class="callout warning">This task is already completed. No further changes can be saved. </div>

        @endif

        @if($task->completed == 0) <form data-abide method="POST" action="/task/edit"> @endif

            <input type='hidden' name='id' value='{{$task->id}}'>
            {{ csrf_field() }}


            <fieldset class="callout">
                <legend>Description <span class="secondary label">Required</span> </legend>
                @if($task->completed == 0)

    			<label for="description"></label>
    				<input type="text" id="description" autofocus name="description" value='{{ $task->description }}' required>
    				<span class="form-error">
    		          This field is required.
    		        </span>
                @else
                    {{ $task->description }}
                @endif
			</fieldset>

            <fieldset class="callout">
    			<legend>Created at:</legend>

                    {{ $task->created_at }}
			</fieldset>

            <fieldset class="callout">
    			<legend>@if($task->completed == 0) Updated at: @else Completed at: @endif </legend>

                    {{ $task->updated_at }}
			</fieldset>

            <fieldset class="callout">
    			<legend>Task priority</legend>
                    <label>
                        <input type="radio" name="priority" value="1" {{ ($task->priority == 1 ? 'CHECKED' : '')}}> High
                    </label>
    				<label>
    					<input type="radio" name="priority" value="2" {{ ($task->priority == 2 ? 'CHECKED' : '')}}> Normal
    				</label>
    				<label>
    					<input type="radio" name="priority" value="3" {{ ($task->priority == 3 ? 'CHECKED' : '')}}> Low
    				</label>
			</fieldset>

            <fieldset class="callout">
                <legend>Tags</legend>
                @foreach($tags_for_checkboxes as $tag_id => $tag_name)
                    <label><input type="checkbox" value="{{$tag_id}}" name="tags[]" {{ ( (in_array($tag_id,$tags_for_this_task)) ? 'CHECKED' : '') }}>{{$tag_name}} </label>
                @endforeach
            </fieldset>


            @if($task->completed == 0)
                <button class="success button" type="submit">Save changes</button>
            @else
                {{-- <div class="callout warning">This task is already completed. No further changes can be saved. </div> --}}
                <button class="disabled button">Save changes</button>
            @endif




        @if($task->completed == 0)</form>@endif

	</article>

@stop

@section('body')

@stop
