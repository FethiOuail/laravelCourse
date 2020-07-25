@extends('layouts.app')


@section('content')



    <div class="container">


        @if(session()->has('success'))

            <div class="alert alert-success" role="alert"> {{ session()->get('success')  }} </div>

        @endif

        <div class="row justify-content-center">

            <form class="col-6  py-3 " method="POST" action="{{ route('offers.store') }}">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Offer Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" placeholder="Offer Name">

                    @error('name')
                    <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                    @enderror

                </div>

                <div class="input-group ">

                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-money"></i>
                        </div>

                    </div>

                    <input type="text" class="form-control @error('price') is-invalid @enderror " id="price" name="price" value="{{old('price')}}" placeholder="Offer price">

                    @error('price')
                          <span class="invalid-feedback" role="alert"> <strong> {{ $message }} </strong> </span>
                    @enderror
                </div>




                <div class="form-group ">
                    <label for="details">Offer Details</label>

                    <textarea class="form-control @error('details') is-invalid @enderror"  name="details" rows="3"></textarea>

                    @error('details')
                    <span class="invalid-feedback"> <strong> {{ $message }} </strong> </span>
                    @enderror

                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

        </div>

    </div>



@endsection
