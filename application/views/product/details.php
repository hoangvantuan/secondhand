<!-- BEIGIN: INCLUDE header -->
<?php require_once('header.php') ?>
<?php require_once('navigation.php') ?>
<!-- END: include Header -->
<!-- BEGIN CONTENT -->
<div class="container">
    <!-- Info of product and user -->
    <div class="col-md-6">
        <!-- User info -->
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">User profile</h3>
            </div>
            <div class="panel-body">
                <!-- Left info : image, avatar -->
                <div class="col-md-4">
                    <img src="#" alt="avatar" class="img-responsive img-circle">
                </div>
                <!-- Right info: more about: name, day... -->
                <div class="col-md-8">
                    <p><strong>Account: </strong>tuankatty</p>
                    <p><strong>Address: </strong>Address here</p>
                    <p><strong>Phone number: </strong>Phone number here</p>
                    <p><strong>Email: </strong>hoangtuanbka93@gmail.com</p>
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
                    <img src="#" alt="product iname" class="img-responsive img-circle">
                </div>
                <!-- Right info: more about: name, day... -->
                <div class="col-md-8">
                    <p><strong>Name product: </strong>Name product</p>
                    <p><strong>Category: </strong>Category</p>
                    <p><strong>Number: </strong>number here</p>
                </div>
                <p><strong>More about: </strong></p>
                <textarea  id="moreabout" cols="50" rows="10" disabled="true"></textarea>
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
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Content All list product -->
            <div role="tabpanel" class="tab-pane active" id="all">
                <!-- BEGIN info of 1 product -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="#" alt="product" class="img-responsive">
                            <div class="caption">
                                <p>All this is description</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: info of 1 product -->
            </div>
            <!-- End all -->
            <!-- Content suggess list product -->
            <div role="tabpanel" class="tab-pane" id="suggess">
                <!-- BEGIN info of 1 product -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="thumbnail">
                            <img src="#" alt="product" class="img-responsive">
                            <div class="caption">
                                <p>Suggess this is description</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: info of 1 product -->
            </div>
            <!-- End suggess -->
        </div>
    </div>
    <!-- End list product -->
</div>
<!-- END CONTENT -->
<!-- BEGIN: FOOTER -->
<?php require_once('footer.php') ?>
<!-- END: FOOTER