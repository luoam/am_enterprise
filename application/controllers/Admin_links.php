<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Admin_links
 *
 * @author Administrator
 */
class Admin_links extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form','security','string'));
        $this->load->library('session');
        if(empty($this->session->userdata('username')))
        {
            redirect('/admin_login/');
        }  
    }
    
    public function index()
    {
        $fenye = $this->uri->segment(3,0);
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->library('pagination');
        $this->load->model('admin/links_model');
        $this->load->model('admin/index_model');
        $data['fenye'] = $fenye+1;
        $data['total'] = $this->links_model->links_total();
        $data['per_end'] = ($data['total']-$data['fenye'])>10?$fenye+10:$data['total'];
        $config['base_url'] = site_url().'/admin_links/index/';
        $config['total_rows'] = $data['total'];
        $config['per_page'] = 10;
        $config['first_tag_open'] = '<li class="paginate_button previous">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="paginate_button next">';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="paginate_button previous">';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '上一页';
        $config['next_tag_open'] = '<li class="paginate_button next">';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '下一页';
        $config['cur_tag_open'] = '<li class="paginate_button active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="paginate_button">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['site'] = $this->index_model->get_site_info();
        $data['links_list'] = strip_cslashes($this->links_model->links_list($fenye));        
        $this->load->view('admin/links_list',$data);        
    }
    
    public function add()
    {
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('admin/index_model');
        $data['site'] = $this->index_model->get_site_info();
        $this->load->view('admin/links_add',$data);
    }
    
    public function add_save()
    {
        $webname = $this->input->post('webname');
        $weburl = $this->input->post('weburl');
        $keywords = $this->input->post('keywords');
        $description = $this->input->post('description');
        $name = $this->input->post('name');
        $tel = $this->input->post('tel');
        $email = $this->input->post('email');
        $time = $this->input->post('time');
        $data = array(
            'webname' => $webname,
            'weburl' => $weburl,
            'keywords' => $keywords,
            'description' => $description,
            'name' => $name,
            'tel' => $tel,
            'email' => $email,
            'time' => $time
        );
        $this->load->model('admin/links_model');
        $response = $this->links_model->links_add($data);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
    
    public function edit()
    {
       $data['username'] = $this->session->userdata('username');
       $data['base_url'] = $this->config->base_url();
       $data['site_url'] = $this->config->site_url();
       $id = $this->uri->segment(3,1);
       $data['id'] = $id;
       $this->load->model('admin/links_model');
       $this->load->model('admin/index_model');
       $data['site'] = $this->index_model->get_site_info();
       $data['links'] = strip_cslashes($this->links_model->get_links_info($id));
       $this->load->view('admin/links_edit',$data);

    }
    
    public function edit_save()
    {
        $webname = $this->input->post('webname');
        $weburl = $this->input->post('weburl');
        $keywords = $this->input->post('keywords');
        $description = $this->input->post('description');
        $name = $this->input->post('name');
        $tel = $this->input->post('tel');
        $email = $this->input->post('email');
        $time = $this->input->post('time');
        $id = $this->input->post('id');
        $data = array(
            'webname' => $webname,
            'weburl' => $weburl,
            'keywords' => $keywords,
            'description' => $description,
            'name' => $name,
            'tel' => $tel,
            'email' => $email,
            'time' => $time
        );
        $this->load->model('admin/links_model');
        $response = $this->links_model->links_edit($data,$id);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
    
    public function del()
    {
       $data['username'] = $this->session->userdata('username');
       $data['base_url'] = $this->config->base_url();
       $data['site_url'] = $this->config->site_url();
       $id = $this->uri->segment(3,1);
       $data['id'] = $id;
       $this->load->model('admin/links_model');
       $this->load->model('admin/index_model');
       $data['site'] = $this->index_model->get_site_info();
       $data['links'] = strip_cslashes($this->links_model->get_links_info($id));
       $this->load->view('admin/links_del',$data);  
    }
    
    public function del_save()
    {
        $id = $this->input->post('id');
        $this->load->model('admin/links_model');
        $response = $this->links_model->links_del($id);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response); 
    }
}
