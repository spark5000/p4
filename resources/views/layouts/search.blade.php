@extends('layouts.master')

@section('title')
    Search for a task
@stop

@section('head')

@stop

@section('search_page')
    class="active"
@stop

@section('content')

    <h3>Search for a task</h3>

    <form method='POST'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Search for a task description, e.g. 'groceries' or 'meeting':</label>
            <input
                type='text'
                id='searchTerm'
                name='searchTerm'
                autofocus
            >
            <span id='loading' style='display:none'>Loading...</span>
        </div>

        <h5>Results:</h5>
        <div id='results'></div>

    </form>

@stop

@section('body')
    <script src="/js/search.js"></script>
@stop
