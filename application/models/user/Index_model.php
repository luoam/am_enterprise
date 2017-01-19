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
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->row_array();
        }  else
        {
            return array('name'=>'','keywords'=>'','description'=>'','copyright'=>'','icp'=>'','tongji'=>'');
        }
    }
    
    public function get_user_site_info($param = NULL)
    {
        $this->load->database();
        $query = $this->db->select('name,keywords,description')
                ->from($this->config->item('user_site'))
                ->where('userid',  $this->db->escape_str($param))
                ->get();
        $this->db->close();
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->row_array();
        }  else
        {
            return array('name'=>'','keywords'=>'','description'=>'');
        }
    }
}
