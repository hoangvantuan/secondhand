<!--BEGIN: HEADER  -->
<header>
<!-- BEGIN navigation -->
<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <!-- Logo website -->
        <a class="navbar-brand" href="<?php echo base_url() ?>">The Secondhand</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <!--Link to home page  -->
            <li ><a href="<?php echo base_url() ?>">Home</a></li>
        </ul>
        <!-- BEGIN Form search of web -->
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search product, category....">
            </div>
            <button type="submit" class="btn btn-default">Search <i class="glyphicon glyphicon-search"></i></button>
        </form>
        <!-- End Form -->

        <!-- BEGIN: Right of navbar : sign in link, sign up link, user info... -->
        <ul class="nav navbar-nav navbar-right">
            <?php if(!$this->session->userdata('user')): ?>
            <li><a href=<?php echo base_url("index.php/cuser/login") ?>>Sign in</a></li>
            <li><a href=<?php echo base_url("index.php/cuser/register") ?>>Sign up</a></li>
            <?php else: ?>
            <li class="dropdown">
                <?php $user = $this->session->userdata('user') ?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog">&nbsp;</i><strong><?php echo $user ?></strong><b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href=<?php echo base_url("index.php/cuser/") ?>><i class="glyphicon glyphicon-user">&nbsp;</i>Profiles</a></li>
                    <li><a href=<?php echo base_url("index.php/ctransaction/listTrade")?>><i class="glyphicon glyphicon-sort  ">&nbsp;</i>My Trade</a></li>
                    <li><a href=<?php echo base_url("index.php/ctransaction/listOffer") ?>><i class="glyphicon glyphicon-plus">&nbsp;</i>My Offer</a></li>
                    <li><a href=<?php echo base_url("index.php/cproduct") ?>><i class="glyphicon glyphicon-th">&nbsp;</i>My product</a></li>
                    <li><a href=<?php echo base_url("index.php/cuser/logout") ?>><i class="glyphicon glyphicon-off">&nbsp;</i>Logout</a></li>
                </ul>
            </li>
        <?php endif ?>
        </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <!-- END navigation -->
</header>
<!-- END: HEADER -->
