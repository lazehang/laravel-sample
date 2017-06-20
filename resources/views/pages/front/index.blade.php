@extends('layouts.front')
@section('title')
    Home
@endsection
@section('content')
    <div class="slider">
        <div id="about-slider">
            <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators visible-xs">
                    <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-slider" data-slide-to="1"></li>
                    <li data-target="#carousel-slider" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{ asset('assets/img/slide1a.jpg') }}" class="img-responsive" alt="">

                    </div>

                    <div class="item">
                        <img src="{{ asset('assets/img/slide1b.jpg') }}" class="img-responsive" alt="">

                    </div>
                    <div class="item">
                        <img src="{{ asset('assets/img/slide1c.jpg') }}" class="img-responsive" alt="">

                    </div>
                </div>

                <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>

                <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div> <!--/#carousel-slider-->
        </div><!--/#about-slider-->
    </div><!--/#slider-->

    <div class="container">
        <div class="intro">
            <h2 class="title">Welcome To Laravel Learning Class</h2>
            <p class="paragraph">
                {!! $desc->description !!}
            </p>
        </div>

        <div class="services">
            <h2 class="title">Series Lessons</h2>
           @if (!empty($contents))
                <ul>
                    @foreach($contents as $content)
                        <li>{{ $content->heading }}</li>
                    @endforeach
                </ul>
            @endif
            @if (empty($contents))
                   <h2 class="text-danger text-center">No Contents !!</h2>
            @endif
        </div>
    </div>

@endsection
