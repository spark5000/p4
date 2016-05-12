@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="small-11 small-centered columns">
            <div class="callout primary">
                <h5>
                    Hello! Welcome to Awesome Task Manager! Please login or register to continue!
                </h5>
            </div>
            @if(count($errors) > 0)
                <div class="callout alert">
                    <ul class='errors'>
                        @foreach ($errors->all() as $error)
                            <li><span class=''></span> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="small-5 columns">
                <div class="callout">
                    <h5>
                        Login here
                    </h5>


                    <form method='POST' action='/login'>

                        {!! csrf_field() !!}

                        <div class='form-group'>
                            <label for='email'>Email</label>
                            <input type='text' name='email' id='email' value='{{ old('email') }}'>
                        </div>

                        <div class='form-group'>
                            <label for='password'>Password</label>
                            <input type='password' name='password' id='password' value=''>
                        </div>

                        <div class='form-group'>
                            <input type='checkbox' name='remember' id='remember'>
                            <label for='remember' class='checkboxLabel'>Remember me</label>
                        </div>

                        <button class="button" type="submit">Login</button>

                    </form>

                </div>
            </div>

            <div class="small-2 columns">
                <div class="">
                    <p><br><br><br></p>
                    <h5 class="text-center">
                        or
                    </h5>
                </div>
            </div>



            <div class="small-5 columns">
                <div class="callout">
                    <h5>
                        Register here 
                    </h5>

                    <form method='POST' action='/register'>
                        {!! csrf_field() !!}

                        <div class='form-group'>
                            <label for='name'>Name</label>
                            <input type='text' name='name' id='name' value='{{ old('name') }}'>
                        </div>

                        <div class='form-group'>
                            <label for='email'>Email</label>
                            <input type='text' name='email' id='email' value='{{ old('email') }}'>
                        </div>

                        <div class='form-group'>
                            <label for='password'>Password</label>
                            <input type='password' name='password' id='password'>
                        </div>

                        <div class='form-group'>
                            <label for='password_confirmation'>Confirm Password</label>
                            <input type='password' name='password_confirmation' id='password_confirmation'>
                        </div>

                        <button class="success button" type="submit">Register</button>

                    </form>

                </div>

            </div>



        </div>
    </div>

@stop
