<?php

/* 
 * Author : luoanman
 * Blog : http://www.luoanman.com
 * Email : 609892502@qq.com
 */

class Application_model extends CI_Model
{
    public function get_application_info() 
    {
        $this->load->database();
        $query = $this->db->select('application_1,application_2,application_3,application_4,application_5,application_6')
                ->from($this->config->item('user_application'))
                ->get();
        $this->db->close();
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->row_array();
        }  else
        {
            return array('application_1'=>'','application_2'=>'','application_3'=>'','application_4'=>'','application_5'=>'','application_6'=>'');
        }
    }
    
    public function application_update($param = array(),$userid = NULL)
    {
        $this->load->database();
        $query = $this->db->select('id')
                ->from($this->config->item('user_application'))
                ->where('userid',$userid)
                ->get();
        $total = $query->num_rows();
        if ($total<1)
        {
            $param['userid'] = $userid;
            $this->db->insert($this->config->item('user_application'),  $this->db->escape_str($param));
        }  else
        {
            $this->db->where('userid',$userid);
            $this->db->update($this->config->item('user_application'),  $this->db->escape_str($param));
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