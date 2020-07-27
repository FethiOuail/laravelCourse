@extends('layouts.app')


@section('content')



    <div class="container">


        @if(session()->has('success'))

            <div class="alert alert-success" role="alert"> {{ session()->get('success')  }} </div>

        @endif

            @if(session()->has('error'))

                <div class="alert alert-danger" role="alert"> {{ session()->get('error')  }} </div>

            @endif

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
                <tr>
                    <th scope="row">{{ $offer->id  }}</th>
                    <td> {{ $offer->name }} </td>
                    <td> {{ $offer->price }} </td>
                    <td> {{ $offer->details }} </td>
                    <td>
                        <img src="{{ url('/images/offers/'.$offer->photo )  }}" width="100" height="100">

                    </td>
                    <td>

                        <a href="{{route('offer.edit',$offer->id)}}" class="btn btn-primary btn-sm"> {{ __('messages.edit') }} </a>
                        <a href="{{route('offer.delete',$offer->id)}}" class="btn btn-danger btn-sm"> {{ __('messages.delete') }}</a>
                    </td>

                </tr>
                @endforeach

                </tbody>
            </table>

    </div>




@endsection
