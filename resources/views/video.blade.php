@extends('layouts.app')

@section('content')


    <div class="container ">



    <div class="">
        Video Viewer ({{ $video->viewers }})
    </div>

    <iframe width="560" height="315" src="https://www.youtube.com/embed/G2Q1Tf-Zj94" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



    </div>


@endsection


