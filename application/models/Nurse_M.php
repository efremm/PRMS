<?php
 class Nurse_M extends CI_Model
{
  public $table='patient_medical_treatment';
  public $id='emp_id';
  public $order='DESC';
	function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('session');
    }
	       public function save_treatment_data($data)
            {
              $this->db->insert("patient_medical_treatment",$data);
            }
        
        function fetch_patient_result($id)
    {
      $this->db->where('patient_seq_id',$id);
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
         public function count_ptreated()
        {
         // $this->db->where('user_status', 'active');
          $this->db->select('*');
          $this->db->from('patient_medical_treatment');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
       //   function getPatientTrt()
       //  {
       //    // $this->db->where('patient_medical_treatment.ckecked_by',$this->session->userdata('username'));  
       //    $this->db->where("medication_type",'Follow Up');
       //    $this->db->or_where("medication_type",'Surgery');
       //  $query=$this->db->get('patient_medical_treatment');
       //  if($query->num_rows() >0){
       //      return $query->result();
       //  }
       // }
       function getPatientTrt()
        {
         $this->db->select('patient_medical_treatment.*,tbl_users.emp_id');
          $this->db->order_by($this->id,$this->order);
          $this->db->where('tbl_users.user_name',$this->session->userdata('username'));
            $this->db->where("medication_type",'Follow Up');
          $this->db->or_where("medication_type",'Surgery');
          $this->db->join('tbl_users','tbl_users.emp_id = patient_medical_treatment.assigned_nurse','left');
           return $this->db->get($this->table)->result();
         }
        function getPatientTrtmtData()
        {
          $this->db->where("medication_type",'Follow Up');
        $query=$this->db->get('patient_medical_treatment');
        if($query->num_rows() >0){
            return $query->result();
        }
       }
       
        function update_patient_treatment($data,$id)
          {
             $this->db->where("patient_mt_id",$id);
              $this->db->update("patient_medical_treatment",$data); //update table member_registration_tbl
          }
       function fetch_tech_result()
        {
        $query=$this->db->get('technician_result_tbl');
        if($query->num_rows() >0){
            return $query->result();
        }
       }
       // function fetch_tech_result($id)
       //  {
       //    $this->db->where('patient_ID',$id);
       //    $query=$this->db->get("technician_result_tbl");
       //    return $query->result();
       //  }
       function fetch_dropdown_technician()
    {
     $query=$this->db->get('technician_list_tbl'); 
    if($query->num_rows() >0){
      return $query->result();
    }
    }
     
         public function save_patientassign_data($data)
    {
      $this->db->insert("technician_result_tbl",$data);
    }
	 public function save_Patient_data($data)
    {
      $this->db->insert("Patient_tbl",$data);
    }
     public function save_member_data($data)
    {
      $this->db->insert("member_registration_tbl",$data);
    }
    function fetch_member_data($id)
    {
      $this->db->where('member_id',$id);
      $query=$this->db->get("member_registration_tbl");
      return $query->result();
    }
        function delete_ptraetment_m($id)
    {
     $this->db->where("patient_mt_id",$id);
     $this->db->delete("patient_medical_treatment");
    }
   
  
   
    function getSystemHelp()
      {
    $query=$this->db->get('system_help_tbl');
    if($query->num_rows() >0){
      return $query->result();
    }
  }
     
    
}

?>