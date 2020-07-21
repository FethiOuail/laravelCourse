@extends('layouts.app')

@section('content')
  
@if (isset($obj))
            

<h3> {{ __('messages.About') }} </h3>



@if ($obj->name == "Fethi Ouail")

<h3 class="content">Yes This is Fethi</h3>

@elseif ($obj->name == "Anwar Ouail")
<h3 class="content">Yes This is Anwar</h3>
@endif





<h3> {{ $obj->name }}</h3>

<h4> {{ $obj->id }}</h4>

@else
    
@endif



<div class="text-center justify-content-center">

<a class="text-bold text-primary text-center "  href="{{ route('login') }}"> Login</a>

</div>


@endsection
    
        
