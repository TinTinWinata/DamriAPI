@extends('template')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form id="myForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection

<script type="module" src="{{ asset('js/login.js') }}" defer></script>
