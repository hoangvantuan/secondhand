<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navigation'); ?>
<!-- BEGIN CONTENT -->
<div class="container">
    <div class="row">
        <!-- B: Trade -->
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-refresh"></i>&nbsp;My Trade</h3>
                </div>
                <div class="panel-body">
                    <!-- one Trade -->
                    <div class="row">
                        <!-- Left product -->
                        <div class="trade-left col-md-4">
                            <div class="thumbnail">
                                <a href="<?php echo base_url('index.php/cproduct/details?id='.$srcProduct->id) ?>"><img src="<?php echo base_url($srcProduct->image) ?>" alt="left-product" class="img-responsive img-product"></a>
                                <div class="caption">
                                    <p>Status: <?php echo $srcProduct->status ?></p>
                                    <p><?php echo $srcProduct->description ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Icon trade -->
                        <div class="trade-icon col-md-4 text-center">
                            <div>
                                <a href="#">
                                <img src='<?php echo base_url("assets/image/common/swap.png") ?>' alt="icon-trade" class="img-responsive text-center" height="50" width="50" >
                                </a>
                            </div>
                        </div>
                        <!-- right prroduct -->
                        <div class="trade-right col-md-4">
                            <div class="thumbnail">
                                 <a href="<?php echo base_url('index.php/cproduct/details?id='.$desProduct->id) ?>"><img src="<?php echo base_url($desProduct->image) ?>" alt="right-product" class="img-responsive img-product"></a>
                                <div class="caption">
                                   <p>Status: <?php echo $desProduct->status ?></p>
                                    <p><?php echo $desProduct->description ?></p>
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
<?php $this->load->view('layout/footer'); ?>