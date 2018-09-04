<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 8/17/2018
 * Time: 8:05 PM
 */
use Gloudemans\Shoppingcart\Facades\Cart;

?>

@extends('welcome')
@section('content')

    <section id="cart_items">
        <div class="">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Name</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart_contents as $cart_item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{url($cart_item->options->image)}}"><img
                                            src="{{asset($cart_item->options->image)}}" alt=""
                                            style="height: 100px;width: 80px"></a>
                            </td>
                            <td class="cart_name">
                                <h4><a href=""> {{$cart_item->name}} </a></h4>

                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p> {{$cart_item->price}} TK</p>
                            </td>

                            {!! Form::open(['url' => '/cart_quantity_update/'.$cart_item->rowId,'enctype'=>'multipart/form-data','method'=>'post','class'=>'form-horizontal']) !!}

                            <td class="cart_quantity">
                                <div class="row">
                                    <div class="cart_quantity_button hover">
                                        <a class="cart_quantity_up"
                                           href="{{URL::to('/cart_quantity_up/'.$cart_item->rowId.'/'.$cart_item->qty)}}">
                                            + </a>
                                        <input class="cart_quantity_input" type="text" name="qty"
                                               value=" {{$cart_item->qty}}" autocomplete="off" size="3">
                                        <a class="cart_quantity_down"
                                           href="{{URL::to('/cart_quantity_down/'.$cart_item->rowId.'/'.$cart_item->qty)}}">
                                            - </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <input class="btn btn-primary " type="submit"  value="Set The Quantity">
                                    </div>
                                </div>

                            </td>
                            {!! Form::close() !!}
                            <td class="cart_total">
                                <p class="cart_total_price"> {{$cart_item->total}} TK</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete"
                                   href="{{URL::to('delete_item_from_cart/'.$cart_item->rowId)}}"><i
                                            class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>

                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>
            <div class="row">

                <div class="col-sm-8">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>{{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-8">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->


@endsection
