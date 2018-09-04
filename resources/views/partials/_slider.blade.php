@extends('welcome')
@section('slider')


<div class="container">
    <div class="row">
        <div class="col-sm-12" >
            <div id="slider-carousel" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                    <?php $i = 0; ?>
                    @foreach($sliders as $slider)
                        <li data-target="#slider-carousel" data-slide-to="{{$i}}" class="{{($i==0)? 'active':''}}"></li>
                        <?php $i++; ?>
                    @endforeach
                </ol>

                <div class="carousel-inner" >
                    <?php $i = 1; ?>
                    @foreach($sliders as $slider)
                        <div class="item {{($i==1)? 'active':''}}">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>

                                <h2>Free E-Commerce Template</h2>

                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{asset($slider->slider_image)}}" class="girl img-responsive" alt=""
                                     style="height: 50%;width: 100%"/>
                                <img src="{{asset('public/frontend/')}}/images/home/pricing.png" class="pricing"
                                     alt=""/>
                            </div>
                        </div>
                        <?php $i++; ?>
                    @endforeach

                </div>

                <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>
    </div>
</div>

@endsection