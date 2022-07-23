@extends('template')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Order
        </div>
        <div class="card-body">
            <a href="/create-order" class="btn btn-primary">Add Order</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bus Plate Number</th>
                        <th>Driver Name</th>
                        <th>Contact Name</th>
                        <th>Contact Phone</th>
                        <th>Start Rent Date</th>
                        <th>Total Rent Days</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="root">

                </tbody>
            </table>
        </div>
    </div>
@endsection

<script defer type="module" src="./js/order.js"></script>
