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
class Site_model extends CI_Model{
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
}
