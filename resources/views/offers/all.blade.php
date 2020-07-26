@extends('layouts.app')


@section('content')



    <div class="container">


        @if(session()->has('success'))

            <div class="alert alert-success" role="alert"> {{ session()->get('success')  }} </div>

        @endif

        <div class="row justify-content-center">


            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">price</th>
                    <th scope="col">details</th>
                    <th scope="col">action</th>
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

                        <button class="btn btn-primary"> Edit </button>
                        <button class="btn btn-danger"> Delete </button>
                    </td>

                </tr>
                @endforeach

                </tbody>
            </table>

    </div>



@endsection
