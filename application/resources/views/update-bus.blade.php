@extends('template')


@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Create Bus
        </div>
        <div class="card-body">
            <form id="submit-form">
                <div class="form-group">
                    <label for="plate-number">Plate Number</label>
                    <input type="text" id="busId" disabled class="form-control" id="plate-number" name="id"
                        value="{{ $id }}">
                </div>
                <div class="form-group">
                    <label for="plate-number">Plate Number</label>
                    <input type="text" class="form-control" id="plate-number" name="plate_number"
                        placeholder="Enter plate number">
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <select id="brand" class="form-control" name="brand">
                        <option value="mercedes">Mercedes</option>
                        <option value="fuso">Fuso</option>
                        <option value="scania">Scania</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="seat">Seat</label>
                    <input type="text" class="form-control" id="seat" name="seat"
                        placeholder="Enter seat capacity">
                </div>
                <div class="form-group">
                    <label for="price-per-day">Price per day</label>
                    <input type="text" class="form-control" id="price-per-day" name="price_per_day"
                        placeholder="Enter price per day">
                </div>
                <button type="submit" class="btn btn-primary">Add Bus</button>
            </form>
        </div>
    </div>
@endsection


<script type="module" src="{{ asset('js/updateBus.js') }}" defer></script>
