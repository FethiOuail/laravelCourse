@extends('layouts.app')


@section('content')


    <div class="container">




    <div class="alert alert-success " id="msg_success" style="display: none">
        saved succssusfully
    </div>


    <div class="row justify-content-center">


        <table class="table  table-hover table-bordered " >
            <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col"> {{ __('messages.offer name')  }} </th>
                <th scope="col"> {{ __('messages.offer price')  }} </th>
                <th scope="col"> {{ __('messages.offer details')  }} </th>
                <th scope="col"> {{ __('messages.offer images')  }} </th>
                <th scope="col">{{ __('messages.action')  }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offers as $offer)
                <tr class="offerRow{{$offer->id}}">
                    <th scope="row">{{ $offer->id  }}</th>
                    <td> {{ $offer->name }} </td>
                    <td> {{ $offer->price }} </td>
                    <td> {{ $offer->details }} </td>
                    <td>
                        <img src="{{ asset('/images/offers/'.$offer->photo )  }}" width="100" height="100">

                    </td>
                    <td>

                        <a href="{{route('offer.edit',$offer->id)}}" class="btn btn-primary btn-sm"> {{ __('messages.edit') }} </a>
                        <a href="{{route('offer.delete',$offer->id)}}" class="btn btn-danger btn-sm"> {{ __('messages.delete') }}</a>
                        <a  offer_id="{{$offer->id}}"  class="btn btn-success btn-sm deleteBtn">AjaxDelete</a>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>


    </div>

    </div>

@stop

@section('scripts')
    <script>

        $(document).on('click', '.deleteBtn', function (e) {

            e.preventDefault();

            var offer_id = $(this).attr('offer_id');

            console.log(offer_id);

            $.ajax({

                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('ajax.offers.delete')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id':offer_id
                },



                success: function (data) {
                    if (data.status === true) {
                        $("#msg_success").show();

                        $('.offerRow'+data.id).remove();
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
