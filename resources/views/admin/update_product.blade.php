<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 8/14/2018
 * Time: 6:31 AM
 */
use Illuminate\Support\Facades\Session;

?>


@extends('admin_layout')
@section('admin_content')

    {!! Form::open(['url' => '/save_updateproduct/'.$product->id,'enctype'=>'multipart/form-data','method'=>'post','class'=>'form-horizontal']) !!}


    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>

                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product name </label>

                            <div class="controls">
                                <input type="text" name="product_name" class="span6 typeahead" value="{{$product->product_name}}">
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="fileInput">File input</label>

                            <div class="controls">
                                <input class="input-file uniform_on" name="product_image" id="fileInput" type="file" onchange="loadFile(event)">
                            </div>
                            <div class="controls">
                                <input type="hidden" value="{{asset($product->product_image)}}" name="image">
                                <img src="{{asset($product->product_image)}}"   style="height: 100px;width: 150px" id="output">
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="selectError">Product Category</label>

                            <div class="controls">
                                <select id="selectError" name="category_id" data-rel="chosen">
                                    <option>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{($product->category_id == $category->id )? 'selected':'' }}>{{$category->category_name}}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"  for="selectError">Manufacture Name</label>

                            <div class="controls">
                                <select id="selectError2" name="manufacture_id" data-rel="chosen">
                                    <option>Select Manufacture</option>
                                    @foreach($manufactures as $manufacture)
                                        <option value="{{$manufacture->id}}" {{($product->manufacture_id == $manufacture->id )? 'selected':'' }}>{{$manufacture->manufacture_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="">Product Short Description</label>

                            <div class="controls">
                                <textarea class="" id="" name="product_short_desc"  cols="300" rows="5" style="width: 50%">{{$product->product_short_desc}}</textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Long Description</label>

                            <div class="controls">
                                <textarea class="cleditor" name="product_long_desc" id="textarea2" rows="3">{{$product->product_long_desc}}</textarea>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Price </label>

                            <div class="controls">
                                <input type="text" name="product_price" class="span6 typeahead" value="{{$product->product_price}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Size </label>

                            <div class="controls">
                                <input type="text" name="product_size" class="span6 typeahead" value="{{$product->product_size}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Color </label>

                            <div class="controls">
                                <input type="text" name="product_color" class="span6 typeahead" value="{{$product->product_color}}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError">Publication Status</label>

                            <div class="controls">
                                <select id="" name="publication_status" data-rel="">
                                    <option value="1" {{($product->publication_status ==1)? 'selected':''}}>Publish</option>
                                    <option value="0" {{($product->publication_status ==0)? 'selected':''}}>Unpublished</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>


                    </fieldset>
                </form>

            </div>
        </div>
        <!--/span-->

    </div><!--/row-->
    {!! Form::close() !!}


    {{--.................. End of Body--}}
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>


@endsection