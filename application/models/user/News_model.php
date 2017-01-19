<?php

/*
 * author:Anman Luo
 * website:http://www.luoanman.com
 */

/**
 * Description of News_model
 *
 * @author Administrator
 */
class News_model extends CI_Model{
    //put your code here
    public function category_list($fenye = NULL,$userid = NULL,$lmt = '10')
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('user_news_category'))
                ->where('userid',$userid)
                ->limit($lmt,$fenye)
                ->order_by('id','asc')
                ->get();
        $this->db->close();
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->result_array();
        }  else
        {
            return array(0=>array('id'=>'','name'=>'','upid'=>'','keywords'=>'','description'=>''));
        }
    }

    public function category_total($userid = NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('user_news_category'))
                ->where('userid',  $this->db->escape_str($userid))
                ->get();
        $this->db->close();
        return $query->num_rows();
    }
    
    public function get_upcategory($userid = NULL)
    {
        $this->load->database();
        $query = $this->db->select('id,name')
                ->from($this->config->item('user_news_category'))
                ->where('upid','0')
                ->where('userid',$this->db->escape_str($userid))
                ->get();
        $this->db->close();        
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->result_array();
        }  else
        {
            return array(0=>array('id'=>'','name'=>''));
        }
    }
    
    
    public function category_add($param=array(),$userid=NULL)
    {
        $this->load->database();
        $query = $this->db->select('id')
                ->from($this->config->item('user_news_category'))
                ->where('userid',  $this->db->escape_str($userid))
                ->where('name',  $this->db->escape_str($param['name']))
                ->get();
        $num = $query->num_rows();
        $errmsg = '成功';
        $data = '1';
        if($num>0)
        {
            $errmsg ='栏目名称已经存在';
            $data = '0';
        }  else
        {
            $param['userid']=$userid;
            $this->db->insert($this->config->item('user_news_category'),$this->db->escape_str($param));
        }        
        $id = $this->db->insert_id();
        $this->db->close();        
        if ( ! is_numeric($id))
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
    
    public function get_category_info($id = NULL,$userid=NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('user_news_category'))
                ->where('id',$this->db->escape_str($id))
                ->where('userid',  $this->db->escape_str($userid))
                ->get();
        $this->db->close();
        $num = $query->num_rows();
        if($num>0)
        {
            return $query->row_array();
        }else
        {
            return array('name'=>'','upid'=>'','keywords'=>'','description'=>'');
        }
        
    }
    
    public function category_edit($param = array(),$id=NULL,$userid = NULL)
    {
        $this->load->database();
        $this->db->where('id',$this->db->escape_str($id));
        $this->db->where('userid',  $this->db->escape_str($userid));
        $this->db->update($this->config->item('user_news_category'),$this->db->escape_str($param));
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
    
    public function category_del($id=NULL,$userid=NULL)
    {
        $this->load->database();        
        $query = $this->db->select('id')
                ->from($this->config->item('user_news'))
                ->where('category',$this->db->escape_str($id))
                ->get();
        $query2 = $this->db->select('id')
                ->from($this->config->item('user_news_category'))
                ->where('upid',$this->db->escape_str($id))
                ->get();
        $errmsg = '成功';
        $data = '1';
        if( ! ($query->num_rows()>0 OR $query2->num_rows()>0))
        {
            $this->db->where('id',$this->db->escape_str($id));
            $this->db->where('userid',$userid);
            $this->db->delete($this->config->item('user_news_category'));
            $aid = $this->db->affected_rows();
            if ( ! is_numeric($aid) OR $id<1)
            {
                $errmsg = '失败';
                $data = '0';
            }            
        }  else
        {
            $errmsg = '该栏目下有下级栏目或者文章';
            $data = '0';
        }
        $this->db->close();
        $response = array(
            'errmsg' => $errmsg,
            'data' => $data
        );
        return $response;
    }
    
    public function news_total($userid = NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('user_news'))
                ->where('userid',  $this->db->escape_str($userid))
                ->get();
        $this->db->close();
        return $query->num_rows();
    }
    public function news_list($fenye = NULL,$userid = NULL,$lmt = '10')
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('user_news'))
                ->where('userid',$userid)
                ->limit($lmt,$fenye)
                ->order_by('id','asc')
                ->get();
        $this->db->close();
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->result_array();
        }  else
        {
            return array(0=>array('id'=>'','title'=>'','category'=>''));
        }
    }
    public function news_add($param=array(),$userid=NULL)
    {
        $this->load->database();
        $query = $this->db->select('id')
                ->from($this->config->item('user_news'))
                ->where('userid',  $this->db->escape_str($userid))
                ->where('title',  $this->db->escape_str($param['title']))
                ->get();
        $num = $query->num_rows();
        $errmsg = '成功';
        $data = '1';
        if($num>0)
        {
            $errmsg ='新闻名称已经存在';
            $data = '0';
        }  else
        {
            $param['userid']=$userid;
            $this->db->insert($this->config->item('user_news'),$this->db->escape_str($param));
        }        
        $id = $this->db->insert_id();
        $this->db->close();        
        if ( ! is_numeric($id))
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
    
    public function get_news_detail($id = NULL,$userid = NULL)
    {
        $this->load->database();
        $query = $this->db->select('*')
                ->from($this->config->item('user_news'))
                ->where('userid',$userid)
                ->where('id',$id)
                ->order_by('id','asc')
                ->get();
        $this->db->close();
        $num = $query->num_rows();
        if ($num>0)
        {
            return $query->row_array();
        }  else
        {
            return array('id'=>'','title'=>'','category'=>'','content'=>'');
        }
    }

    public function news_edit($param = array(),$id=NULL,$userid = NULL)
    {
        $this->load->database();
        $this->db->where('id',$this->db->escape_str($id));
        $this->db->where('userid',  $this->db->escape_str($userid));
        $this->db->update($this->config->item('user_news'),$this->db->escape_str($param));
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
    
    public function news_del($id=NULL,$userid=NULL)
    {
        $this->load->database();        
        $errmsg = '成功';
        $data = '1';
        $this->db->where('id',$this->db->escape_str($id));
        $this->db->where('userid',$userid);
        $this->db->delete($this->config->item('user_news'));
        $aid = $this->db->affected_rows();
        if ( ! is_numeric($aid) OR $id<1)
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
}
