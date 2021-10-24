<?php
 class Pharmacist_M extends CI_Model
{
	function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('session');
    }
    public function count_all_patient()
        {
         
          $this->db->select('*');
          $this->db->from('patient_tbl');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
         public function count_all_ptreatment()
        {
         
          $this->db->select('*');
          $this->db->from('patient_medical_treatment');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
        public function count_all_pdiagonesis()
        {
         
          $this->db->select('*');
          $this->db->from('technician_result_tbl');
          $count_ = $this->db->get()->num_rows();
          return $count_;

        }
      
        function getPTreatment()
        {
        $query=$this->db->get('Patient_tbl');
        if($query->num_rows() >0){
            return $query->result();
        }
       }
       function getPMedicine()
        {
        $query=$this->db->get('patient_medical_treatment');
        if($query->num_rows() >0){
            return $query->result();
        }
       }
       
   function fetch_patient_result($id)
    {
      $this->db->where('patient_seq_id',$id);
      $query=$this->db->get("technician_result_tbl");
      return $query->result();
    }
	 function fetch_patient_data($id)
    {
      $this->db->where('patient_seq_id',$id);
      $query=$this->db->get("patient_tbl");
      return $query->result();
    }
     function fetch_ptreatment_data($id)
    {
      $this->db->where('patient_mt_id',$id);
      $query=$this->db->get("patient_medical_treatment");
      return $query->result();
    }
    function fetch_dropdown_technician()
    {
     $query=$this->db->get('member_registration_tbl'); 
    if($query->num_rows() >0){
      return $query->result();
    }
    }
     function fetch_patient_medicine($id)
    {
      $this->db->where('patient_seq_id',$id);
      $query=$this->db->get("patient_medical_treatment");
      return $query->result();
    }
    function update_patient_medicine($data,$id)
    {
       $this->db->where("patient_seq_id",$id);
        $this->db->update("patient_medical_treatment",$data); //update table accessory
    }
    // public function save_patient_medicine($data)
    // {
    //   $this->db->insert("patient_medical_treatment",$data);
    // }
      
        function set_available_quantity($data,$id)
         {
      // $this->db->set("available_quantity",$data);
      $this->db->set('available_quantity', 'available_quantity + ' . (int) $data, FALSE);
       $this->db->where("receive_vouc_no",$id);
        $this->db->update("accessory_tbl"); //update table accessory
    }
     
     

     function getPosts()
      {
    $query=$this->db->get('ac_tbl');
    if($query->num_rows() >0){
      return $query->result();
    }
  }
   
  function delete_m($id)
    {
     $this->db->where("item_id",$id);
     $this->db->delete("a_tbl");
    }
     function fetch_dropdown_Patients()
    {
     $query=$this->db->get('Patient_tbl'); 
    if($query->num_rows() >0){
      return $query->result();
    }
    }
    
    
}
?>