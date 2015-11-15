<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/navigation'); ?>
<!-- BEGIN CONTENT -->
<div class="container">
    <a href="javascript:goback()" title="">Back</a>
    <hr>
    <div class="panel panel-info">
        <div class="panel-heading">
            <!-- title -->
            <h3 class="panel-title">Add Product</h3>
        </div>
        <div class="panel-body">
            <h4><?php echo $error ?></h4>
            <?php unset($error) ?>
            <form action="insert" method="POST" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- Upload image product -->
                    <label for="uploadImage">Image</label>
                    <input type="file" name="uploadImage" value="uploadImage" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <!-- Enter Product name -->
                    <label for="productName">Product name:</label>
                    <input type="text" name="name" value="" minlength="6" maxlength="25" placeholder="" required="required" class="form-control">
                </div>
                <div class="form-group">
                    <!-- Select category of product -->
                    <label for="category">Category:</label><br>
                    <select name="category">
                        <?php foreach($category as $value): ?>
                        <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <!-- Price of product -->
                    <label for="price">About price:</label><br>
                    <input type="number" min='0', name="price" required value="" placeholder="">
                </div>
                <div class="form-group">
                    <!-- Description of product -->
                    <label for="description">More about product:</label><br>
                    <textarea name="description" cols="70" rows="10"></textarea>
                </div>
                <button type="submit" name="insert" class="btn btn-primary pull-right">Add product</button>
            </form>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php $this->load->view('layout/footer'); ?>