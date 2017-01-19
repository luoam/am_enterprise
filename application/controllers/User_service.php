<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of User_service
 *
 * @author Administrator
 */
class User_service extends CI_Controller{
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
        $user_id = $this->session->userdata('id');
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('user/index_model');
        $data['site'] = strip_cslashes($this->index_model->get_site_info());
        $data['user_site'] = strip_cslashes($this->index_model->get_user_site_info($user_id));
        $this->load->model('user/service_model');
        $data['service']= strip_cslashes($this->service_model->get_user_service_info($user_id));
        $this->load->view('user/setting_service',$data);        
    }    


    
    
    public function service_update()
    {
        $service = $this->input->post('service');
        $userid = $this->session->userdata('id');
        $service_update = array(
            'service' => $service,
        );
        $this->load->model('user/service_model');
        $response = $this->service_model->service_update($service_update,$userid);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
}
