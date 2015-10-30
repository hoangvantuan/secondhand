<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cproduct extends CI_Controller {

	public function index()
	{
		$data['product'] = $this->mproduct->findAll();
		$this->load->view('layout/header');
		$this->load->view('layout/navigation');
		$this->load->view('product/list', $data);
		$this->load->view('layout/footer');

	}
	public function edit($id){

	}

	public function delete($id){
		$this->mproduct->delete($id);
		redirect('cproduct','refresh');
	}

	public function insert(){

			$data['data'] = $this->mcategory->findAll();
			$data['data']['error'] = '';
			$this->load->view('layout/header');
			$this->load->view('layout/navigation');
			$this->load->view('product/insert',$data);
			$this->load->view('layout/footer');
		}

	public function insertProcess(){
		$error = '';
		$config['upload_path'] = APPPATH.'../assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->upload->initialize($config);
		$product = array('status'=>'Ready','name'=>$this->input->post('name'),'price'=>$this->input->post('price'),'category_id'=>$this->input->post('category'),'description'=>$this->input->post('description'),'image'=>'assets/image/common/imgnotfound.jpg');
		if ( ! $this->upload->do_upload('uploadImage')){
			$error =  $this->upload->display_errors();
		}
		else{
		    $image_data =  $this->upload->data();
	 		$config = array("source_image" => $image_data['full_path'],
                        "new_image" =>  APPPATH.'../assets/uploads/' . "/thumbs",
                        "maintain_ration" => true,
                        "width" => '440',
                        "height" => "440");
        $this->load->library("image_lib",$config);
        $this->image_lib->resize();
        $error = 'Insert Success';
        $product['image'] = $image_data['orig_name'];
		}
			$this->mproduct->insert($product);
			$data['data'] = $this->mcategory->findAll();
			$data['data']['error'] = $error;
			$this->load->view('layout/header');
			$this->load->view('layout/navigation');
			$this->load->view('product/insert',$data);
			$this->load->view('layout/footer');
		 

	}
	
	

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */
