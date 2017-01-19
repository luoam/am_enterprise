<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Contact_model
 *
 * @author Administrator
 */
class Contact_model extends CI_Model{
    //put your code here
    public function get_user_contact_info($userid = NULL)
    {
        $this->load->database();
        $query = $this->db->select('address,tel1,tel2,fax,email')
                ->from($this->config->item('user_contact'))
                ->where('userid',$userid)
                ->get();
        $this->db->close();
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->row_array();
        }  else
        {
            return array('address'=>'','tel1'=>'','tel2'=>'','fax'=>'','email'=>'');
        }
    }
    
    public function contact_update($param = array(),$userid = NULL)
    {
        $this->load->database();
        $query = $this->db->select('id')
                ->from($this->config->item('user_contact'))
                ->where('userid',$userid)
                ->get();
        $total = $query->num_rows();
        if ($total<1)
        {
            $param['userid'] = $userid;
            $this->db->insert($this->config->item('user_contact'),  $this->db->escape_str($param));
        }  else
        {
            $this->db->where('userid',$userid);
            $this->db->update($this->config->item('user_contact'),  $this->db->escape_str($param));
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
