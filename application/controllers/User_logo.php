<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */
class User_logo extends CI_Controller
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
        $this->load->model('user/logo_model');
        $data['dashang'] = strip_cslashes($this->logo_model->get_logo_info($userid));
        $this->load->view('user/setting_logo',$data);        
    }
    
    public function webuploader()
    {
        $config['upload_path']      = './ueditor/php/upload/logo';
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
    public function logo_update()
    {
        $userid = $this->session->userdata('id');
        $logo = $this->input->post('logo');
        $logo_update = array(
            'logo'=>$logo
        );
        $this->load->model('user/logo_model');
        $response = $this->logo_model->logo_update($logo_update,$userid);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
}
