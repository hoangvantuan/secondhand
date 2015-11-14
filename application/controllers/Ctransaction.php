<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctransaction extends CI_Controller {

    public function index()
    {
        if($this->session->userdata('user')) {
            //get info $sreId
            $srcId = $this->input->get('srcId');
            $data['srcProduct'] = $this->mproduct->find($srcId);
            //get info $desId
            $desId = $this->input->get('desId');
            $data['desProduct'] = $this->mproduct->find($desId);
            $this->load->view('transaction/index',$data);
        }
        else {
            redirect('cuser/login','refresh');
        }
    }

}

/* End of file Ctransaction.php */
/* Location: ./application/controllers/Ctransaction.php */