
<!-- BEGIN: CONTENT -->
<div class="container">
    <div class="row">
        <!-- Load side bar category -->
        <div class="col-md-4">
            <?php $this->load->view('layout/left_side_bar'); ?>
        </div>
        <!-- END load side bar -->
        <!-- BEGIN: Right content -->
        <div class="col-md-8">
            <!-- BEGIN info of 1 product -->
            <?php foreach($product as $value):?>

                <div class="col-md-3">
                    <div class="thumbnail">
                        <a  href="<?php echo base_url('index.php/cproduct/details?id='.$value->id) ?>"><img src="<?php echo base_url($value->image) ?>" alt="product" class="img-responsive img-product"</a>                        <div class="caption">
                            <p><a href="<?php echo base_url('index.php/cproduct/details/'.$value->id) ?>"><?php echo $value->name ?></a></p>
                            <p class="text-warning">Status: <?php echo  $value->status?></p>
                            <p><?php echo $value->description ?></p>
                        </div>
                    </div>
                </div>

        <?php endforeach ?>
            <!-- END: info of 1 product -->
        </div>
    </div>
</div>