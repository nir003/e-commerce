<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 8/17/2018
 * Time: 6:21 AM
 */
?>


@include('welcome');
@section('content');


<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{asset($product->product_image)}}" alt=""/>

                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href=""><img
                                                src="{{asset('public/frontend/')}}/images/product-details/similar1.jpg"
                                                alt=""></a>
                                    <a href=""><img
                                                src="{{asset('public/frontend/')}}/images/product-details/similar3.jpg"
                                                alt=""></a>
                                    <a href=""><img
                                                src="{{asset('public/frontend/')}}/images/product-details/similar2.jpg"
                                                alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img
                                                src="{{asset('public/frontend/')}}/images/product-details/similar2.jpg"
                                                alt=""></a>
                                    <a href=""><img
                                                src="{{asset('public/frontend/')}}/images/product-details/similar1.jpg"
                                                alt=""></a>
                                    <a href=""><img
                                                src="{{asset('public/frontend/')}}/images/product-details/similar3.jpg"
                                                alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img
                                                src="{{asset('public/frontend/')}}/images/product-details/similar3.jpg"
                                                alt=""></a>
                                    <a href=""><img
                                                src="{{asset('public/frontend/')}}/images/product-details/similar2.jpg"
                                                alt=""></a>
                                    <a href=""><img
                                                src="{{asset('public/frontend/')}}/images/product-details/similar1.jpg"
                                                alt=""></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="{{asset('public/frontend/')}}/images/product-details/new.jpg" class="newarrival"
                                 alt=""/>

                            <h2>{{$product->product_name}}</h2>

                            <p>Web ID: 1089772</p>
                            <img src="{{asset('public/frontend/')}}/images/product-details/rating.png" alt=""/>
								<span>

                                    <span class="" id="price">{{$product->product_price}}</span> <span>Tk</span>
                                    {!! Form::open(['url' => '/add_to_cart/'.$product->id,'enctype'=>'multipart/form-data','method'=>'post','class'=>'form-horizontal']) !!}

                                    <div class="form-group">

                                        <label class="control-label">Quantity:</label>
                                        <input type="hidden" value="{{$product->product_price}}" id="price_2" name="price_2">
                                        <input type="number" name="quantity" value="1" onchange="countTotal(this)"
                                               class=""/>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fefault cart form-control">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add to cart
                                        </button>
                                    </div>


                                    {!! Form::close() !!}


								</span>

                            <p><b>Availability:</b> In Stock</p>

                            <p><b>Condition:</b> New</p>

                            <p><b>Brand:</b> {{$product->manufacture->manufacture_name}}</p>
                            <a href=""><img src="{{asset('public/frontend/')}}/images/product-details/share.png"
                                            class="share img-responsive" alt=""/></a>
                        </div>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                            <li><a href="#tag" data-toggle="tab">Tag</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details">
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery1.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery2.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery3.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery4.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="companyprofile">
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery1.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery3.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery2.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery4.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tag">
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery1.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery2.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery3.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{asset('public/frontend/')}}/images/home/gallery4.jpg" alt=""/>

                                            <h2>$56</h2>

                                            <p>Easy Polo Black Edition</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure
                                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur.</p>

                                <p><b>Write Your Review</b></p>

                                <form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
                                    <textarea name=""></textarea>
                                    <b>Rating: </b> <img
                                            src="{{asset('public/frontend/')}}/images/product-details/rating.png"
                                            alt=""/>
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/frontend/')}}/images/home/recommend1.jpg"
                                                     alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/frontend/')}}/images/home/recommend2.jpg"
                                                     alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/frontend/')}}/images/home/recommend3.jpg"
                                                     alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/frontend/')}}/images/home/recommend1.jpg"
                                                     alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/frontend/')}}/images/home/recommend2.jpg"
                                                     alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{asset('public/frontend/')}}/images/home/recommend3.jpg"
                                                     alt=""/>

                                                <h2>$56</h2>

                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>


{{--Script For change the total price as per  quantity--}}
<script type="text/javascript">

    function countTotal(elem) {
        var quantity = elem.value;
        var tk = "{{$product->product_price}}";
        var total = tk * quantity;
        document.getElementById('price').innerHTML = total;
        document.getElementById('price_2').value = total;
    }
</script>
@endsection;