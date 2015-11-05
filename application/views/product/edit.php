<?php 
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
?>

<!-- BEGIN CONTENT -->
<div class="container">
    <?php echo anchor('cproduct', 'Back'); ?>
    <hr>
    <div class="panel panel-info">
        <div class="panel-heading">
            <!-- title -->
            <h3 class="panel-title">Edit Product</h3>
        </div>
        <div class="panel-body">
            <form action="<?php base_url('index.php/cproduct/edit') ?>" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- Upload image product -->
                    <img src="<?php echo base_url($product->image) ?>" class="img-responsive img-circle">
                    <label for="uploadImage">Image</label>
                    <input type="file" name="uploadImage" value="uploadImage" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <!-- Enter Product name -->
                    <label for="productName">Product name:</label>
                    <input type="text" name="name" value="<?php echo $product->name ?>" minlength="6" maxlength="25" placeholder="" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <!-- Select category of product -->
                    <label for="category">Category:</label><br>
                    <select name="category">
                        <?php foreach($category as $value): ?>
                        <option value="<?php echo $value->id?>" <?php echo $value->id == $product->category_id ? 'selected' : '' ?>><?php echo $value->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <!-- Price of product -->
                    <label for="price">About price:</label><br>
                    <input type="number" min='0', name="price" required value="<?php echo $product->price ?>" placeholder="">
                </div>
                <div class="form-group">
                    <!-- Description of product -->
                    <label for="description">More about product:</label><br>
                    <textarea name="description" cols="70" rows="10"><?php echo $product->description ?></textarea>
                </div>
                <button type="submit" name="edit" class="btn btn-primary pull-right">Edit product</button>
            </form>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php $this->load->view('layout/footer'); ?>