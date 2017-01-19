<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of User_site
 *
 * @author Administrator
 */
class User_site extends CI_Controller{
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
        $this->load->view('user/setting_site',$data);        
    }    


    
    
    public function site_update()
    {
        $name = $this->input->post('name');
        $keywords = $this->input->post('keywords');
        $description = $this->input->post('description');
        $user_id = $this->session->userdata('id');
        $site_update = array(
            'name' => $name,
            'keywords' => $keywords,
            'description' => $description,
        );
        $this->load->model('user/site_model');
        $response = $this->site_model->site_update($site_update,$user_id);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
}
