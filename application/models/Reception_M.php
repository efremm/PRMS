<?php
 class Reception_M extends CI_Model
{
	function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('session');
    }
	
	 public function save_Patient_data($data)
    {
      $this->db->insert("Patient_tbl",$data);
    }
     public function save_employee_data($data)
    {
      $this->db->insert("member_registration_tbl",$data);
    }
    function fetch_patient_data($id)
    {
      $this->db->where("patient_ID",$id);
      $query=$this->db->get("patient_tbl");
      return $query->result();
    }
     function fetch_employee_data($id)
    {
      $this->db->where("emp_id",$id);
      $query=$this->db->get("member_registration_tbl");
      return $query->result();
    }
   
    function getMember()
        {
        $query=$this->db->get('member_registration_tbl');
        if($query->num_rows() >0){
            return $query->result();
        }
       }
     function update_patient($data,$id)
    {
       $this->db->where("patient_ID",$id);
        $this->db->update("patient_tbl",$data); //update table member_registration_tbl
    }
       function fetch_dropdown_doctor()
    {
      $this->db->where("title",'Dr');
     $query=$this->db->get('member_registration_tbl'); 
    if($query->num_rows() >0){
      return $query->result();
    }
    }
      public function count_employee()
        {
         // $this->db->where('user_status', 'active');
          $this->db->select('*');
          $this->db->from('member_registration_tbl');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
        function getPatient()
        {
        $query=$this->db->get('patient_tbl');
        if($query->num_rows() >0){
            return $query->result();
        }
       }
        
        //  public function fetch_user_id($usrname)
        // {
        //  $this->db->where('user_name', $usrname);
        //    $this->db->from('tbl_users');
        //   $count_ = $this->db->get()->num_rows();
        //   return $count_;
        // }
         public function count_Patient()
        {
         // $this->db->where('user_status', 'inactive');
          $this->db->select('*');
           $this->db->from('Patient_tbl');
          $count_ = $this->db->get()->num_rows();
          return $count_;
        }
         function getPatientData()
        {
        $query=$this->db->get('patient_tbl');
        if($query->num_rows() >0){
            return $query->result();
        }
       }
        function delete_patient_m($id)
    {
     $this->db->where("patient_ID",$id);
     $this->db->delete("patient_tbl");
    }
     function delete_employee_m($id)
    {
     $this->db->where("emp_id",$id);
     $this->db->delete("member_registration_tbl");
    }

   
    
        function getRequestPatient()
        {
        $query=$this->db->get('patient_tbl');
        if($query->num_rows() >0){
            return $query->result();
        }
      }
       
     function update_employee($data,$id)
    {
       $this->db->where("emp_id",$id);
        $this->db->update("member_registration_tbl",$data); //update table 
    }
   
}
?>