<?php

class M_pb extends CI_Model{
	    function __construct(){
        	parent::__construct();
    	}

      function show_phone($limit, $start, $st = NULL){
		if ($st == "NIL") $st = "";
        $sql = "select * from phone_list where contact_name like '%$st%' order by contact_name limit " . $start . ", " .$limit;
        $query = $this->db->query($sql);
        return $query->result();
      } 
      function get_phone_count($st = NULL){
        if ($st == "NIL") $st = "";
        $sql = "select * from phone_list where contact_name like '%$st%' order by contact_name";
        $query = $this->db->query($sql);
        return $query->num_rows();
      } 

      function getInfo(){
        $query = $this->db->get('info');
        if($query->num_rows() > 0){
          return $query->row();
        }else{
          return false;
        }
    }  

}