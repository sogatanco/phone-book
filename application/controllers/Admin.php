 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Admin extends CI_Controller {  
      //functions  
       function __construct(){
            parent::__construct();

          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->database();
          $this->load->library('pagination');
          $this->load->model('M_admin');
      }
      function login()  
      {  
            if($this->session->userdata('username') != '')  
           {  
                redirect(base_url() . 'admin'); 
           }  
           else  
           {   
            $data['title'] = 'CodeIgniter Simple Login Form With Sessions';  
            $this->load->view("admin/login", $data); 
           }   
           
      }  
      function login_validation()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('M_admin');  
                if($this->M_admin->can_login($username, $password))  
                {  
                     $session_data = array('username'=>$username );  
                     $this->session->set_userdata($session_data);  
                     redirect(base_url() . 'admin');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     redirect(base_url() . 'admin/login');  
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      }  
      function editor($offset=0){  
           if($this->session->userdata('username') != '')  
           {  
                
                
                $config['base_url'] = site_url('admin/editor');
                $config['total_rows'] = $this->db->count_all('phone_list');
                $config['per_page'] = "10";
                $config["uri_segment"] = 3;
                $choice = $config["total_rows"]/$config["per_page"];
                $config["num_links"] = floor($choice);

                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['first_link'] = false;
                $config['last_link'] = false;
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['prev_link'] = '«';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '»';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);

                $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data['phonelist'] = $this->M_admin->show_phone($config["per_page"], $data['page'], NULL); 
                $data['pagination'] = $this->pagination->create_links();
                $data['user']=$this->session->userdata('username');

                $this->load->view('/admin/editor',$data); 

           }  
           else  
           {  
                redirect(base_url() . 'admin/login');  
           }  
      }  
      function logout()  
      {  
           $this->session->unset_userdata('username');  
           redirect(base_url() . 'admin/login');  
      }


      function search(){

         if($this->session->userdata('username') != '')  
           { 
        $search = ($this->input->post("book_name"))? $this->input->post("book_name") : "NIL";

        $search = ($this->uri->segment(3)) ? $this->uri->segment(3) : $search;

        // pagination settings
        $config = array();
        $config['base_url'] = site_url("admin/search/$search");
        $config['total_rows'] = $this->M_admin->get_phone_count($search);
        $config['per_page'] = "10";
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"]/$config["per_page"];
        $config["num_links"] = floor($choice);

        // integrate bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '«';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        // get books list
        $data['phonelist'] = $this->M_admin->show_phone($config['per_page'], $data['page'], $search);

        $data['pagination'] = $this->pagination->create_links();
        $data['user']=$this->session->userdata('username');

        //load view
          $this->load->view('/admin/editor',$data); 
          }  
           else  
           {  
                redirect(base_url() . 'admin/login');  
           }  
    }


    function add(){
      if($this->session->userdata('username') != ''){
         $data['user']=$this->session->userdata('username');
          $this->load->view('/admin/add',$data); 
      }
      else{
         redirect(base_url() . 'admin/login'); 
      }
    }

    function submit(){
     $result = $this->M_admin->submit();
    if($result){
      $this->session->set_flashdata('success_msg', 'Record added successfully');
    }
    redirect(base_url('admin'));
    }

    function update($id){
      if($this->session->userdata('username') != ''){
          $data['user']=$this->session->userdata('username');
          $data['phone'] = $this->M_admin->getPhoneById($id);
          $this->load->view('admin/update', $data);
      }
      else{
         redirect(base_url() . 'admin/login'); 
      }
  }

   function saveUpdate(){
    $result = $this->M_admin->update();
    if($result){
      $this->session->set_flashdata('success_msg', 'Record updated successfully');
    }else{
      $this->session->set_flashdata('error_msg', 'Faill to update record');
    }
    redirect(base_url('admin'));
  }

  function delete($id){
    $result = $this->M_admin->delete($id);
    if($result){
      $this->session->set_flashdata('success_msg', 'Record deleted successfully');
    }else{
      $this->session->set_flashdata('error_msg', 'Faill to delete record');
    }
    redirect(base_url('admin'));
  }

  function info(){
      if($this->session->userdata('username') != ''){
          $data['user']=$this->session->userdata('username');
          $data['info'] = $this->M_admin->getInfo();
          $this->load->view('admin/info', $data);
      }
      else{
         redirect(base_url() . 'admin/login'); 
      }
  }

    function updateSosmed(){
    $result = $this->M_admin->updateSosmed();
    if($result){
      $this->session->set_flashdata('success_msg', 'Record updated successfully');
    }else{
      $this->session->set_flashdata('error_msg', 'Faill to update record');
    }
    redirect(base_url('admin/info'));
  }

      function updateNoun(){
    $result = $this->M_admin->updateNoun();
    if($result){
      $this->session->set_flashdata('success_msg', 'Record updated successfully');
    }else{
      $this->session->set_flashdata('error_msg', 'Faill to update record');
    }
    redirect(base_url('admin/info'));
  }
 }  