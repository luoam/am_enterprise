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
class User_contact extends CI_Controller{
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
        $this->load->model('user/contact_model');
        $data['contact']=  $this->contact_model->get_user_contact_info($userid);
        $this->load->view('user/setting_contact',$data);        
    }    


    
    
    public function contact_update()
    {
        $address = $this->input->post('address');
        $tel1 = $this->input->post('tel1');
        $tel2 = $this->input->post('tel2');
        $fax = $this->input->post('fax');
        $email = $this->input->post('email');
        $user_id = $this->session->userdata('id');
        $contact_update = array(
            'address' => $address,
            'tel1' => $tel1,
            'tel2' => $tel2,
            'fax' => $fax,
            'email' => $email
        );
        $this->load->model('user/contact_model');
        $response = $this->contact_model->contact_update($contact_update,$user_id);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
}
