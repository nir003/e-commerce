<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 8/15/2018
 * Time: 8:36 AM
 */
use Illuminate\Support\Facades\Session;


?>



<?php $__env->startSection('admin_content'); ?>






    

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>

                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>


            <div class="box-content">

            </div>

            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Category Desc</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($all_sliders as $slider) { ?>
                    <tr>
                        <td><?php echo e($slider->id); ?></td>
                        <td class="center"><img src="<?php echo e(asset($slider->slider_image)); ?>" style="height: 90px;width: 250px"></td>
                        <td class="center"><?php echo "$slider->slider_desc"; ?></td>
                        <td class="center"><?php echo e(date('M j,Y H:i',strtotime($slider->created_at))); ?></td>
                        <td class="center"><?php echo e($slider->created_by); ?></td>
                        <td class="center">
                            <?php
                            if($slider->publication_status == 1)
                            {
                            ?>
                            <span class="label label-success">Publish</span>
                            <?php
                            }
                            else
                            {
                            ?>
                            <span class="label label-danger">Unpublish</span>
                            <?php
                            }
                            ?>

                        </td>
                        <td class="center">

                            <?php if($slider->publication_status==1): ?>
                                <a class="btn btn-success" href="<?php echo e(URL::to('/slider-status/'.$slider->id)); ?>">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                            <?php else: ?>
                                <a class="btn btn-danger" href="<?php echo e(URL::to('/slider-status/'.$slider->id)); ?>">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            <?php endif; ?>
                            <a class="btn btn-danger" href="<?php echo e(URL::to('/delete-slider/'.$slider->id)); ?>">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->






    
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
                <?php echo Form::open(['url' => '/add-slider','enctype'=>'multipart/form-data','method'=>'post','class'=>'form-horizontal']); ?>

                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">File input</label>

                        <div class="controls">
                            <input class="input-file uniform_on" name="slider_image" id="fileInput" type="file" onchange="loadFile(event)">
                        </div>
                        <div class="controls">
                            <img src="<?php echo e(URL::to('public/backend/img/demo.png')); ?>" style="height: 100px;width: 150px" id="output">
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Slider Description</label>

                        <div class="controls">
                            <textarea name="slider_desc" class="cleditor" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Publication Status:</label>

                        <div class="controls">
                            <select class="span6 typeahead" name="publication_status">
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
                <?php echo Form::close(); ?>


            </div>
        </div>
        <!--/span-->

    </div><!--/row-->



    
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>