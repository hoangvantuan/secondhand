<?php
$this->load->view('layout/header'); ?>
<?php
$this->load->view('layout/navigation'); ?>
<!-- END: include Header -->
<!-- BEGIN CONTENT -->
<div class="container">
    <div class="row">
        <!-- B: Trade -->
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="glyphicon glyphicon-refresh"></i>&nbsp;My Trades</h3>
                </div>
                <div class="panel-body">
                <p class="text-danger"><?php echo $transaction == null ? 'You don have any transaction' : '' ?></p>
                <?php if($transaction != null): ?>
                <?php foreach($transaction as $tran): ?>
                    <!-- one Trade -->
                    <div class="row">
                        <!-- Left product -->
                        <div class="trade-left col-md-4">
                        <p class="text-primary">From: <a href="<?php echo base_url('index.php/cuser?id='. $tran['srcProduct']->user->id) ?>"> <?php echo $tran['srcProduct']->user->username?></a></p>

                            <div class="thumbnail">
                                <a href="<?php echo base_url('index.php/cproduct/details?id='.$tran['srcProduct']->id) ?>"><img src="<?php echo base_url($tran['srcProduct']->image) ?>" alt="left-product" class="img-responsive offer-product"></a>
                                <div class="caption">
                                    <p class="text-success"><?php echo $tran['srcProduct']->name ?></p>
                                    <p class="text-info"><?php echo $tran['srcProduct']->description ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Icon trade -->
                        <div class="trade-icon col-md-4 text-center">
                            <img src="<?php echo base_url("assets/image/common/swap.png") ?>" alt="icon-trade" class="img-responsive" width="50" height="50" style="margin:0 auto;">
                        </div>
                        <!-- right prroduct -->
                        <div class="trade-right col-md-4">
                         <p class="text-primary">To: <a href="<?php echo base_url('index.php/cuser?id='. $tran['desProduct']->user->id) ?>"> <?php echo $tran['desProduct']->user->username?></a></p>
                            <div class="thumbnail">
                                 <a href="<?php echo base_url('index.php/cproduct/details?id='.$tran['desProduct']->id) ?>"><img src="<?php echo base_url($tran['desProduct']->image) ?>" alt="right-product" class="img-responsive offer-product"></a>
                                <div class="caption">
                                    <p class="text-success"><?php echo $tran['desProduct']->name ?></p>
                                    <p class="text-info"><?php echo $tran['desProduct']->description ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
                    <!-- End one trade -->
                </div>
            </div>
        </div>
        <!-- E: Trade -->
    </div>
</div>
<!-- END CONTENT -->
<!-- BEGIN: FOOTER -->
<?php
$this->load->view('layout/footer'); ?>
<!-- END: FOOTER -->