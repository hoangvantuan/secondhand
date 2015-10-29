<?php 

$this->table->set_heading('Id','Name','Options');
foreach ($category as $value) {
	# code...
	$this->table->add_row($value->id,$value->name,anchor('category/delete/'.$value->id, 'Delete', Array('onClick' => "return confirm('Are you sure?')")));
}

	echo $this->table->generate();

 ?>