<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Index_model
 *
 * @author Administrator
 */
class Index_model extends CI_Model{
    //put your code here
    public function get_site_info()
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('site'))
                ->get();
        $this->db->close();
        return $query->row_array();        
    }
    public function get_dashang_info() {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('dashang'))
                ->get();
        $this->db->close();
        return $query->row_array();
    }    
    public function get_tupian_info() {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('tupian'))
                ->get();
        $this->db->close();
        return $query->row_array();
    }    
    public function get_article_total()
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->get();
        $this->db->close();
        return $query->num_rows();        
    }
    
    public function get_search_article_total($param = 'hello') 
    {
        $this->load->database();
        $param = $this->db->escape_str($param);
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->like('title',$param)
                ->or_like('degest',$param)
                ->get();
        $this->db->close();
        return $query->num_rows();        
    }
    public function get_search_article_list($search = 'hello',$fenye = NULL,$lmt = '10')
    {
        $this->load->database();
        $fenye = $this->db->escape_str($fenye);
        $search = $this->db->escape_str($search);
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->like('title',$search)
                ->or_like('degest',$search)
                ->limit($lmt,$fenye)
                ->order_by('id','desc')
                ->get();
        $this->db->close();
        return $query->result_array();
    }    
    public function get_article_total_by_category($id = NULL)
    {
        $this->load->database();
        $id =  $this->db->escape_str($id);
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->where('category',$id)
                ->get();
        $this->db->close();
        return $query->num_rows();        
    }
    
    public function get_category_info($param = NULL)
    {
        $this->load->database();
        $param = $this->db->escape_str($param);
        $query = $this->db->select('*')
                ->from($this->config->item('category'))
                ->where('id',$param)
                ->get();
        $this->db->close();
        return $query->row_array();
    }
    public function get_article_list($fenye = NULL,$lmt = '10')
    {
        $this->load->database();
        $fenye = $this->db->escape_str($fenye);
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->limit($lmt,$fenye)
                ->order_by('id','desc')
                ->get();
        $this->db->close();
        return $query->result_array();
    }
    public function get_article_list_by_category($id = NULL,$fenye = NULL)
    {
        $this->load->database();
        $id = $this->db->escape_str($id);
        $fenye = $this->db->escape_str($fenye);
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->where('category',$id)
                ->limit(10,$fenye)
                ->order_by('id','desc')
                ->get();
        $this->db->close();
        return $query->result_array();
    }
    public function get_hot_list()
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->limit(10)
                ->order_by('pageview','desc')
                ->get();
        $this->db->close();
        return $query->result_array();
    }    
    
    public function get_category_list()
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('category'))
                ->where('upcategory','0')
                ->where('flag','1')
                ->limit(5)
                ->get();
        $this->db->close();
        return $query->result_array();        
    }

    public function get_links_list()
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('links'))
                ->get();
        $this->db->close();
        return $query->result_array();        
    }

    public function get_link_info($id = NULL)
    {
        $this->load->database();
        $id = $this->db->escape_str($id);
        $query = $this->db->select('*')
                ->from($this->config->item('links'))
                ->where('id',$id)
                ->get();
        $this->db->close();
        return $query->row_array();
    }
    
    public function get_article_info($id = NULL)
    {
        $this->load->database();
        $id = $this->db->escape_str($id);
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->where('id',$id)
                ->get();
        $this->db->close();
        return $query->row_array();
    }
    
    public function get_pre_article_info($id = NULL)
    {
        $this->load->database();
        $id = $this->db->escape_str($id);
        $query = $this->db->select('id,title')
                ->from($this->config->item('article'))
                ->where('id<',$id)
                ->order_by('id','desc')
                ->limit(1)
                ->get();
        $this->db->close();
        return $query->row_array();
    }

    public function get_next_article_info($id = NULL)
    {
        $this->load->database();
        $query = $this->db->select('id,title')
                ->from($this->config->item('article'))
                ->where('id>',  $this->db->escape_str($id))
                ->limit(1)
                ->get();
        $this->db->close();
        return $query->row_array();
    }

    public function get_comment_list_top10($lmt = '10')
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('comments'))
                ->order_by('id','desc')
                ->limit($lmt)
                ->get();
        $this->db->close();
        return $query->result_array();        
    }    
    public function get_comment_info($id = NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('comments'))
                ->where('id',  $this->db->escape_str($id))
                ->get();
        $this->db->close();
        return $query->row_array();
    }    
    public function get_comment_list_by_article($id = NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('comments'))
                ->where('thread_key',  $this->db->escape_str($id))
                ->get();
        $this->db->close();
        return $query->result_array();        
    }
    
    public function comment_add($param = array())
    {
        $this->load->database();
        $this->db->insert($this->config->item('comments'),  $this->db->escape_str($param));
        $id = $this->db->insert_id();
        $this->db->close();
        $errmsg = '成功';
        $data = '1';
        if ( ! is_numeric($id))
        {
            $errmsg = '失败';
            $data = '0';
        }
        $response = array(
            'errmsg' => $errmsg,
            'data' => $data,
        );
        return $response;
    }
    
    public function link_add($param = array())
    {
        $this->load->database();
        $query = $this->db->select('weburl')
                ->from($this->config->item('links'))
                ->where('weburl',$param['weburl'])
                ->limit(1)
                ->get();
        if($query->num_rows()===1)
        {
            $id = 'string';
        }else
        {
        $this->db->insert($this->config->item('links'),  $this->db->escape_str($param));
        $id = $this->db->insert_id();
        }
        $this->db->close();
        $errmsg = '成功';
        $data = '1';
        if ( ! is_numeric($id))
        {
            $errmsg = '失败';
            $data = '0';
        }
        $response = array(
            'errmsg' => $errmsg,
            'data' => $data
        );
        return $response;
    }
    
    public function update_pageview($id)
    {
        $this->load->database();
        $this->db->set('pageview', 'pageview+1', FALSE);
        $this->db->where('id',  $this->db->escape_str($id));
        $this->db->update($this->config->item('article'));
    }
    
    public function update_linkview($id)
    {
        $this->load->database();
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('id',  $this->db->escape_str($id));
        $this->db->update($this->config->item('links'));
    }
}