<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuser extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('user')) {

            $user_id = $this->muser->findId($this->session->userdata('user'));
            $data['user'] = $this->muser->find($user_id);
            $this->load->view('layout/header');
            $this->load->view('layout/navigation');
            $this->load->view('user/edit_modal');
            $this->load->view('user/info',$data);
            $this->load->view('layout/footer');
        } else {
            redirect('cuser/login');
        }
    }
    public function login()
    {
        if ($this->session->userdata('user'))
            redirect(base_url());
        $data['error'] = array(
            'error' => ''
        );
        if ($this->input->post('username')) {
            $username = $this->input->post('username');
            $password = $this->input->post('pass');

            if ($this->muser->checkLogin($username, $password)) {
                $id = $this->muser->findId($username);
                $user = array(
                    'user' => $username,
                    'id' => $id
                );
                $this->session->set_userdata($user);
                redirect(base_url());
            } else {
                $data['error'] = array(
                    'error' => 'Failure Login'
                );
                $this->load->view('layout/header');
                $this->load->view('layout/navigation');
                $this->load->view('user/login', $data);
                $this->load->view('layout/footer');
            }


        } else {
            $this->load->view('layout/header');
            $this->load->view('layout/navigation');
            $this->load->view('user/login', $data);
            $this->load->view('layout/footer');
        }
    }
    public function register()
    {
        if ($this->session->userdata('user'))
            redirect(base_url());
        if ($this->input->post('username')) {
            $username = $this->input->post('username');
            $password = $this->input->post('pass');
            if ($this->muser->checkAvalible($username)) {
                $data = array(
                    'username' => $username,
                    'password' => $password
                );
                $this->muser->insert($data);
                $id  = $this->muser->findId($username);
                $user = array(
                    'user' => $username,
                    'id' => $id
                );
                $this->session->set_userdata($user);
                redirect(base_url());
            } else {
                $data['error'] = array(
                    'error' => 'Failure Register'
                );
                $this->load->view('layout/header');
                $this->load->view('layout/navigation');
                $this->load->view('user/login', $data);
                $this->load->view('layout/footer');
            }
        } else {
            $this->load->view('layout/header');
            $this->load->view('layout/navigation');
            $this->load->view('user/register');
            $this->load->view('layout/footer');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect(base_url());
    }
}

/* End of file Cuser.php */
/* Location: ./application/controllers/Cuser.php */