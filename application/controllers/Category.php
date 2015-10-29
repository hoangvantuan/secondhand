<?php 
/**
* 
*/
class Category extends CI_Controller
{
	function index(){
	$data['category'] = $this->mcategory->findAll();
	$this->load->view('category/list',$data);
	}

	function delete($id){
		$this->mcategory->delete($id);
		redirect('category','refresh');
	}
}
 ?>