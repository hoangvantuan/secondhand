<?php 
echo anchor('category/add', 'Add category');
echo '<br>';
$this->table->set_heading('Id','Name','Delete','Edit');
foreach ($category as $value) {
	# code...
	$this->table->add_row($value->id,anchor('category/show/'.$value->id,$value->name),anchor('category/delete/'.$value->id, 'Delete', Array('onClick' => "return confirm('Are you sure?')")),anchor('category/update/'.$value->id, 'Edit'));
}

	echo $this->table->generate();

 ?>