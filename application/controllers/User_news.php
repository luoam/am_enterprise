<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of User_news
 *
 * @author Administrator
 */
class User_news extends CI_Controller{
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
    
    public function category_index()
    {
        $fenye = $this->uri->segment(3,0);
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $userid = $this->session->userdata('id');
        $this->load->library('pagination');
        $this->load->model('user/news_model');
        $this->load->model('user/index_model');
        $data['fenye'] = $fenye+1;
        $data['total'] = $this->news_model->category_total($userid);
        $data['per_end'] = ($data['total']-$data['fenye'])>10?$fenye+10:$data['total'];
        $config['base_url'] = site_url().'/user_news/category_index/';
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
        $data['user_site'] = $this->index_model->get_user_site_info($userid);
        $data['category_list'] = $this->news_model->category_list($fenye,$userid);
        $this->load->view('user/news_category_list',$data);
        
    }
    
    public function category_add()
    {
        $data['username'] = $this->session->userdata('username');
        $userid = $this->session->userdata('id');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('user/news_model');
        $this->load->model('user/index_model');
        $data['site'] = strip_cslashes($this->index_model->get_site_info());
        $data['user_site'] = strip_cslashes($this->index_model->get_user_site_info($userid));
        $data['category_up'] = strip_cslashes($this->news_model->get_upcategory($userid));
        $this->load->view('user/news_category_add',$data);
        
    }
    
    public function category_add_save()
    {
        $name = $this->input->post('name');
        $upid = $this->input->post('upid');
        $description = $this->input->post('description');
        $keywords = $this->input->post('keywords');
        $data = array(
            'name' => $name,
            'keywords' => $keywords,
            'description' => $description,
            'upid' => $upid
        );
        $userid = $this->session->userdata('id');
        $this->load->model('user/news_model');
        $response = $this->news_model->category_add($data,$userid);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
    

    public function category_edit()
    {
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $id = $this->uri->segment(3,1);
        $data['id'] = $id;
        $userid = $this->session->userdata('id');
        $this->load->model('user/news_model');
        $this->load->model('user/index_model');
        $data['site'] = strip_cslashes($this->index_model->get_site_info());
        $data['user_site'] = strip_cslashes($this->index_model->get_user_site_info($userid));
        $data['category_up'] = strip_cslashes($this->news_model->get_upcategory($userid));
        $data['category_info'] = strip_cslashes($this->news_model->get_category_info($id,$userid));
        $this->load->view('user/news_category_edit',$data);
        
    }
    
    public function category_edit_save()
    {
        $name = $this->input->post('name');
        $upid = $this->input->post('upid');
        $description = $this->input->post('description');
        $keywords = $this->input->post('keywords');
        $id = $this->input->post('id');
        $userid = $this->session->userdata('id');
        $data = array(
            'name' => $name,
            'keywords' => $keywords,
            'description' => $description,
            'upid' => $upid
        );
        $this->load->model('user/news_model');
        $response = $this->news_model->category_edit($data,$id,$userid);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
    
    public function category_del()
    {
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $id = $this->uri->segment(3,1);
        $data['id'] = $id;
        $userid = $this->session->userdata('id');
        $this->load->model('user/news_model');
        $this->load->model('user/index_model');
        $data['site'] = strip_cslashes($this->index_model->get_site_info());
        $data['user_site'] = strip_cslashes($this->index_model->get_user_site_info($userid));
        $data['category_up'] = strip_cslashes($this->news_model->get_upcategory($userid));
        $data['category_info'] = strip_cslashes($this->news_model->get_category_info($id,$userid));
        $this->load->view('user/news_category_del',$data);
    }
    
    public function category_del_save()
    {
        $id = $this->input->post('id');
        $userid = $this->session->userdata('id');
        $this->load->model('user/news_model');
        $response = $this->news_model->category_del($id,$userid);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response); 
    }
    
    public function news_index()
    {
        $fenye = $this->uri->segment(3,0);
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $userid = $this->session->userdata('id');
        $this->load->library('pagination');
        $this->load->model('user/news_model');
        $this->load->model('user/index_model');
        $data['fenye'] = $fenye+1;
        $data['total'] = $this->news_model->news_total($userid);
        $data['per_end'] = ($data['total']-$data['fenye'])>10?$fenye+10:$data['total'];
        $config['base_url'] = site_url().'/user_news/news_index/';
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
        $data['user_site'] = $this->index_model->get_user_site_info($userid);
        $data['news_list'] = $this->news_model->news_list($fenye,$userid);
        $data['news_list'] = $this->flash_data($data['news_list'],$userid);
        $this->load->view('user/news_detail_list',$data);
    }
    
    public function news_add()
    {
        $data['username'] = $this->session->userdata('username');
        $userid = $this->session->userdata('id');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('user/news_model');
        $this->load->model('user/index_model');
        $data['site'] = strip_cslashes($this->index_model->get_site_info());
        $data['user_site'] = strip_cslashes($this->index_model->get_user_site_info($userid));
        $data['category_list'] = strip_cslashes($this->news_model->get_upcategory($userid));
        $this->load->view('user/news_detail_add',$data);
    }
    
    public function news_add_save()
    {
        $userid = $this->session->userdata('id');
        $title = $this->input->post('title');
        $category = $this->input->post('category');
        $content = $this->input->post('data');
        $data = array(
            'title' => $title,
            'category' => $category,
            'content' => $content,
            'time'=>  time(),
            'views'=>'0'
        );        
        $this->load->model('user/news_model');
        $response = $this->news_model->news_add($data,$userid);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
    public function news_edit()
    {
        $id = $this->uri->segment(3,1);
        $data['id'] = $id;
        $data['username'] = $this->session->userdata('username');
        $userid = $this->session->userdata('id');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('user/news_model');
        $this->load->model('user/index_model');
        $data['site'] = strip_cslashes($this->index_model->get_site_info());
        $data['user_site'] = strip_cslashes($this->index_model->get_user_site_info($userid));
        $data['category_list'] = strip_cslashes($this->news_model->get_upcategory($userid));
        $data['news_detail'] = strip_cslashes($this->news_model->get_news_detail($id,$userid));
        $this->load->view('user/news_detail_edit',$data);
    }
    
    public function news_edit_save()
    {
        $userid = $this->session->userdata('id');
        $title = $this->input->post('title');
        $category = $this->input->post('category');
        $content = $this->input->post('content');
        $id = $this->input->post('id');
        $data = array(
            'title' => $title,
            'category' => $category,
            'content' => $content,
            'time'=>  time()
        );        
        $this->load->model('user/news_model');
        $response = $this->news_model->news_edit($data,$id,$userid);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
    
    public function news_del()
    {
        $id = $this->uri->segment(3,1);
        $data['id'] = $id;
        $data['username'] = $this->session->userdata('username');
        $userid = $this->session->userdata('id');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('user/news_model');
        $this->load->model('user/index_model');
        $data['site'] = strip_cslashes($this->index_model->get_site_info());
        $data['user_site'] = strip_cslashes($this->index_model->get_user_site_info($userid));
        $data['category_list'] = strip_cslashes($this->news_model->get_upcategory($userid));
        $data['news_detail'] = strip_cslashes($this->news_model->get_news_detail($id,$userid));
        $this->load->view('user/news_detail_del',$data);
    }
    
    public function news_del_save()
    {
        $id = $this->input->post('id');
        $userid = $this->session->userdata('id');
        $this->load->model('user/news_model');
        $response = $this->news_model->news_del($id,$userid);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response); 
    }
    private function flash_data($param,$userid)
    {
        foreach ($param as $newkey => $newvalue)
        {
            foreach ($newvalue as $key => $value)
            {
                if ($key === 'category')
                {
                    $this->load->model('user/news_model');
                    $category = $this->news_model->get_category_info($value,$userid);
                    $param[$newkey][$key] = $category['name'];
                }
            }
        }
        return $param;
    }
    
}
