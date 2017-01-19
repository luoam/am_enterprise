<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of User_user
 *
 * @author Administrator
 */
class User_user extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form','security','string'));
        $this->load->library('session');
        if(empty($this->session->userdata('username')))
        {
            redirect('/user_login/');
        }  
    }
    
    public function index()
    {
     
    }
    
    
    
    public function add()
    {

        
    }
    
    public function add_save()
    {
    
    }
    
    public function edit()
    {
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $userid = $this->session->userdata('id');
        $this->load->model('user/user_model');
        $this->load->model('user/index_model');
        $data['site'] = strip_cslashes($this->index_model->get_site_info());
        $data['user_site'] = strip_cslashes($this->index_model->get_user_site_info($userid));
        $data['user'] = strip_cslashes($this->user_model->get_user_user_info($userid));
        $this->load->view('user/user_edit',$data);
        
    }
    
    public function edit_save()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5(md5($password));
        $id = $this->session->userdata('id');
        $array_data = array(
            'username'=> $username,
            'password' => $password
                );
        $this->load->model('user/user_model');
        $response = $this->user_model->user_edit($array_data,$id);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
    
    public function del()
    {

        
    }
    
    public function del_save()
    {
    
    }
}
