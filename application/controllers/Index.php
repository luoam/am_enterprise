<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Index
 *
 * @author Administrator
 */
class Index extends CI_Controller{
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','form','security','string','cookie'));
    }
    
    public function index()
    {
        $fenye = $this->uri->segment(3,0);
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->library('pagination');
        $this->load->model('index/index_model');
        $data['site'] = xss_clean(strip_slashes($this->index_model->get_site_info()));        
        $data['tupian'] = xss_clean(strip_slashes($this->index_model->get_tupian_info()));
        $data['article_total'] = $this->index_model->get_article_total();
        $config['base_url'] = site_url().'/index/index/';
        $config['total_rows'] = $data['article_total'];
        $config['per_page'] = 10;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '上一页';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '下一页';
        $config['cur_tag_open'] = '<li><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['category_list'] = xss_clean(strip_slashes($this->index_model->get_category_list()));
        $data['article_list'] = $this->index_model->get_article_list($fenye);
        $data['article_list'] = xss_clean(strip_slashes($this->flash_data($data['article_list'])));
        $data['hot_list'] = xss_clean(strip_slashes($this->index_model->get_hot_list()));
        $data['comment_top10'] = $this->index_model->get_comment_list_top10();
        $data['comment_top10'] = xss_clean(strip_cslashes($this->flash_data_comment($data['comment_top10'])));
        $this->load->view('index/index',$data);
        
    }

    public function rss()
    {
        $this->load->helper('xml');
        $this->load->helper('text');
        $this->load->model('index/index_model');
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $data['site'] = xss_clean(strip_slashes($this->index_model->get_site_info()));     
        $data['article_list'] = $this->index_model->get_article_list((int)'0',(int)'20');
        header("Content-Type: application/rss+xml"); 
        $this->load->view('index/rss',$data);      
    }
    
    public function search()
    {
        $search_get = $this->uri->segment(3,'hello');
        $search = urldecode($search_get);
        $fenye = $this->uri->segment(4,0);
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->library('pagination');
        $this->load->model('index/index_model');
        $data['site'] = xss_clean(strip_slashes($this->index_model->get_site_info()));     
        $data['tupian'] = xss_clean(strip_slashes($this->index_model->get_tupian_info()));
        $data['article_total'] = $this->index_model->get_search_article_total($search);
        $config['base_url'] = site_url().'/index/search/'.  urlencode($search).'/';
        $config['total_rows'] = $data['article_total'];
        $config['per_page'] = 10;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '上一页';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '下一页';
        $config['cur_tag_open'] = '<li><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['category_list'] = xss_clean(strip_slashes($this->index_model->get_category_list()));
        $data['article_list'] = $this->index_model->get_search_article_list($search,$fenye);
        $data['article_list'] = xss_clean(strip_slashes($this->flash_data($data['article_list'])));
        $data['hot_list'] = xss_clean(strip_slashes($this->index_model->get_hot_list()));
        $data['comment_top10'] = $this->index_model->get_comment_list_top10();
        $data['comment_top10'] = xss_clean(strip_cslashes($this->flash_data_comment($data['comment_top10'])));
        $this->load->view('index/index',$data);   
    }
    
    public function category()
    {
        $id = $this->uri->segment(3,1);
        $fenye = $this->uri->segment(4,0);
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->library('pagination');
        $this->load->model('index/index_model');
        $data['site'] = xss_clean(strip_slashes($this->index_model->get_site_info()));     
        $data['tupian'] = xss_clean(strip_slashes($this->index_model->get_tupian_info()));
        $data['article_total'] = $this->index_model->get_article_total_by_category($id);
        $config['base_url'] = site_url().'/index/category/'.$id.'/';
        $config['total_rows'] = $data['article_total'];
        $config['per_page'] = 10;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['prev_link'] = '上一页';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['next_link'] = '下一页';
        $config['cur_tag_open'] = '<li><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['category_list'] = xss_clean(strip_slashes($this->index_model->get_category_list()));
        $data['category_info'] = $this->index_model->get_category_info($id);
        $data['category_info'] = xss_clean(strip_slashes($this->flash_data_category($data['category_info'])));
        $data['article_list'] = $this->index_model->get_article_list_by_category($id,$fenye);
        $data['article_list'] = xss_clean(strip_slashes($this->flash_data($data['article_list'])));
        $data['hot_list'] = xss_clean(strip_slashes($this->index_model->get_hot_list()));
        $data['comment_top10'] = $this->index_model->get_comment_list_top10();
        $data['comment_top10'] = xss_clean(strip_cslashes($this->flash_data_comment($data['comment_top10'])));
        $this->load->view('index/category',$data);
        
    }    
    
    public function article()
    {
        $id = $this->uri->segment(3,1);
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('index/index_model');
        $this->index_model->update_pageview($id);
        $data['site'] = xss_clean(strip_slashes($this->index_model->get_site_info()));        
        $data['tupian'] = xss_clean(strip_slashes($this->index_model->get_tupian_info()));
        $data['category_list'] = xss_clean(strip_slashes($this->index_model->get_category_list()));
        $data['article_info'] = $this->index_model->get_article_info($id);
        $data['article_info'] = strip_cslashes($this->flash_data_article($data['article_info']));
        $data['comment_list'] = $this->index_model->get_comment_list_by_article($id);
        $data['comment_list'] = xss_clean(strip_cslashes($this->flash_data_comment($data['comment_list'])));
        $data['hot_list'] = xss_clean(strip_slashes($this->index_model->get_hot_list()));
        $data['pre_article_info'] = $this->index_model->get_pre_article_info($id);
        $data['next_article_info'] = $this->index_model->get_next_article_info($id);
        $data['comment_top10'] = $this->index_model->get_comment_list_top10();
        $data['dashang'] = xss_clean(strip_slashes($this->index_model->get_dashang_info()));
        $data['comment_top10'] = xss_clean(strip_cslashes($this->flash_data_comment($data['comment_top10'])));
        $data['cookie_author'] = array(
            'author_name' => $this->input->cookie('author_name'),
            'author_email' => $this->input->cookie('author_email'),
            'author_url' => $this->input->cookie('author_url')
        );
        $this->load->view('index/article',$data);
        
    }    

    public function links()
    {
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('index/index_model');
        $data['site'] = xss_clean(strip_slashes($this->index_model->get_site_info()));   
        $data['tupian'] = xss_clean(strip_slashes($this->index_model->get_tupian_info()));
        $data['category_list'] = xss_clean(strip_slashes($this->index_model->get_category_list()));
        $data['links_list'] = xss_clean(strip_slashes($this->index_model->get_links_list()));
        $data['hot_list'] = xss_clean(strip_slashes($this->index_model->get_hot_list()));
        $data['comment_top10'] = $this->index_model->get_comment_list_top10();
        $data['comment_top10'] = xss_clean(strip_slashes($this->flash_data_comment($data['comment_top10'])));
        $this->load->view('index/links',$data);
        
    } 

    public function link_jump()
    {
        $id = $this->uri->segment(3,1);
        $data['base_url'] = $this->config->base_url();
        $data['site_url'] = $this->config->site_url();
        $this->load->model('index/index_model');
        $this->index_model->update_linkview($id);
        $link_array = $this->index_model->get_link_info($id);
        redirect($link_array['weburl']);
        
    } 
    
    public function link_add()
    {
        $webname = $this->input->post('webname');
        $weburl = $this->input->post('weburl');
        $keywords = $this->input->post('keywords');
        $degest = $this->input->post('degest');
        $name = $this->input->post('name');
        $tel = $this->input->post('tel');
        $email = $this->input->post('email');
        $time = time();
        $views = '0';
        $flag = '0';
        $data_array = array(
            'webname' => $webname,
            'weburl' => $weburl,
            'keywords' => $keywords,
            'description' => $degest,
            'name' => $name,
            'tel' => $tel,
            'email' => $email,
            'time' => $time,
            'views' => $views,
            'flag' => $flag
        );
        if ($webname === NULL OR $weburl === NULL) {
            $errmsg = '失败';
            $data = '0';
            $response = array(
            'errmsg' => $errmsg,
            'data' => $data
            ); 
        }  else {
            $this->load->model('index/index_model');
            $response = $this->index_model->link_add($data_array);    
        }      
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);       
        
    }
    
    public function comment_save()
    {
        $author_name = $this->input->post('author_name');
        $author_email = $this->input->post('author_email');
        $author_url = $this->input->post('author_url');
        $message = $this->input->post('message');
        $up_id = $this->input->post('up_id');
        $thread_key = $this->input->post('thread_key');
        $ip = $this->input->ip_address();
        $agent = $this->input->user_agent();
        $created_at = $this->input->post('created_at');
        $data_array = array(
            'author_name' => $author_name,
            'author_email' => $author_email,
            'author_url' => $author_url,
            'message' => $message,
            'up_id' => $up_id,
            'thread_key' => $thread_key,
            'ip' => $ip,
            'agent' => $agent,
            'created_at' => $created_at
        );
       if ($author_name === NULL OR $message === NULL OR ! is_numeric($thread_key)) {
            $errmsg = '失败';
            $data = '0';
            $response = array(
            'errmsg' => $errmsg,
            'data' => $data
            ); 
       }  else {
           $cookie_author_name = array(
                'name'   => 'author_name',
                'value'  => $author_name,
                'expire' => '86500',
                'domain' => 'luoanman.com',
           );
           $cookie_author_email = array(
                'name'   => 'author_email',
                'value'  => $author_email,
                'expire' => '86500',
                'domain' => 'luoanman.com',
           );
           $cookie_author_url = array(
                'name'   => 'author_url',
                'value'  => $author_url,
                'expire' => '86500',
                'domain' => 'luoanman.com',
           );
           $this->input->set_cookie($cookie_author_name);
           $this->input->set_cookie($cookie_author_email);
           $this->input->set_cookie($cookie_author_url);
            $this->load->model('index/index_model');
            $response = $this->index_model->comment_add($data_array);     
            $response['csrf_token'] = $this->security->get_csrf_hash();
            if ($up_id !=='0') {
                $comment_info = $this->index_model->get_comment_info($up_id);
                $mail_message='<td style="background:#FAFAFA">  
    <div style="background-color:white;border-top:2px solid #12ADDB;box-shadow:0 1px 3px #AAAAAA;line-height:180%;padding:0 15px 12px;max-width:500px;margin:50px auto;color:#222;font-family:Century Gothic,Trebuchet MS,Hiragino Sans GB,微软雅黑,Microsoft Yahei,Tahoma,Helvetica,Arial,SimSun,sans-serif;font-size:12px;">  
        <h2 style="border-bottom:1px solid #DDD;font-size:14px;font-weight:normal;padding:13px 0 10px 8px;"><span style="color: #12ADDB;font-weight: bold;">&gt; </span>您在博客<a style="text-decoration:none;color: #12ADDB;" href="'.$this->config->base_url().'" target="_blank"> '.$this->config->item('title').' </a>上的留言有回复啦！</h2>  
        <div style="padding:0 12px 0 12px;margin-top:18px">  
            <p>'.$author_name.'给您的回复如下：</p>  
            <p style="background-color: #12ADDB;border: 0px solid #DDD;padding: 10px 15px;margin:18px 0;color: #ffffff;border-radius: 10px;">'.$message.'</p>  
            <p>查看原文:</p>  
            <p style="background-color: #ff6574;border: 0px solid #DDD;padding: 10px 15px;margin:18px 0;color: #ffffff;border-radius: 10px;">{unwrap}'.$this->config->base_url().'index/article/'.$thread_key.'#comment'.$up_id.'{/unwrap}</p>  
            <p>本邮件为系统自动发送，请勿直接回复，感谢您对<a target="_blank" href="'.$this->config->base_url().'" target="_blank"> '.$this->config->item('title').'</a>的关注！</p>  
        </div>  
    </div>  
</td>';
                
                
//                $mail_message = $author_name.'回复了您的评论：<br><div style="border:1px solid;padding:10px 10px">';
//                $mail_message = $mail_message.$message.'<br>';
//                $mail_message = $mail_message.'</div>查看原文';
//                $mail_message = $mail_message.'{unwrap}'.$this->config->base_url().'index/article/'.$thread_key.'#comment'.$up_id.'{/unwrap}';
                $this->load->library('email');
                $this->email->from('609892502@qq.com');
                $this->email->to($comment_info['author_email']);
                $this->email->subject($comment_info['author_name'].'评论回复');
                $this->email->message($mail_message);
                $this->email->send();
            }
       }





       
       
       
        $this->output->set_header('Content-Type: application/json;charset=utf-8');
        echo json_encode($response);                
    }
    
    private function flash_data($param)
    {
        foreach ($param as $newkey => $newvalue)
        {
            foreach ($newvalue as $key => $value)
            {
                if ($key === 'category')
                {
                    $this->load->model('index/index_model');
                    $category = $this->index_model->get_category_info($value);
                    $param[$newkey]['categoryname'] = $category['categoryname'];
                }
//                if ($key === 'upcategory')
//                {
//                    $this->load->model('index/index_model');
//                    $category = $this->index_model->get_category_info($value);
//                    $param[$newkey]['upcategoryid'] = $category['id'];
//                    $param[$newkey]['upcategoryname'] = $category['categoryname'];
//                }
            }
        }
        return $param;
    }
    private function flash_data_category($param)
    {
            foreach ($param as $key => $value)
            {
                if ($key === 'upcategory')
                {
                    $this->load->model('index/index_model');
                    $category = $this->index_model->get_category_info($value);
                    $param['upcategoryname'] = $category['categoryname'];
                }
            }
        return $param;
    }

    private function flash_data_article($param)
    {
            foreach ($param as $key => $value)
            {
                if ($key === 'category')
                {
                    $this->load->model('index/index_model');
                    $category = $this->index_model->get_category_info($value);
                    $param['categoryname'] = $category['categoryname'];
                }
            }
        return $param;
    }

    private function flash_data_comment($param)
    {
        foreach ($param as $newkey => $newvalue)
        {
            foreach ($newvalue as $key => $value)
            {
                if ($key === 'up_id')
                {
                    $this->load->model('index/index_model');
                    $comment = $this->index_model->get_comment_info($value);
                    $param[$newkey]['up_author_name'] = $comment['author_name'];
                }
            }
        }
        return $param;
    } 
}
