<!-- row -->
<div class="row">
    <!-- NEW WIDGET START -->
    <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- end widget -->

        <!-- Widget ID (each widget will need unique ID)-->
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-2" data-widget-editbutton="false">
            <!-- widget options:
            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

            data-widget-colorbutton="false"
            data-widget-editbutton="false"
            data-widget-togglebutton="false"
            data-widget-deletebutton="false"
            data-widget-fullscreenbutton="false"
            data-widget-custombutton="false"
            data-widget-collapsed="true"
            data-widget-sortable="false"

            -->
            <header style="height: 50px">
                <span class="widget-icon"> <i class="fa fa-users fa-2x" style="padding: 10px 0 0 10px"></i> </span>
                <h1 style="padding-left: 50px">User Management
                    <a href="#users/create" class="pull-right" style="padding-right: 10px ;!important; cursor: pointer;"><i class="fa fa-plus "></i></a>
                </h1>
                <div class="clearfix"></div>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->
            <!-- end widget -->

    </article>
    <!-- WIDGET END -->

</div>
<!-- end row -->
<style>
    tr{
        cursor: pointer;
    }
    tr:hover{
        color: #0066cc;
    }
</style>

