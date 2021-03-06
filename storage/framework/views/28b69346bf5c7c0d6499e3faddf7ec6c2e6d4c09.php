<?php
/**
 * Created by PhpStorm.
 * User: Nirjhor
 * Date: 8/14/2018
 * Time: 6:30 AM
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
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Category Name</th>
                        <th>Manufactured By</th>

                        
                        
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach($products as $product) {
                    ?>
                    <tr>
                        <td><?php echo e($i); ?></td>
                        <td class="center"><?php echo e($product->product_name); ?></td>
                        <td class="center"><a href="<?php echo e(URL::to($product->product_image)); ?>"><img src="<?php echo e(asset($product->product_image)); ?>" style="height: 100px;width: 100px"></a></td>
                        <td class="center"><?php echo e($product->product_size); ?></td>
                        <td class="center"><?php echo e($product->product_color); ?></td>
                        <td class="center"><?php echo e($product->product_price); ?></td>

                        <td class="center"><?php echo e($product->category->category_name); ?></td>
                        <td class="center"><?php echo e($product->manufacture->manufacture_name); ?></td>

                        

                        <td class="center">

                            <?php if($product->publication_status==1): ?>
                                <a class="btn btn-success" href="<?php echo e(URL::to('/product_status/'.$product->id)); ?>">
                                    <i class="halflings-icon white thumbs-up"></i>
                                </a>
                            <?php else: ?>
                                <a class="btn btn-danger" href="<?php echo e(URL::to('/product_status/'.$product->id)); ?>">
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                            <?php endif; ?>

                            <a class="btn btn-info" href="<?php echo e(URL::to('/update-product/'.$product->id)); ?>">
                                <i class="halflings-icon white edit"></i>
                            </a>
                            <a class="btn btn-danger" href="<?php echo e(URL::to('/delete-product/'.$product->id)); ?>">
                                <i class="halflings-icon white trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++;} ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/span-->

    </div><!--/row-->















<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>