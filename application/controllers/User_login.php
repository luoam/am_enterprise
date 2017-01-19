<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Admin_login
 *
 * @author Administrator
 */
class User_login extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form'));
        $this->load->library('session');
    }
    
    public function index()
    {
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('user/index_model');//获取网站的信息
        $data['site'] = $this->index_model->get_site_info();
        $this->load->view('user/login',$data);        
    }

    public function check_session() 
    {
        $dt['session_username'] = $this->session->userdata('username');
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($dt);
    }
    public function login_check()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->model('user/login_model');
        $response = $this->login_model->login_check($username,$password);
        if($response['login'] === '1')
        {            
            $this->session->set_userdata($response);
            redirect('/user_index/');
        }else
        {
            redirect('/user_login/');
        }
        
    }
    
    public function logout()
    {
//        $rep['id'] = '';
//        $rep['username'] = '';
//        $rep['login'] = '0'; 
//        $this->load->library('session');
//        $this->session->unset_userdata($rep);
        $this->session->sess_destroy();
        redirect('/user_login/');
    }
}
