@extends('layouts.app')


@section('content')



    <div class="container">


        @if(session()->has('success'))

            <div class="alert alert-success" role="alert"> {{ session()->get('success')  }} </div>

        @endif


        @if(!isset($offer))

                <div class="row justify-content-center">

                    <form class="col-6  py-3 " method="POST" action="{{ route('offers.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name_en">Offer Name</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{old('name_en')}}" placeholder="Offer Name">

                            @error('name_en')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="name_ar">Offer Name arabic</label>
                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{old('name_ar')}}" placeholder="اسم العرض">

                            @error('name_ar')
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
                            <label for="details_en">Offer Details</label>

                            <textarea class="form-control @error('details_en') is-invalid @enderror"  name="details_en" rows="3"></textarea>

                            @error('details_en')
                            <span class="invalid-feedback"> <strong> {{ $message }} </strong> </span>
                            @enderror

                        </div>


                        <div class="form-group ">
                            <label for="details_ar">تفاصيل العرض</label>

                            <textarea class="form-control @error('details_ar') is-invalid @enderror"  name="details_ar" rows="3"></textarea>

                            @error('details_ar')
                            <span class="invalid-feedback"> <strong> {{ $message }} </strong> </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="name_en">Offer Photo</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{old('photo')}}" >

                            @error('name_en')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-danger">Save</button>
                    </form>

                </div>

            @else



                <div class="row justify-content-center">

                    <form class="col-6  py-3 " method="POST" action="{{ route('offers.update',$offer->id) }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name_en">Offer Name</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{$offer->name_en}}" placeholder="Offer Name">

                            @error('name_en')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="name_ar">Offer Name arabic</label>
                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{$offer->name_ar}}" placeholder="اسم العرض">

                            @error('name_ar')
                            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
                            @enderror

                        </div>

                        <div class="input-group ">

                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-money"></i>
                                </div>

                            </div>

                            <input type="text" class="form-control @error('price') is-invalid @enderror " id="price" name="price" value="{{ $offer->price  }}" placeholder="Offer price">

                            @error('price')
                            <span class="invalid-feedback" role="alert"> <strong> {{ $message }} </strong> </span>
                            @enderror
                        </div>




                        <div class="form-group ">
                            <label for="details_en">Offer Details</label>

                            <textarea class="form-control @error('details_en') is-invalid @enderror"  name="details_en" rows="3">{{ $offer->details_en }}

                            </textarea>

                            @error('details_en')
                            <span class="invalid-feedback"> <strong> {{ $message }} </strong> </span>
                            @enderror

                        </div>


                        <div class="form-group ">
                            <label for="details_ar">تفاصيل العرض</label>

                            <textarea class="form-control @error('details_ar') is-invalid @enderror"  name="details_ar" rows="3">  {{ $offer->details_ar }}

                            </textarea>

                            @error('details_ar')
                            <span class="invalid-feedback"> <strong> {{ $message }} </strong> </span>
                            @enderror

                        </div>

                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>

                </div>


        @endif



    </div>



@endsection
