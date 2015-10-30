<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
		$data['product'] = $this->product->findAll()->result();
		$this->load->view('product/list', $data, FALSE);
	}

}

/* End of file product.php */
/* Location: ./application/controllers/product.php */