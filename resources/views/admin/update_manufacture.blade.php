<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 8/14/2018
 * Time: 2:35 AM
 */

use Illuminate\Support\Facades\Session;

?>


@extends('admin_layout')
@section('admin_content')

    {{--Add Category--}}
    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Manufacture</h2>

                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>

            <div class="box-content">
                {!! Form::open(['url' => '/save_updatemanufacture/'.$manufacture->id,'method'=>'post','class'=>'form-horizontal']) !!}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">manufacture Name: </label>

                        <div class="controls">
                            <input type="text" name="manufacture_name" class="span6 typeahead" id="typeahead" value="{{$manufacture->manufacture_name}}"
                                   data-provide="typeahead" data-items="4" data-source='["Men","Women","child"]'>

                            <p class="help-block">Start typing to activate auto complete!</p>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">manufacture Description</label>

                        <div class="controls">
                            <textarea name="manufacture_desc" class="cleditor" id="textarea2" rows="3" >{{$manufacture->manufacture_desc}}</textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Publication Status:</label>

                        <div class="controls">
                            <select class="span6 typeahead" name="publication_status">
                                <option value="1" {{($manufacture->publication_status == 1) ?  'selected' : ''}} >Publish</option>
                                <option value="0" {{($manufacture->publication_status == 0) ?  'selected' : ''}}  >Unpublish</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="{{URL::to('/all-manufactures')}}" class="btn">Cancel</a>
                    </div>
                </fieldset>
                {!! Form::close() !!}

            </div>
        </div>
        <!--/span-->

    </div><!--/row-->

@endsection

