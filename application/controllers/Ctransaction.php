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
                $tran = $this->mtransaction->find($check);
                if($tran->status == 'Refuse')
                {
                $this->mproduct->update($srcId,array('status'=>'Waiting'));
                $this->mproduct->update($desId, array('status'=>'Waiting'));
                $this->mtransaction->update($check, array('status'=>'Waiting'));
                }
                else if($tran->status == 'Changed'){
                      $data['success'] = "This product has changed";
                } else if($tran->status == 'Waiting'){
                      $data['success'] = "Offer was Sended, Please waiting for accept";
                }

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
                $receive[] = array('srcProduct'=>$src, 'desProduct'=>$des, 'from'=>$from, 'to'=>$to, 'id'=>$tran->id,'tran'=>$tran);
            }
            }


            // get send offer
            $sendTransaction = $this->mtransaction->findBySrcUserId($userId);
            foreach ($sendTransaction as $tran) {
                // var_dump($tran);
                if($tran->status == 'Waiting' || $tran->status == 'Refuse'){
                $src = $this->mproduct->find($tran->srcId);
                $des = $this->mproduct->find($tran->desId);
                $from = $this->muser->findUsername($tran->srcUserId);
                $to = $this->muser->findUsername($tran->desUserId);
                $send[] = array('srcProduct'=>$src, 'desProduct'=>$des, 'from'=>$from, 'to'=>$to, 'id'=>$tran->id, 'tran' => $tran);
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
        $idTran = $this->input->get('id');
        $tran = $this->mtransaction->find($idTran);
        if($tran->srcUserId != $this->session->userdata('id'))
            redirect(base_url());
       $this->mtransaction->delete($idTran);
       $this->mproduct->update($tran->srcId,array ('status'=>'Ready'));
       $this->mproduct->update($tran->desId,array ('status'=>'Ready'));
       redirect('ctransaction/ListOffer');
    }

 public function acceptOffer(){
    $idTran = $this->input->get('id');;
    $tran = $this->mtransaction->find($idTran);
    if($tran->desUserId != $this->session->userdata('id'))
        redirect(base_url());
    $this->mtransaction->update($idTran, array('status' => 'Changed'));
    $this->mproduct->update($tran->srcId,array ('status'=>'Changed'));
    $this->mproduct->update($tran->desId,array ('status'=>'Changed'));
     redirect('ctransaction/ListOffer');

 }

  public function refuseOffer(){
    $idTran = $this->input->get('id');;
    $tran = $this->mtransaction->find($idTran);
    if($tran->desUserId != $this->session->userdata('id'))
        redirect(base_url());
    $this->mtransaction->update($idTran, array('status' => 'Refuse'));
    $this->mproduct->update($tran->srcId,array ('status'=>'Ready'));
    $this->mproduct->update($tran->desId,array ('status'=>'Ready'));
     redirect('ctransaction/ListOffer');

 }

 public function listTrade(){
    if($this->session->userdata('id')){
    $transaction = null;
    //find all transaction which user send
    $userId = $this->session->userdata('id');
    $srcTran = $this->mtransaction->findBySrcUserId($userId);
    foreach($srcTran as $tran) {
        if($tran->status == 'Changed'){
        $src = $this->mproduct->find($tran->srcId);
        $des = $this->mproduct->find($tran->desId);
        $srcUser = $this->muser->find($src->user_id);
        $desUser = $this->muser->find($des->user_id);
        $src->user = $srcUser;
        $des->user = $desUser;
        $transaction [] = array('srcProduct'=>$src, 'desProduct'=>$des);
    }
    }

    // find receive
    $desTran = $this->mtransaction->findByDesUserId($userId);
    foreach($desTran as $tran) {
        if($tran->status=='Changed'){
        $src = $this->mproduct->find($tran->srcId);
        $des = $this->mproduct->find($tran->desId);
        $srcUser = $this->muser->find($src->user_id);
        $desUser = $this->muser->find($des->user_id);
        $src->user = $srcUser;
        $des->user = $desUser;
        $transaction[] = array('srcProduct'=>$src, 'desProduct'=>$des);
    }
    }
    $data['transaction'] = $transaction;

    $this->load->view('transaction/mytrade',$data);
    } else {
        redirect(base_url());
    }
 }

}

/* End of file Ctransaction.php */
/* Location: ./application/controllers/Ctransaction.php */