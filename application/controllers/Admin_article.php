<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Admin_article
 *
 * @author Administrator
 */
class Admin_article extends CI_Controller{
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
        $this->load->model('admin/article_model');
        $this->load->model('admin/index_model');
        $data['site'] = $this->index_model->get_site_info();        
        $data['fenye'] = $fenye+1;
        $data['total'] = $this->article_model->article_total();
        $data['per_end'] = ($data['total']-$data['fenye'])>10?$fenye+10:$data['total'];
        $config['base_url'] = site_url().'/admin_article/index/';
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
        $data['article_list'] = strip_slashes($this->article_model->article_list($fenye));
        $data['article_list'] = $this->flash_data($data['article_list']);
        $this->load->view('admin/article_list',$data);        
    }
    
    private function flash_data($param)
    {
        foreach ($param as $newkey => $newvalue)
        {
            foreach ($newvalue as $key => $value)
            {
                if ($key === 'category')
                {
                    $this->load->model('admin/category_model');
                    $category = $this->category_model->get_category_info($value);
                    $param[$newkey][$key] = $category['categoryname'];
                }
                if ($key === 'pagedelete')
                {
                    switch ($value)
                    {
                        case '1':
                            $val = '已删除';
                            break;

                        default:
                            $val = '已发布';
                            break;
                    }
                    $param[$newkey][$key] = $val;
                }
            }
        }
        return $param;
    }
    
    
    public function add()
    {
        $data['username'] = $this->session->userdata('username');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('admin/category_model');
        $this->load->model('admin/index_model');
        $data['site'] = $this->index_model->get_site_info();
        $data['category_list'] = $this->category_model->category_list();
        $this->load->view('admin/article_add',$data);
        
    }
    
    public function add_save()
    {
        $title = $this->input->post('title');
        $category = $this->input->post('category');
        $degest = $this->input->post('degest');
        $keywords = $this->input->post('keywords');
        $author = $this->input->post('author');
        $editor = $this->input->post('editor');
        $source = $this->input->post('source');
        $dataline = $this->input->post('dataline');
        $pagedelete = $this->input->post('pagedelete');
        $data = $this->input->post('data');
        $flag = $this->input->post('flag');
        $array_data = array(
            'title' => $title,
            'category' => $category,
            'author' => $author,
            'editor' => $editor,
            'source' => $source,
            'dataline' => $dataline,
            'pagedelete' => $pagedelete,
            'keywords' => $keywords,
            'degest' => $degest,
            'data' => $data,
            'pageview' => '0',
            'picture' => ''
                );
        $this->load->model('admin/article_model');
        $response = $this->article_model->article_add($array_data);
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
        $this->load->model('admin/article_model');
        $this->load->model('admin/category_model');
        $this->load->model('admin/index_model');
        $data['site'] = $this->index_model->get_site_info();
        $data['category_list'] = $this->category_model->category_list();
        $data['article_info'] = strip_cslashes($this->article_model->get_article_info($id));
        $this->load->view('admin/article_edit',$data);
        
    }
    
    public function edit_save()
    {
        $title = $this->input->post('title');
        $category = $this->input->post('category');
        $degest = $this->input->post('degest');
        $keywords = $this->input->post('keywords');
        $author = $this->input->post('author');
        $editor = $this->input->post('editor');
        $source = $this->input->post('source');
        $dataline = $this->input->post('dataline');
        $pagedelete = $this->input->post('pagedelete');
        $data = $this->input->post('data');
        $flag = $this->input->post('flag');
        $id = $this->input->post('id');
        $array_data = array(
            'title' => $title,
            'category' => $category,
            'author' => $author,
            'editor' => $editor,
            'source' => $source,
            'dataline' => $dataline,
            'pagedelete' => $pagedelete,
            'keywords' => $keywords,
            'degest' => $degest,
            'data' => $data,
                );
        $this->load->model('admin/article_model');
        $response = $this->article_model->article_edit($array_data,$id);
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
        $this->load->model('admin/article_model');
        $this->load->model('admin/category_model');
        $this->load->model('admin/index_model');
        $data['site'] = $this->index_model->get_site_info();
        $data['category_list'] = $this->category_model->category_list();
        $data['article_info'] = strip_slashes($this->article_model->get_article_info($id));
        $this->load->view('admin/article_del',$data);
        
    }
    
    public function del_save()
    {
        $id = $this->input->post('id');
        $dataline = $this->input->post('dataline');
        $array_data = array(
            'pagedelete' => '1',
            'dataline' => $dataline
                );
        $this->load->model('admin/article_model');
        $response = $this->article_model->article_del($array_data,$id);
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);        
    }
}
