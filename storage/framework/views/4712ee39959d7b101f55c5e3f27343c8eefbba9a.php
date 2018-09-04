<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 8/14/2018
 * Time: 9:29 AM
 */
use Illuminate\Support\Facades\Session;

?>



<?php $__env->startSection('admin_content'); ?>

    <?php echo Form::open(['url' => '/add_product','enctype'=>'multipart/form-data','method'=>'post','class'=>'form-horizontal']); ?>



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
                                <input type="text" name="product_name" class="span6 typeahead">
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="fileInput">File input</label>

                            <div class="controls">
                                <input class="input-file uniform_on" name="product_image" id="fileInput" type="file" onchange="loadFile(event)">
                            </div>
                            <div class="controls">
                                <img src="<?php echo e(URL::to('public/backend/img/demo.png')); ?>" style="height: 100px;width: 150px" id="output">
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="selectError">Product Category</label>

                            <div class="controls">
                                <select id="selectError" name="category_id" data-rel="chosen">
                                    <option>Select Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"  for="selectError">Manufacture Name</label>

                            <div class="controls">
                                <select id="selectError2" name="manufacture_id" data-rel="chosen">
                                    <option>Select Manufacture</option>
                                    <?php $__currentLoopData = $manufactures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($manufacture->id); ?>"><?php echo e($manufacture->manufacture_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>


                        <div class="control-group hidden-phone">
                            <label class="control-label" for="">Product Short Description</label>

                            <div class="controls">
                                <textarea class="" id="" name="product_short_desc" cols="300" rows="5" style="width: 50%"></textarea>
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Long Description</label>

                            <div class="controls">
                                <textarea class="cleditor" name="product_long_desc" id="textarea2" rows="3"></textarea>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Price </label>

                            <div class="controls">
                                <input type="text" name="product_price" class="span6 typeahead">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Size </label>

                            <div class="controls">
                                <input type="text" name="product_size" class="span6 typeahead">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="typeahead">Product Color </label>

                            <div class="controls">
                                <input type="text" name="product_color" class="span6 typeahead">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError">Publication Status</label>

                            <div class="controls">
                                <select id="" name="publication_status" data-rel="">
                                    <option value="1">Publish</option>
                                    <option value="0">Unpublished</option>
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
    <?php echo Form::close(); ?>



    
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>