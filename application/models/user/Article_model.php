<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Article_model
 *
 * @author Administrator
 */
class Article_model extends CI_Model{
    //put your code here
    
    public function article_list($fenye = NULL,$lmt = '10')
    {
        $this->load->database();
        $fenye = $this->db->escape_str($fenye);
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->limit($lmt,$fenye)
                ->order_by('id','asc')
                ->get();
        $this->db->close();
        return $query->result_array();
        
    }
    public function article_total()
    {
        $this->load->database();
        $query = $this->db->select('id')
                ->from($this->config->item('article'))
                ->get();
        $this->db->close();
        return $query->num_rows();
    }
    
    public function article_add($param)
    {
        $this->load->database();
        $this->db->insert($this->config->item('article'), $this->escape_str_define($param));
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
            'data' => $data
        );
        return $response;
    }

    public function article_edit($param = array(),$id = NULL)
    {
        $this->load->database();
        $this->db->where('id',  $this->db->escape_str($id));
        $this->db->update($this->config->item('article'), $this->escape_str_define($param));
        $aid = $this->db->affected_rows();
        $this->db->close();
        $errmsg = '成功';
        $data = '1';
        if ( ! is_numeric($aid))
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
    
    public function get_article_info($id = NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('article'))
                ->where('id',  $this->db->escape_str($id))
                ->get();
        $this->db->close();
        return $query->row_array();
    }
    
    public function article_del($param = array(),$id = NULL)
    {
        $this->load->database();
        $this->db->where('id',  $this->db->escape_str($id));
        $this->db->update($this->config->item('article'),  $this->db->escape_str($param));
        $aid = $this->db->affected_rows();
        $this->db->close();
        $errmsg = '成功';
        $data = '1';
        if ( ! is_numeric($aid) OR $aid<1)
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
    
    public function escape_str_define($param) 
    {
        foreach ($param as $key => $value)
        {
//            if ($key !== 'data')
//            {
                $param[$key] = $this->db->escape_str($value);
//            }
        }
    return $param;
    }
}
