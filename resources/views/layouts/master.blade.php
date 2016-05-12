<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Awesome Task Manager' --}}
        @yield('title', "Awesome Task Manager")
    </title>

    <meta charset='utf-8'>
    <link rel="stylesheet" href="/css/foundation.min.css">
    <link rel="stylesheet" href="/css/app.css">

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    <div class="wrapper">

        @if(Session::get('message') != null)
            <div class="row">
                <div class="success callout" data-closable="slide-out-up">
                  <h5>{{ Session::get('message') }}</h5>

                  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            </div>

        @endif

        <header class="row">
        	<div class="small-12 columns">
    			<h1><a href="/">Awesome Task Manager</a></h1>
        	</div>
        </header>

        <div class="row">
            @if(Auth::check())
                <div class="top-bar">
                  <div class="top-bar-left">
                    <ul class="menu">
                      <li @yield('task_manager_home')><a href="/tasks">All Tasks</a></li>
                      <li @yield('incomplete_tasks')><a href="/tasks/incomplete">Incomplete Tasks</a></li>
                      <li @yield('completed_tasks')><a href="/tasks/completed">Completed Tasks</a></li>
                      <li @yield('create_new_task')><a href="/create">Create a New Task</a></li>
                      <li @yield('search_page')><a href="/task/search">Search</a></li>
                    </ul>
                  </div>
                  <div class="top-bar-right">
                    <ul class="menu">
                        <li class="menu-text">Logged in as: {{$user->name}} </li>
                      <li><a href="/logout" class="alert button">Logout</a></li>
                    </ul>
                  </div>
                </div>
            @else
            @endif

            {{-- <section> --}}
                {{-- Main page content will be yielded here --}}
                @yield('content')
            {{-- </section> --}}

            {{-- @yield('body-content') --}}

        </div>

        <footer class="row">
            {{-- &copy; {{ date('Y') }} --}}
            <div class="large-12 columns">
              	<p>© 2016 Samuel Park. All Rights Reserved. </p>
              </div>
        </footer>
    </div>

    {{-- <script src="/js/vendor/jquery.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/vendor/what-input.js"></script>
    <script src="/js/vendor/foundation.min.js"></script>
    <script src="/js/app.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
