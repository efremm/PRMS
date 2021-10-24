<?php
 class Technician_M extends CI_Model
{
   public $table='technician_result_tbl';
         public $id='technician_result_tbl.emp_id';
         public $order='DESC';
	function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('session');
        
    }
    	//  function getPatientDiagonesis()
    	//     {
    	// 	$query=$this->db->get('patient_tbl');
    	// 	if($query->num_rows() >0){
    	// 		return $query->result();
    	// 	}
    	// }
       function getPatientDiagonesis()
        {
         $this->db->where('technician_result_tbl.checked_by',$this->session->userdata('username'));  
        $query=$this->db->get('technician_result_tbl');
        if($query->num_rows() >0){
            return $query->result();
        }
       }
       function update_patient_result($data,$id)
    {
       $this->db->where("tech_patres_ID",$id);
        $this->db->update("technician_result_tbl",$data); //update table 
    }
       
      //  function getPatientResult()
      //     {
      //   $query=$this->db->get('technician_result_tbl');
      //   if($query->num_rows() >0){
      //     return $query->result();
      //   }
      // }
       function getPatientResult()
        {
          
          $this->db->select('technician_result_tbl.*,tbl_users.emp_id');
          $this->db->order_by($this->id,$this->order);
          $this->db->where('tbl_users.user_name',$this->session->userdata('username'));
          $this->db->join('tbl_users','tbl_users.emp_id = technician_result_tbl.emp_id','left');
           return $this->db->get($this->table)->result();
          
       }
     function fetch_patient_data($id)
    {
      $this->db->where("patient_seq_id",$id);
      $query=$this->db->get("patient_tbl");
      return $query->result();
    }
         function fetch_patientresult_data($id)
    {
      $this->db->where("tech_patres_ID",$id);
      $query=$this->db->get("technician_result_tbl");
      return $query->result();
    }

         public function count_Patient()
        {
         // $this->db->where('user_status', 'inactive');
          $this->db->select('*');
           $this->db->from('Patient_tbl');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
        
         public function count_medical_treatment()
        {
         // $this->db->where('user_status', 'active');
          $this->db->select('*');
          $this->db->from('patient_medical_treatment');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
        
        function fetch_dropdown_technician()
    {
      $this->db->where('title','Lab Technician');
     $query=$this->db->get('member_registration_tbl'); 
    if($query->num_rows() >0){
      return $query->result();
    }
    }
 
  //      

   
	function fetch_request_data($id)
    {
    	$this->db->where('request_id',$id);
    	$query=$this->db->get("request_help_tbl");
    	return $query->result();
    }


    function getTechHelp()
      {
    $query=$this->db->get('technical_problem_tbl');
    if($query->num_rows() >0){
      return $query->result();
    }
  }
    
}
?>