@extends('template')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Bus
        </div>
        <div class="card-body">
            <a href="/create-bus" class="btn btn-primary">Add Bus</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Plate Number</th>
                        <th>Brand</th>
                        <th>Seat</th>
                        <th>Price Per Day</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="root">
                    <tr>
                        <td>1</td>
                        <td>B 1234 AA</td>
                        <td>mercedes</td>
                        <td>25</td>
                        <td>150000</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection



<script type="module" defer src="{{ asset('./js/bus.js') }}"></script>
