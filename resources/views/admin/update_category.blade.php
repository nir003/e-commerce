<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 8/13/2018
 * Time: 6:29 AM
 */
use Illuminate\Support\Facades\Session;


?>


@extends('admin_layout')
@section('admin_content')

    {{--Add Category--}}
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add New Category</h2>

                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>

            <div class="box-content">
                {!! Form::open(['url' => '/save_updatecategory/'.$category->id,'method'=>'post','class'=>'form-horizontal']) !!}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Catgory Name: </label>

                        <div class="controls">
                            <input type="text" name="category_name" class="span6 typeahead" id="typeahead" value="{{$category->category_name}}"
                                   data-provide="typeahead" data-items="4" data-source='["Men","Women","child"]'>

                            <p class="help-block">Start typing to activate auto complete!</p>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>

                        <div class="controls">
                            <textarea name="category_desc" class="cleditor" id="textarea2" rows="3" >{{$category->category_desc}}</textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Publication Status:</label>

                        <div class="controls">
                            <select class="span6 typeahead" name="publication_status">
                                <option value="1" {{($category->publication_status == 1) ?  'selected' : ''}} >Publish</option>
                                <option value="0" {{($category->publication_status == 0) ?  'selected' : ''}}  >Unpublish</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="{{URL::to('/all-categories')}}" class="btn">Cancel</a>
                    </div>
                </fieldset>
                {!! Form::close() !!}

            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

@endsection
