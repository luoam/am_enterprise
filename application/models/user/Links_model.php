<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Links_model
 *
 * @author Administrator
 */
class Links_model extends CI_Model{
    //put your code here
    public function links_add($param = array())
    {
        $this->load->database();
        $this->db->insert($this->config->item('links'),$this->db->escape_str($param));
        $id = $this->db->insert_id();
        $this->db->close();
        $errmsg = '成功';
        $data = '1';
        if ( ! is_numeric($id) OR $id<1)
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
    
    
    public function links_list($fenye = NULL,$lmt = '10')
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('links'))
                ->limit($lmt,$fenye)
                ->order_by('id','asc')
                ->get();
        $this->db->close();
        return $query->result_array();
    }

    public function links_total()
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('links'))
                ->get();
        $this->db->close();
        return $query->num_rows();
    }
    
    public function get_links_info($id = NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('links'))
                ->where('id',$this->db->escape_str($id))
                ->get();
        $this->db->close();
        return $query->row_array();
    }
    
    public function links_edit($param = array(),$id = NULL)
    {
        $this->load->database();
        $this->db->where('id',$this->db->escape_str($id));
        $this->db->update($this->config->item('links'),$this->db->escape_str($param));
        $id = $this->db->affected_rows();
        $this->db->close();
        $errmsg = '成功';
        $data = '1';
        if ( ! is_numeric($id) OR $id<1)
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
    public function links_del($id = NULL)
    {
        $this->load->database();
        $this->db->where('id',$this->db->escape_str($id));
        $this->db->delete($this->config->item('links'));
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
