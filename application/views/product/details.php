<?php
$this->load->view('layout/header');
$this->load->view('layout/navigation');
?>
<!-- BEGIN CONTENT -->
<div class="container">
    <!-- Info of product and user -->

    <div class="col-md-6">
     <a href="javascript:goback()" title="">Back</a>
        <!-- User info -->
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">User profile</h3>
            </div>
            <div class="panel-body">
                <!-- Left info : image, avatar -->
                <div class="col-md-4">
                    <img src="<?php echo base_url($user->avatar) ?>" alt="avatar" class="img-responsive" width="100">
                </div>
                <!-- Right info: more about: name, day... -->
                <div class="col-md-8">
                    <p><strong>Account: </strong><a href="<?php echo base_url('index.php/cuser/?id='.$user->id) ?>"><?php echo $user->username?></p></a>
                    <p><strong>Address: </strong><?php echo $user->address?></p>
                    <p><strong>Phone number: </strong><?php echo $user->phonenumber?></p>
                </div>
            </div>
        </div>
        <!--  End user info -->
        <!-- Product info -->
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Product info</h3>
            </div>
            <div class="panel-body">
                <!-- Left info : image, avatar -->
                <div class="col-md-4">
                    <img src="<?php
echo base_url($product->image) ?>" alt="product iname" class="img-responsive img-product">
                </div>
                <!-- Right info: more about: name, day... -->
                <div class="col-md-8">
                    <p><strong>Name product: </strong><?php
echo $product->name
?></p>
                    <p><strong>Category: </strong><?php
echo $category_name
?></p>
                    <p><strong>Status: </strong><?php
echo $product->status
?></p>
                    <p><strong>More about: </strong></p>
                    <textarea  id="moreabout" cols="40" rows="10" disabled="true"><?php
echo $product->description
?></textarea>
            </div>
                </div>

        </div>
        <!-- End product info -->
    </div>
    <!-- End info of product nad user -->
    <!-- List product can be swap: All or suggess -->
    <div class="col-md-6">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All</a></li>
            <li role="presentation"><a href="#suggess" aria-controls="suggess" role="tab" data-toggle="tab">Suggess</a></li>
        </ul>
        <br>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Content All list product -->
            <div role="tabpanel" class="tab-pane active" id="all">
                <!-- BEGIN info of 1 product -->

                <?php if($all !=null): ?>

                <div class="row">
                  <?php foreach($all as $productAll): ?>
                    <?php if($productAll->status != 'Changed' && $product->status != 'Changed' && $productAll->status != 'Waiting' && $product->status != 'Waiting'): ?>
                    <div class="col-md-4">
                        <div class="thumbnail home-product">
                            <a href="<?php echo base_url('index.php/cproduct/details?id='.$productAll->id) ?>"><img src="<?php echo base_url($productAll->image) ?>" alt="product" class="img-responsive img-product"></a>
                            <div class="caption">
                                <p><?php echo $productAll->description ?></p>
                            </div>
                            <a class="btn btn-warning" href="<?php echo $isMe ? base_url('index.php/ctransaction?srcId='.$product->id.'&amp;desId='.$productAll->id) : base_url('index.php/ctransaction?srcId='.$productAll->id.'&amp;desId='.$product->id)  ?>"><i class="glyphicon glyphicon-refresh"></i>Change</a>
                        </div>
                    </div>
                <?php endif ?>
                 <?php endforeach ?>
                </div>
            <?php else: ?>
                <?php if($this->session->userdata('id')): ?>
                <p class="text-warning">Dont have any product</p>
                <?php else: ?>
                <p class="text-warning">Login to change product</p>
                <?php endif ?>
            <?php endif ?>
                <!-- END: info of 1 product -->
            </div>
            <!-- End all -->
            <!-- Content suggess list product -->
            <div role="tabpanel" class="tab-pane" id="suggess">
                <!-- BEGIN info of 1 product -->
                <?php if($suggess != null): ?>

                <div class="row">
                  <?php foreach($suggess as $productSucgess): ?>
                    <?php if($productSucgess->status != 'Changed' && $product->status != 'Changed' && $productSucgess->status != 'Waiting' && $product->status != 'Waiting' ): ?>
                    <div class="col-md-4">
                        <div class="thumbnail home-product">
                            <img src="<?php echo base_url($productSucgess->image) ?>" alt="product" class="img-responsive img-product">
                            <div class="caption">
                                <p><?php  echo $productSucgess->description ?></p>
                            </div>
                          <a class="btn btn-warning" href="<?php echo $isMe ? base_url('index.php/ctransaction?srcId='.$product->id.'&amp;desId='.$productSucgess->id) : base_url('index.php/ctransaction?srcId='.$productSucgess->id.'&amp;desId='.$product->id)  ?>"><i class="glyphicon glyphicon-refresh"></i>Change</a>
                        </div>
                    </div>
                <?php endif ?>
                <?php endforeach ?>
                </div>

            <?php else: ?>
                 <?php if($this->session->userdata('id')): ?>
                <p class="text-warning">Dont have any product</p>
                <?php else: ?>
                <p class="text-warning">Login to change product</p>
                <?php endif ?>
            <?php endif ?>
                <!-- END: info of 1 product -->
            </div>
            <!-- End suggess -->
        </div>
    </div>
    <!-- End list product -->
</div>
<!-- END CONTENT -->
<?php
$this->load->view('layout/footer'); ?>