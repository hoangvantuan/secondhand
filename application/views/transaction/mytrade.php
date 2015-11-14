<!-- BEIGIN: INCLUDE header -->
<?php require_once('header.php') ?>
<?php require_once('navigation.php') ?>
<!-- END: include Header -->
<!-- BEGIN CONTENT -->
<div class="container">
    <div class="row">
        <!-- B: side bar -->
        <div class="col-md-4">
            <?php require_once('left_side_bar.php') ?>
        </div>
        <!-- E: side bar -->
        <!-- B: Trade -->
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-refresh"></i>&nbsp;My Trades</h3>
                </div>
                <div class="panel-body">
                    <!-- one Trade -->
                    <div class="row">
                        <!-- Left product -->
                        <div class="trade-left col-md-4">
                            <div class="thumbnail">
                                <img src="#" alt="left-product" class="img-responsive">
                                <div class="caption">
                                    <p>this is description</p>
                                </div>
                            </div>
                        </div>
                        <!-- Icon trade -->
                        <div class="trade-icon col-md-4 text-center">
                            <img src="#" alt="icon-trade" class="img-responsive">
                        </div>
                        <!-- right prroduct -->
                        <div class="trade-right col-md-4">
                            <div class="thumbnail">
                                <img src="#" alt="right-product" class="img-responsive">
                                <div class="caption">
                                    <p>this is description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End one trade -->
                </div>
            </div>
        </div>
        <!-- E: Trade -->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN: FOOTER -->
<?php require_once('footer.php') ?>
<!-- END: FOOTER