<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 8/14/2018
 * Time: 1:01 AM
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
                        <th>manufacture Name</th>
                        <th>manufacture Desc</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($manufacture as $v_manufacture) { ?>
                    <tr>
                        <td><?php echo e($v_manufacture->id); ?></td>
                        <td class="center"><?php echo e($v_manufacture->manufacture_name); ?></td>
                        <td class="center"><?php echo "$v_manufacture->manufacture_desc"; ?></td>
                        <td class="center"><?php echo e(date('M j,Y H:i',strtotime($v_manufacture->created_at))); ?></td>
                        <td class="center"><?php echo e($v_manufacture->created_by); ?></td>
                        <td class="center">
                            <?php
                            if($v_manufacture->publication_status == 1)
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

                            <?php if($v_manufacture->publication_status==1): ?>
                                <a class="btn btn-success" href="<?php echo e(URL::to('/manufacture_status/'.$v_manufacture->id)); ?>">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                            <?php else: ?>
                                <a class="btn btn-danger" href="<?php echo e(URL::to('/manufacture_status/'.$v_manufacture->id)); ?>">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            <?php endif; ?>

                            <a class="btn btn-info" href="<?php echo e(URL::to('/update-manufacture/'.$v_manufacture->id)); ?>">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="<?php echo e(URL::to('/delete-manufacture/'.$v_manufacture->id)); ?>">
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
                <?php echo Form::open(['url' => '/add_manufacture','method'=>'post','class'=>'form-horizontal']); ?>

                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">manufacture Name: </label>

                        <div class="controls">
                            <input type="text" name="manufacture_name" class="span6 typeahead" >
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">manufacture Description</label>

                        <div class="controls">
                            <textarea name="manufacture_desc" class="cleditor" id="textarea2" rows="3"></textarea>
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






<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>