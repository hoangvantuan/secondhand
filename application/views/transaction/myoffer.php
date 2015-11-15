<?php
$this->load->view('layout/header'); ?>
<?php
$this->load->view('layout/navigation'); ?>
<!-- END: include Header -->
<!-- BEGIN CONTENT -->
<!-- BEGIN: Send Offer -->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Send Offer</h3>
        </div>
        <!-- Begin All content -->
        <div class="panel-body">
            <!-- Begin : 1 Content -->
            <?php if($send != null) : ?>
            <?php foreach( $send as $tran): ?>
            <div class="row col-md-12">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <!-- Left product -->
                        <div class="offer-left col-md-4">
                            <div class="thumbnail row">
                                <div class="col-md-6">
                                     <a href="<?php echo base_url('index.php/cproduct/details?id='.$tran['srcProduct']->id) ?>"><img src="<?php echo base_url($tran['srcProduct']->image) ?>" alt="left-product" class="img-responsive offer-product"  ></a>
                                </div>
                                <div class="col-md-6 caption">
                                    <p class="text-info"><?php echo $tran['srcProduct']->name ?></p>
                                    <p class="text-info"><?php echo $tran['srcProduct']->description ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- End left product -->
                        <!-- Icon trade -->
                        <div class="trade-icon col-md-4 text-center">
                            <img src="<?php echo base_url("assets/image/common/swap.png") ?>" alt="icon-trade" class="img-responsive" style="margin:0 auto;" width="50" height="50">
                            <br>
                         <!-- delete Offer -->
                            <a href="#">Cancle</a>
                        <!-- End delete offer -->
                        </div>
                        <!-- End icon  -->
                        <!-- right prroduct -->
                        <div class="offer-right col-md-4">
                             <div class="thumbnail row">
                                <div class="col-md-6">
                                     <a href="<?php echo base_url('index.php/cproduct/details?id='.$tran['desProduct']->id) ?>"><img src="<?php echo base_url($tran['desProduct']->image) ?>" alt="left-product" class="img-responsive offer-product"  ></a>
                                </div>
                                <div class="col-md-6 caption">
                                    <p class="text-info"><?php echo $tran['desProduct']->name ?></p>
                                    <p class="text-info"><?php echo $tran['desProduct']->description ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- End right product -->

                    </div>
                </div>
            </div>
            <?php endforeach ?>
             <?php else: ?>
                <p class="text-warning">You dont send any offer</p>
            <?php endif ?>
            <!-- End 1 content -->
        </div>
        <!-- End All content -->
    </div>
</div>
<!-- END Send Offer -->
<!-- BEGIN: Reciver Offer -->
<div class="container">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Receiver Offer</h3>
        </div>
        <!-- Begin All content -->
        <div class="panel-body">
            <?php if($receive != null): ?>
            <!-- Begin : 1 Content -->
            <?php foreach ($receive as $tran): ?>
            <div class="row col-md-12">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <!-- Left product -->
                        <div class="offer-left col-md-4">
                            <div class="thumbnail">
                                <img src="#" alt="left-product" class="img-responsive">
                                <div class="caption">
                                    <p>Source product</p>
                                </div>
                            </div>
                        </div>
                        <!-- End left product -->
                        <!-- Icon trade -->
                        <div class="trade-icon col-md-4 text-center">
                            <img src="<?php echo base_url("assets/image/common/swap.png") ?>" alt="icon-trade" class="img-responsive" width="50" height="50" style="margin:0 auto;">
                            <br>
                        <!-- delete Offer -->
                        <div class="text-center">
                            <a href="#" title="" class="">Accept</a>
                            &nbsp;&nbsp;&nbsp;
                            <a href="#" title="" class="">Refuse</a>
                        </div>
                        <!-- End delete offer -->
                        </div>
                        <!-- End icon  -->
                        <!-- right prroduct -->
                        <div class="offer-right col-md-4">
                            <div class="thumbnail">
                                <img src="#" alt="right-product" class="img-responsive">
                                <div class="caption">
                                    <p>Destination product</p>
                                </div>
                            </div>
                        </div>

                        <!-- End right product -->
                    </div>
                </div>
            </div>
        <?php endforeach ?>
            <?php else: ?>
                    <p class="text-warning">You dont receive any offer</p>
            <?php endif ?>
            <!-- End 1 content -->
        </div>
        <!-- End All content -->
    </div>
</div>
<!-- END Send Offer -->
<!-- END CONTENT -->
<!-- BEGIN: FOOTER -->
<?php
$this->load->view('layout/footer'); ?>
<!-- END: FOOTER -->