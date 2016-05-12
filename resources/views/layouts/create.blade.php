@extends('layouts.master')


@section('title')
    Create a new task
@stop



@section('head')

@stop



@section('create_new_task')
    class="active"
@stop


@section('content')



    <article class="small-12 columns">
        <h3>Create a new task!</h3>


        <form data-abide method="POST" action="/create">

            {{ csrf_field() }}
            <fieldset class="callout">
    			<legend>Description <span class="secondary label">Required</span> </legend>
    			<label for="description"></label>
    				<input type="text" id="description" autofocus name="description" value='{{ old('description') }}' required>
    				<span class="form-error">
    		          This field is required.
    		        </span>
			</fieldset>





            <fieldset class="callout">
    			<legend>Task priority</legend>
                    <label>
                        <input type="radio" name="priority" value="1"> High
                    </label>
    				<label>
    					<input type="radio" name="priority" value="2" checked> Normal
    				</label>
    				<label>
    					<input type="radio" name="priority" value="3"> Low
    				</label>
			</fieldset>



            <fieldset class="callout">
                <legend>Tags</legend>

                @foreach($tags_for_checkboxes as $tag_id => $tag_name)
                    <label><input type="checkbox" value="{{$tag_id}}" name="tags[]">{{$tag_name}} </label>
                @endforeach


            </fieldset>





            <button class="success button" type="submit">Submit</button>

        </form>





	</article>


@stop




@section('body')

@stop
