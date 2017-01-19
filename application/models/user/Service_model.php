<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Site_model
 *
 * @author Administrator
 */
class Service_model extends CI_Model{
    //put your code here
    public function get_user_service_info($param = NULL)
    {
        $this->load->database();
        $query = $this->db->select('service')
                ->from($this->config->item('user_service'))
                ->get();
        $this->db->close();
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->row_array();
        }  else
        {
            return array('service'=>'');
        }
    }
    
    public function service_update($param = array(),$userid = NULL)
    {
        $this->load->database();
        $query = $this->db->select('id')
                ->from($this->config->item('user_service'))
                ->where('userid',$userid)
                ->get();
        $total = $query->num_rows();
        if ($total<1)
        {
            $param['userid'] = $userid;
            $this->db->insert($this->config->item('user_service'),  $this->db->escape_str($param));
        }  else
        {
            $this->db->where('userid',$userid);
            $this->db->update($this->config->item('user_service'),  $this->db->escape_str($param));
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
