@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron text-center my-3">
        <h1>welcome to GLUE </h1>
        <img src="logo.png" style="height:100px;">
        <p>Where you find information</p>
    </div>

    <div class="container">
        <div>
            <img src="" alt="">

        </div>
        <div class="autoplay">
            @foreach($activities as $act)
                <div style="display: flex; justify-content: center; overflow: hidden; weight:500px; align-items:center; flex-direction: column; align-items:center;"> 
                    <img style=" flex: none" src="/storage/cover_images/{{$act->cover_image}}">
                <p style="font-size: 16px; font-weight: 700px; line-height: 1.5; margin-top: 40px; text-align:center;">{{$act->title}}</p>  
                <a href="acts/{{$act->id}}" class="btn btn-info mb-5">READ MORE</a>
                </div>
            @endforeach
        </div>
        <hr>
    </div>
</div>

<script type="text/javascript" src="/assets/slick/slick.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.autoplay').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1000,
  captions: true,
  dots: true,
  adaptiveHeight: true,
});
    });
  </script>


@endsection

