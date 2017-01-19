<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Comment_model
 *
 * @author Administrator
 */
class Comment_model extends CI_Model{
    //put your code here
    public function comment_list($fenye = NULL,$lmt = '10')
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('comments'))
                ->limit($lmt,$fenye)
                ->order_by('id','asc')
                ->get();
        $this->db->close();
        return $query->result_array();
    }
    
    public function comment_total()
    {
        $this->load->database();
        $query = $this->db->select('id')
                ->from($this->config->item('comments'))
                ->get();
        $this->db->close();
        return $query->num_rows();
    }   
    
    public function get_comment_info($id = NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('comments'))
                ->where('id',$this->db->escape_str($id))
                ->get();
        $this->db->close();
        return $query->row_array();
    }
    
    public function comment_edit($param = array(),$id = NULL)
    {
        $this->load->database();
        $this->db->where('id',$this->db->escape_str($id));
        $this->db->update($this->config->item('comments'),$this->db->escape_str($param));
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
    
    public function comment_del($id = NULL)
    {
        $this->load->database();
        $this->db->where('id',$this->db->escape_str($id));
        $this->db->delete($this->config->item('comments'));
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
}
