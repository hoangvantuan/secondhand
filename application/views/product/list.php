<div class="container">
    <div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
			<div class="row">
                <div class="col-lg-12">
                	<h1 class="page-header">Product List</h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url('index.php/cproduct') ?>">Home</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-list-ol"></i> Products
                        </li>
                    </ol>
                </div>
                </div>

			<div class="row">
                <div class="col-lg-12"><label><i class="fa fa-upload"></i> <a href="cproduct/insert">Add product</a></label></div>
                <div class="col-lg-12">
                    <h2>Producs Table</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th><i class="glyphicon glyphicon-edit"></i></th>
                                    <th><i class="glyphicon glyphicon-trash"></i></th>
                                </tr>
                            </thead>
                            <tbody>
     							<?php  foreach($product as $value): ?>
     							<tr valign="middle">
     								<td><?php echo $value->name ?></td>
     								<td><img src="<?php echo base_url($value->image) ?>" width="50" height="50" ></td>
     								<td><?php echo $value->category_id ?></td>
     								<td><?php echo number_format($value->price,0,',','.').'VND'; ?></td>
     								<td><?php echo $value->description ?></td>
     								<td><?php echo $value->status ?></td>
                                    <td><?php echo anchor('cproduct/edit/'.$value->id, 'Edit') ?></td>
     								<td><?php echo  anchor('cproduct/delete/'.$value->id, 'Delete', array('onClick'=>"return confirm('Are you sure?')")); ?></td>
     							</tr>
     							<?php endforeach ?>
   							
 							</tbody>
						</table>
                     </div>
                </div>
			</div>
			<!-- end row -->

		</div>
	</div>
    </div>
</div>