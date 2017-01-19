<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
class User_application extends CI_Controller
{
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
        $this->load->model('user/application_model');
        $data['application'] = strip_cslashes($this->application_model->get_application_info($userid));
        $this->load->view('user/setting_application',$data);        
    }
    
    public function webuploader()
    {
        $config['upload_path']      = './ueditor/php/upload/application';
        $config['allowed_types']    = 'jpg|png';
        $config['max_size']     = 2000;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);      
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        if ( ! $this->upload->do_upload('file'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo '{"jsonrpc" : "2.0", "code": 101, "message": "'.implode($error).'"}';
        }  else
        {
            $upload_data = $this->upload->data();
            $uploads = $upload_data['full_path'];
            $uploads = str_replace(str_replace('\\','/',  getcwd()), '', $uploads);
            echo '{"jsonrpc" : "2.0", "code": 201, "message": "'.$uploads.'"}';
        }
    }
    public function application_update()
    {
        $userid = $this->session->userdata('id');
        $application_1 = $this->input->post('application_1');
        $application_2 = $this->input->post('application_2');
        $application_3 = $this->input->post('application_3');
        $application_4 = $this->input->post('application_4');
        $application_5 = $this->input->post('application_5');
        $application_6 = $this->input->post('application_6');
        $application_update = array(
            'application_1' => $application_1,
            'application_2' => $application_2,
            'application_3' => $application_3,
            'application_4' => $application_4,
            'application_5' => $application_5,
            'application_6' => $application_6
        );
        $this->load->model('user/application_model');
        $response = $this->application_model->application_update($application_update,$userid);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
}
