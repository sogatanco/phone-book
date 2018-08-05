<?php  
 class M_admin extends CI_Model  
 {  
      function __construct(){
          parent::__construct();
      }
      function can_login($username, $password)  
      {  
           $this->db->where('username', $username);  
           $this->db->where('password', $password);  
           $query = $this->db->get('admin');  
           //SELECT * FROM admin WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      } 
       function show_phone($limit, $start, $st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from phone_list where contact_name like '%$st%' order by contact_name limit " . $start . ", " . $limit;
          $query = $this->db->query($sql);
          return $query->result();
      } 
      function get_phone_count($st = NULL){
          if ($st == "NIL") $st = "";
          $sql = "select * from phone_list where contact_name like '%$st%' order by contact_name";
          $query = $this->db->query($sql);
          return $query->num_rows();
      } 

      function submit(){
          $field = array(
          'number'=>$this->input->post('number'),
          'contact_name'=>$this->input->post('name'),
          'location'=>$this->input->post('location')
          );
          $this->db->insert('phone_list', $field);
          if($this->db->affected_rows() > 0){
            return true;
          }else{
            return false;
          }
      }

    function getPhoneById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('phone_list');
        if($query->num_rows() > 0){
          return $query->row();
        }else{
          return false;
        }
    }

  public function update(){
    $id = $this->input->post('id');
    $field = array(
      'number'=>$this->input->post('number'),
      'contact_name'=>$this->input->post('name'),
      'location'=>$this->input->post('location')
      );
    $this->db->where('id', $id);
    $this->db->update('phone_list', $field);
    echo $this->db->last_query();extit;
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }


  public function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('phone_list');
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

  function getInfo(){
        $query = $this->db->get('info');
        if($query->num_rows() > 0){
          return $query->row();
        }else{
          return false;
        }
    }

    function updateSosmed(){
    $field = array(
      'fb'=>$this->input->post('fb'),
      'twitter'=>$this->input->post('twitter'),
      'ig'=>$this->input->post('ig'),
      'yt'=>$this->input->post('yt')
      );
    $this->db->update('info', $field);
    echo $this->db->last_query();extit;
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

     function updateNoun(){
    $field = array(
      'noun'=>$this->input->post('noun')
      );
    $this->db->update('info', $field);
    echo $this->db->last_query();extit;
    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

 
 }  