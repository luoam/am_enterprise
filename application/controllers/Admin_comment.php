<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Admin_comment
 *
 * @author Administrator
 */
class Admin_comment extends CI_Controller{
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
        $this->load->model('admin/comment_model');
        $this->load->model('admin/index_model');
        $data['fenye'] = $fenye+1;
        $data['total'] = $this->comment_model->comment_total();
        $data['per_end'] = ($data['total']-$data['fenye'])>10?$fenye+10:$data['total'];
        $config['base_url'] = site_url().'/admin_comment/index/';
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
        $data['comment_list'] = $this->comment_model->comment_list($fenye);        
        $data['comment_list'] = strip_cslashes($this->flash_data($data['comment_list']));
        $this->load->view('admin/comment_list',$data);
    }
    
    
    private function flash_data($param)
    {
        foreach ($param as $newkey => $newvalue)
        {
            foreach ($newvalue as $key => $value)
            {
                if ($key === 'thread_key')
                {
                    $this->load->model('admin/article_model');
                    $article = $this->article_model->get_article_info($value);
                    $param[$newkey]['title'] = $article['title'];
                }
            }
        }
        return $param;
    }
    
    public function edit()
    {
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $id = $this->uri->segment(3,1);
        $data['id'] = $id;
        $this->load->model('admin/comment_model');
        $this->load->model('admin/index_model');
        $data['site'] = $this->index_model->get_site_info();
        $data['comment'] = strip_cslashes($this->comment_model->get_comment_info($id));
        $this->load->view('admin/comment_edit',$data);

    }
    
    public function edit_save()
    {
        $author_name = $this->input->post('author_name');
        $author_email = $this->input->post('author_email');
        $author_url = $this->input->post('author_url');
        $message = $this->input->post('message');
        $id = $this->input->post('id');
        $data = array(
            'author_name' => $author_name,
            'author_email' => $author_email,
            'author_url' => $author_url,
            'message' => $message,
        );
        $this->load->model('admin/comment_model');
        $response = $this->comment_model->comment_edit($data,$id);
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
        $this->load->model('admin/comment_model');
        $this->load->model('admin/index_model');
        $data['site'] = $this->index_model->get_site_info();
        $data['comment'] = strip_cslashes($this->comment_model->get_comment_info($id));
        $this->load->view('admin/comment_del',$data);  
    }
    
    public function del_save()
    {
        $id = $this->input->post('id');
        $this->load->model('admin/comment_model');
        $response = $this->comment_model->comment_del($id);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response); 
    }
}
