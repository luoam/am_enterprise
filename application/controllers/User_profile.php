<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of User_profile
 *
 * @author Administrator
 */
class User_profile extends CI_Controller{
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
        $userid = $this->session->userdata('id');
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('user/index_model');
        $data['site'] = strip_cslashes($this->index_model->get_site_info());
        $data['user_site'] = strip_cslashes($this->index_model->get_user_site_info($userid));
        $this->load->model('user/profile_model');
        $data['profile'] = strip_cslashes($this->profile_model->get_profile_info($userid));
        $this->load->view('user/setting_profile',$data);        
    }    


    
    
    public function profile_update()
    {
        $products = $this->input->post('products');
        $profile = $this->input->post('profile');
        $application = $this->input->post('application');
        $user_id = $this->session->userdata('id');
        $profile_update = array(
            'products' => $products,
            'profile' => $profile,
            'application' => $application,
        );
        $this->load->model('user/profile_model');
        $response = $this->profile_model->profile_update($profile_update,$user_id);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
}
