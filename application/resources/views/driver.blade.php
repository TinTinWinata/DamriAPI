@extends('template')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Driver
        </div>
        <div class="card-body">
            <a href="/create-driver" class="btn btn-primary">Add Driver</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>ID Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="root">

                </tbody>
            </table>
        </div>
    </div>
@endsection

<script defer type="module" src="{{ asset('./js/driver.js') }}"></script>
