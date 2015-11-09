<!-- BEGIN: LEFT SIDE BAR -->
<div class="panel panel-info">
    <div class="panel-heading">
        <!-- Title side bar -->
        <h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> Category</h3>
    </div>
    <div class="panel-body left_side_bar">
        <!-- Content Side bar -->
        <ul>
            <?php foreach($category as $value): ?>
            <li><i class="glyphicon glyphicon-plus">&nbsp;</i><a href="<?php echo base_url('index.php/chome/category/'.$value->id) ?>"><?php echo $value->name ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<!-- END LEFT SIDE BAR -->