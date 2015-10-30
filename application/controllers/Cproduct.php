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

	public function delete($id){
		$this->product->delete($id);
		redirect('product','refresh');
	}

	public function insert(){
		if($this->input->post('insert')){
			// redirect('product','refresh')
		}
		else
		{
			$data['data'] = $this->mcategory->findAll();
			$this->load->view('layout/header');
			$this->load->view('layout/navigation');
			$this->load->view('product/insert',$data);
			$this->load->view('layout/footer');
		}
	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */