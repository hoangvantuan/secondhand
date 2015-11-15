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
            $data['success'] = null;

            $check = $this->mtransaction->checkTransaction($srcId,$desId);
            if($check){
                $data['success'] = "Offer was Sended, Please waiting for accept";
            }
            if($this->input->get('action') == 'swap' && !$check){
                $update = array ('status' => 'Waiting');
                $transaction = array ('srcUserId'=>$data['srcProduct']->user_id,'desUserId'=>$data['desProduct']->user_id,'srcId'=>$srcId, 'desId'=>$desId, 'status'=>'Waiting');
                $this->mproduct->update($srcId,$update);
                $this->mproduct->update($desId,$update);
                $this->mtransaction->insert($transaction);
                 $data['success'] = "Send offer successfull, Please waiting for accept";

            }
            $this->load->view('transaction/index',$data);
        }
        else {
            redirect('cuser/login','refresh');
        }
    }


    // List offer
    public function ListOffer() {
        if($this->session->userdata('user')){

            $userId = $this->session->userdata('id');
            $receive = null;
            $send = null;
            // get receive offer
            $receiveTransaction = $this->mtransaction->findByDesUserId($userId);

            foreach ($receiveTransaction as $tran) {
                if($tran->status == 'Waiting'){
                $src = $this->mproduct->find($tran->srcId);
                $des = $this->mproduct->find($tran->desId);
                $from = $this->muser->findUsername($tran->srcUserId);
                $to = $this->muser->findUsername($tran->desUserId);
                $receive[] = array('srcProduct'=>$src, 'desProduct'=>$des, 'from'=>$from, 'to'=>$to, 'id'=>$tran->id);
            }
            }


            // get send offer
            $sendTransaction = $this->mtransaction->findBySrcUserId($userId);
            foreach ($sendTransaction as $tran) {
                // var_dump($tran);
                if($tran->status == 'Waiting'){
                $src = $this->mproduct->find($tran->srcId);
                $des = $this->mproduct->find($tran->desId);
                $from = $this->muser->findUsername($tran->srcUserId);
                $to = $this->muser->findUsername($tran->desUserId);
                $send[] = array('srcProduct'=>$src, 'desProduct'=>$des, 'from'=>$from, 'to'=>$to, 'id'=>$tran->id);
            }
            }
            $data['receive'] = $receive;
            $data['send'] = $send;
            $this->load->view('transaction/myoffer', $data);

        } else {
            redirect('cuser/login','refresh');
        }
    }

    public function cancleOffer(){
           $data['cancleSuccess'] = null;
        $idTran = $this->input->get('id');
        $tran = $this->mtransaction->find($idTran);
        if($tran->srcUserId != $this->session->userdata('id'))
            redirect(base_url());
       $this->mtransaction->delete($idTran);
       $this->mproduct->update($tran->srcId,array ('status'=>'Ready'));
       $this->mproduct->update($tran->desId,array ('status'=>'Ready'));
       $data['cancleSuccess'] = "Cancle Offer successfull";
       redirect('ctransaction/ListOffer');
    }

}

/* End of file Ctransaction.php */
/* Location: ./application/controllers/Ctransaction.php */