
<!-- BEGIN: CONTENT -->
<div class="container">
    <!-- BEGIN: above content info -->
    <div class="row">
        <!-- BEGIN: right content -->
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <!-- Title -->
                    <h3 class="panel-title"><i class="glyphicon glyphicon-user"></i>&nbsp;Account details</h3>
                </div>
                <!-- CONTENT -->
                <div class="panel-body">
                    <!-- Left info : image, avatar -->
                    <div class="col-md-4">
                        <img src='<?php echo base_url($user->avatar) ?>' alt="avatar" class="img-responsive" width="100">
                    </div>
                    <!-- Right info: more about: name, day... -->
                    <div class="col-md-8">
                        <p><strong>User id: </strong><?php echo $user->id ?></p>
                        <p><strong>Account: </strong><?php echo $user->username ?></p>
                        <p><strong>Address: </strong><?php echo $user->address ?></p>
                        <p><strong>Phone</strong><?php echo $user->phonenumber ?></p>
                        <a href="#" data-toggle="modal" class="" data-target="#edit_user" title="">Edit</a>
                    </div>
                </div>
                <!-- End content -->
            </div>
        </div>
        <!-- END right content -->
    </div>
    <!-- END: above content info -->
</div>
</div>
<!-- END: CONTENT -->
