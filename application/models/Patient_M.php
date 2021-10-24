<?php
 class Patient_M extends CI_Model
{
	function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('session');
    }
	 function getPtreatment()
	    {
		$query=$this->db->get('patient_medical_treatment');
		if($query->num_rows() >0){
			return $query->result();
		}
	}
  function searchPatient($pid)
      {
    $this->db->where('patient_ID', $pid);
    $query=$this->db->get('patient_medical_treatment');
    if($query->num_rows() >0){
      return $query->result();
    }
  }
  
    public function save_Patient($data)
    {
      $this->db->insert("Patient_tbl",$data);
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
       function getPatientTrtmtData()
        {
         $this->db->where('patient_medical_treatment.ckecked_by',$this->session->userdata('username'));  
        $query=$this->db->get('patient_medical_treatment');
        if($query->num_rows() >0){
            return $query->result();
        }
       }

	   function displayPatientData($pinfo)
        {
           $this->db->where('patient_medical_treatment.patient_ID',$pinfo);  
        $query=$this->db->get('patient_medical_treatment');
        if($query->num_rows() >0){
            return $query->result();
        }
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