<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cproduct extends CI_Controller {

	public function index()
	{	
		if(!$this->session->userdata('user'))
			redirect(base_url());
		$username = $this->session->userdata('user');
		$user_id = $this->muser->findId($username);
		$data['product'] = $this->mproduct->findAllById($user_id);
		foreach ($data as $key) {
			foreach ($key as $value) {
				$category = $this->mcategory->find($value->category_id);
				$value->category = $category;
			}
		}
		// var_dump($data);
		$this->load->view('layout/header');
		$this->load->view('layout/navigation');
		$this->load->view('product/list', $data);
		$this->load->view('layout/footer');

	}
	public function edit($id){

		$data['product'] = $this->mproduct->find($id);
		$data['category'] = $this->mcategory->findAll();
		if($this->input->post('name')){

		$config['upload_path'] = APPPATH.'../assets/uploads/';
		$old_path_name = APPPATH.'../assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '99999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->upload->initialize($config);
		$product = array('name'=>$this->input->post('name'),'price'=>$this->input->post('price'),'category_id'=>$this->input->post('category'),'description'=>$this->input->post('description'));
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
        $new_name = time().$image_data['file_ext'];
        $new_path_name = $old_path_name.$new_name;
        $old_path_name = $old_path_name.$image_data['orig_name'];
      
        rename($old_path_name,$new_path_name);
        
        $product['image'] = 'assets/uploads/'.$new_name;

		}
			$this->mproduct->update($id,$product);
			redirect('cproduct');
		}
		else{
			$this->load->view('layout/header');
			$this->load->view('layout/navigation');
			$this->load->view('product/edit', $data, FALSE);	
			$this->load->view('layout/navigation');

		}
	}

	public function delete($id){

		$this->mproduct->delete($id);
		redirect(base_url('index.php/cproduct'));
	}

	public function details($id){

			$data['product'] = $this->mproduct->find($id);
			$data['user'] = $this->muser->find($data['product']->user_id);
			$category = $this->mcategory->find($data['product']->category_id);
			
			$data['product']->category_name = $category->name;
			$this->load->view('layout/header');
			$this->load->view('layout/navigation');
			$data['category_name'] = $category->name;
			$this->load->view('product/details',$data);
			$this->load->view('layout/footer');
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
		$old_path_name = APPPATH.'../assets/uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '99999';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$this->upload->initialize($config);
		$user_id = $this->muser->findId($this->session->userdata('user'));
		$product = array('user_id'=>$user_id,'status'=>'Ready','name'=>$this->input->post('name'),'price'=>$this->input->post('price'),'category_id'=>$this->input->post('category'),'description'=>$this->input->post('description'),'image'=>'assets/image/common/imgnotfound.jpg');
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
        $new_name = time().$image_data['file_ext'];
        $new_path_name = $old_path_name.$new_name;
        $old_path_name = $old_path_name.$image_data['orig_name'];
      
        rename($old_path_name,$new_path_name);
        
        $product['image'] = 'assets/uploads/'.$new_name;

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
