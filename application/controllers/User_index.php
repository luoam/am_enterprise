<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of User_index
 *
 * @author Administrator
 */
class User_index extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        if(empty($this->session->userdata('username')))
        {
            redirect('/user_login/');
        }  
    }
    
    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $userid = $this->session->userdata('id');
        $this->load->model('user/index_model');
        $data['site'] = $this->index_model->get_site_info();
        $data['user_site'] = $this->index_model->get_user_site_info($userid);
        $this->load->view('user/index',$data);
        
    }

    public function welcome()
    {
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('admin/index_model');
        $data['site'] = $this->index_model->get_site_info();
        $this->load->view('admin/welcome',$data);
        
    }
    

}
