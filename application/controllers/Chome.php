<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chome extends CI_Controller
{
    public function index() {

        $data['product'] = $this->mproduct->findAll();
        $data['category'] = $this->mcategory->findAll();
        $this->load->view('home/list', $data);
    }

    public function category($id) {
        if ('' != $id) {
            $data['product'] = $this->mproduct->findAllByCategory($id);
        }
        else $data['product'] = $this->mproduct->findAll();
        $data['category'] = $this->mcategory->findAll();
        $this->load->view('home/list', $data);
    }
}

/* End of file home.php */

/* Location: ./application/controllers/home.php */
