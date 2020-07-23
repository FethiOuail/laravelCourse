@extends('layouts.app')


@section('content')



    <div class="container">

        <div class="row justify-content-center">

            <form class="col-6" method="POST" action="{{ route('offers.store') }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Offer Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Offer Name">
                </div>

                <div class="form-group">
                    <label for="price">Offer Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Offer Name">
                </div>

                <div class="form-group">
                    <label for="details">Offer Details</label>
                    <textarea class="form-control" name="details" rows="3"></textarea>

                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>

    </div>



@endsection
