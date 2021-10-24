<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class AuthenticationModel extends CI_Model
{
	
	function __construct()
	{
		// Call the CI_Model constructor
		 parent::__construct();
		 $this->load->library('session');
	}


    function check_empid($empid)
        {
          $this->db->where('emp_id',$empid);
         $query=$this->db->get('member_registration_tbl'); 
         // if (!empty($query->result_array())){
         //    return 1;
         //  }
         if($query->num_rows() >= 1){
          return $query->result();
          // return true;
        }
        }
        function check_userempid($userid)
        {
          $this->db->where('user_id',$userid);
         $query=$this->db->get('tbl_users'); 
         // if (!empty($query->result_array())){
         //    return 1;
         //  }
         if($query->num_rows() >= 1){
          return $query->result();
          // return true;
        }
        }
         function check_username($uname)
        {
          $this->db->where('user_name',$uname);
         $query=$this->db->get('tbl_users'); 
         // if (!empty($query->result_array())){
         //    return 1;
         //  }
         if($query->num_rows() >= 1){
          return $query->result();
          // return true;
        }
        }
        public function get_last_ten_entries()
        {
                $query = $this->db->get('entries', 10);
                return $query->result();
        }
        public function login ($username,$password)
            {
        $this->db->where("user_name",$username);
        $this->db->where("user_password",$password);
          $this->db->where("user_status","active");
        $query=$this->db->get("tbl_users");
                if ($query->num_rows()>0)
                {
                 foreach($query->result() as $rows)
                   {
                       $newdata=array('username' => $rows->user_name,
                           'logged_in' => TRUE,
                       );
//                       $this->session->set_userdata('username', $rows->user_name);
                   }

                 $this->session->set_userdata($newdata);
                 return true;
                }
                return false;
            }
            // 

    function CheckUserRole($username){
      

          $this->db->select('user_type,user_status');
          $this->db->where('user_name', $username);

          $result = $this->db->get('tbl_users');
          $data = array_shift($result->result_array());
         // echo($data['user_type']);
        return $data;
    }
            
    function getPosts()
      {
    $query=$this->db->get('tbl_users');
    if($query->num_rows() >0){
      return $query->result();
    }
  }

  public function save_user($data)
    {
      $this->db->insert("tbl_users",$data);
    }
     
    function fetch_data($id)
    {
      $this->db->where('user_id',$id);
      $query=$this->db->get("tbl_users");
      return $query->result();
    }
      function update_users($data,$id)
    {
       $this->db->where("user_id",$id);
        $this->db->update("tbl_users",$data); //update table clip_item_registration
    }

  
          public function count_all_user()
        {
         
          $this->db->select('*');
          $this->db->from('tbl_users');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
         public function count_active_user()
        {
         $this->db->where('user_status', 'active');
          // $this->db->select('*');
          $this->db->from('tbl_users');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
         public function count_inactive_user()
        {
         $this->db->where('user_status', 'inactive');
           $this->db->from('tbl_users');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
         public function count_inuse()
        {
         $this->db->where('user_status', 'active');
          // $this->db->select('*');
          $this->db->from('tbl_users');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
          function delete_user_m($id)
           {
     $this->db->where("user_id",$id);
     $this->db->delete("tbl_users");
        }
        public function save_case($data)
    {
      $this->db->insert("technical_problem_tbl",$data);
    }
  function getCase()
      {
    $query=$this->db->get('technical_problem_tbl');
    if($query->num_rows() >0){
      return $query->result();
    }
  }
  function getSystemHelp()
      {
    $query=$this->db->get('system_help_tbl');
    if($query->num_rows() >0){
      return $query->result();
    }
  }
   public function save_system_case($data)
    {
      $this->db->insert("system_help_tbl",$data);
    }
    function fetch_activeusers()
    {
               
     $this->db->where("user_status",'active');
     $this->db->get('tbl_users'); 
      $query=$this->db->count_all_results();
    // if($query->num_rows() >0){
      return $query->result();
    // }
    }
     function fetch_inactiveusers()
    {
     $query=$this->db->get('tbl_users'); 
    if($query->num_rows() >0){
      return $query->result();
    }
    }
     function fetch_inuseusers()
    {
     $query=$this->db->get('tbl_users'); 
    if($query->num_rows() >0){
      return $query->result();
    }
    }
     function fetch_empid($empiddb)
    {
      $this->db->where('emp_id',$empiddb);
     $query=$this->db->get('member_registration_tbl'); 
    if($query->num_rows() >0){
      return $query->result();
    }
    }
     
}
?>