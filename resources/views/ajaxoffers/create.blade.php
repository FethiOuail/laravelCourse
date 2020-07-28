@extends('layouts.app')

@section('content')

    <div class="alert alert-success " id="msg_success" style="display: none">
        saved succssusfully
    </div>

    <div class="row justify-content-center">

        <form class="col-6  py-3 " id="offerForm" method="POST"  enctype="multipart/form-data">
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

                <textarea class="form-control @error('details_en') is-invalid @enderror" id="details_en" name="details_en" rows="3"></textarea>

                @error('details_en')
                <span class="invalid-feedback"> <strong> {{ $message }} </strong> </span>
                @enderror

            </div>


            <div class="form-group ">
                <label for="details_ar">تفاصيل العرض</label>

                <textarea class="form-control @error('details_ar') is-invalid @enderror" id="details_ar" name="details_ar" rows="3"></textarea>

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

            <a class="btn btn-danger btn-link text-white" id="save_offer">Save</a>
        </form>

    </div>

@stop


@section('scripts')
    <script>

        $(document).on('click', '#save_offer', function (e) {

            e.preventDefault();

            var formData = new FormData($("#offerForm")[0]);

            $.ajax({

                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('ajax.offers.store')}}",
                data: formData,

                processData: false,
                contentType: false,
                cache: false,

                success: function (data) {
                    if (data.status === true) {
                       $("#msg_success").show();
                    }

                },
                error: function () {

                }

            });

        })




    </script>



<!--

       /*

          data: {
                    '_token': " csrf_token() ",
                  //  'photo': $("#photo").val(),,
                    'name_ar':    $("#name_ar").val(),
                    'name_en':    $("#name_en").val(),
                    'price':      $("#price").val(),
                    'details_ar': $("#details_ar").val(),
                    'details_en': $("#details_en").val(),





                },
         */

-->

@stop


