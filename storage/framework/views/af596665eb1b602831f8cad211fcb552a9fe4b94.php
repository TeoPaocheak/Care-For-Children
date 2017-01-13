<?php /*This uses Entity Defined Field Controller with method exportProcess*/ ?>

<section id="widget-grid" class="">
    <div class="row">
        <article class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Export Form
                </div>
                <div class="panel-body">
                    <form class="excel-export smart-form" method="post" enctype="multipart/form-data" action='system/edf-export/process'>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <fieldset>
                            <section class="col col-4">
                                <label class="select">
                                    <select class="form-control" name="table-name">
                                        <option value="">--Select--</option>
                                        <?php foreach($tables as $table): ?>
                                            <option value="<?php echo e($table->id); ?>"><?php echo e($table->TableNameEN); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </label>
                            </section>
                            <div id="loading" style="display:none" class="col-sm-1"><i class="fa fa-2x fa-fw fa-lg fa-spin fa-gear"></i></div>
                        </fieldset>
                        <footer>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </footer>
                    </form>
                </div>
            </div>
        </article>
    </div>
</section>

<script type="text/javascript">

    pageSetUp();

    var pageFunction = function () {};

    loadScript('js/libs/jquery-form-3.51.js', pageFunction);

    $(document).ready(function() {});

</script>