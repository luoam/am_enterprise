<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of Login_model
 *
 * @author Administrator
 */
class Login_model extends CI_Model{
    //put your code here
    
    public function login_check($username = NULL,$password = NULL)
    {
        $this->load->database();
        $query = $this->db->select('id,username,password')
                ->from($this->config->item('user'))
                ->where('username',$username)
                ->limit(1)
                ->get();
        $this->db->close();
        $row = $query->row_array();
        $password_query = $row['password'];
        $rep = array();
        if(md5(md5($password)) === $password_query)
        {

            $rep['id'] = $row['id'];
            $rep['username'] = $row['username'];
            $rep['login'] = '1';            
        }else
        {
            $rep['id'] = '';
            $rep['username'] = '';
            $rep['login'] = '0';              
        }
        return $rep;
    }
}
