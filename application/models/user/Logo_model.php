<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */

class Logo_model extends CI_Model
{
    public function get_logo_info($userid = NULL) {
        $this->load->database();
        $query = $this->db->select('logo')
                ->from($this->config->item('user_logo'))
                ->where('userid',$userid)
                ->get();
        $this->db->close();
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->row_array();
        }  else
        {
            return array('logo'=>'');
        }
    }
    
    public function logo_update($param=  array(),$userid = NULL)
    {
        $this->load->database();
        $query = $this->db->select('id')
                ->from($this->config->item('user_logo'))
                ->where('userid',$userid)
                ->get();
        $total = $query->num_rows();
        if ($total<1)
        {
            $param['userid'] = $userid;
            $this->db->insert($this->config->item('user_logo'),  $this->db->escape_str($param));
        }  else
        {
            $this->db->where('userid',$userid);
            $this->db->update($this->config->item('user_logo'),  $this->db->escape_str($param));
        }
        $id = $this->db->affected_rows();
        $this->db->close();
        $errmsg = '成功';
        $data = '1';
        if ( ! ($id>0))
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