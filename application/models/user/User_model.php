<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of User_model
 *
 * @author Administrator
 */
class User_model extends CI_Model{
    //put your code here
    
    public function user_list($fenye = NULL,$lmt = '10')
    {

        
    }
    public function user_total()
    {

    }
    
    public function user_add($param)
    {

    }

    public function user_edit($param = array(),$id = NULL)
    {
        $this->load->database();
        $errmsg = '成功';
        $data = '1';
        $this->db->where('id',$this->db->escape_str($id));
        $this->db->update($this->config->item('user'),$this->db->escape_str($param));
        $aid = $this->db->affected_rows();
        if ( ! is_numeric($aid))
        {
            $errmsg = '失败';
            $data = '0';
        }    
        $this->db->close();  
        $response = array(
            'errmsg' => $errmsg,
            'data' => $data
        );
        return $response;
    }
    
    public function get_user_user_info($id = NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('user'))
                ->where('id',$this->db->escape_str($id))
                ->get();
        $this->db->close();
        return $query->row_array();
    }
    
    public function user_del($id = NULL)
    {

    }
}
