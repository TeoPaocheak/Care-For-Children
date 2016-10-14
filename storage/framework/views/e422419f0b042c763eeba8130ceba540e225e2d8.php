<?php $__env->startSection('content'); ?>
    <!-- widget div-->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 style="display:inline" class="pull-left">
                            <b>Edit User - <?php echo e($user->name); ?></b>
                        </h4>
                        <div class="clearfix"></div>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-7">
                            This is Edit Page
                        </div>
                        <div class="col-md-5">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <?php foreach($errors->all() as $error): ?>
                                        <p><?php echo e($error); ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end widget div -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>