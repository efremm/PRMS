<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Pharmacist_C extends CI_Controller{
	function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
         $this->load->model('Pharmacist_M');
     }
      
       public  function Help(){
            $this->load->view('header');
            $this->load->view('doctors/doctorsNavbar');
            $this->load->view('doctors/Help');
            $this->load->view('footer'); 
          }
  
	        public  function PharmacistDashboard(){
             $post["allpatient"]=$this->Pharmacist_M->count_all_patient();
               $post["allpatient"]=$this->Pharmacist_M->count_all_ptreatment();
              $this->load->view('Pharmacist/PharmacistDashboard',$post);
            }
            public  function PateintMedicine(){
            $this->load->Model('Pharmacist_M');
              // $posts=$this->Doctor_M->getPatientData();
              // $this->load->view('doctor/PatientManage' ,['posts'=>$posts]);
               $posts=$this->Pharmacist_M->getPTreatment();
              $this->load->view('Pharmacist/PatientResultManage',['posts'=>$posts]);
            }
            public  function MedicineDetail(){
            $this->load->Model('Pharmacist_M');
              $posts=$this->Pharmacist_M->getPMedicine();
              $this->load->view('Pharmacist/MedicineDetail',['posts'=>$posts]);
            }
            
       public function patient_detail_fetch($id)
            {
               $this->load->Model('Pharmacist_M');
         $post["fetch_data"]=$this->Pharmacist_M->fetch_patient_data($id);
         $post["fetch_data_result"]=$this->Pharmacist_M->fetch_patient_result($id);
         $post["fetch_data_medicine"]=$this->Pharmacist_M->fetch_patient_medicine($id);
         $post["fetch_technician"]=$this->Pharmacist_M->fetch_dropdown_technician();
          $this->load->view('Pharmacist/PatientTreatmentMedicine',$post);
              }
          //vconfirm medicine by pharmacist
      public function AddPatientMedicine() 
         {
     $this->load->Library('form_validation');
       // $this->form_validation->set_rules("patientid","patient_ID",'required|min_length[2]');
       //  $this->form_validation->set_rules("patient_case","patient_case",'required|min_length[2]');
       //  $this->form_validation->set_rules('patient_detail_case','patient_detail_case','required|min_length[2]');
         // $this->form_validation->set_rules('drug_type','drug_type','required|min_length[2]');
         //  $this->form_validation->set_rules('medication_type','medication_type','required|min_length[2]');
         //   $this->form_validation->set_rules('patient_treatment_drugs','patient_treatment_drugs','required|min_length[1]');
         //    $this->form_validation->set_rules('licrenewaldt','renewal date','required|min_length[2]');
         //     $this->form_validation->set_rules('consumption_interval','consumption_interval','required|min_length[2]');
         //    $this->form_validation->set_rules('total_time','total_time','required|min_length[1]');
         //   $this->form_validation->set_rules('checkup_time','checkup_time','required|min_length[2]|min_length[1]');
         //    $this->form_validation->set_rules('checkde_date','total_date','required|min_length[1]');
         //    $this->form_validation->set_rules('checkde_date','total_date','required|min_length[1]');
         //   $this->form_validation->set_rules('ckecked_by','ckecked_by','required|min_length[2]|min_length[1]');
        
       // if($this->form_validation->run()) 
       //  { 
              // valid form
            $this->load->model("Pharmacist_M");
        $data=array(
          "patient_seq_id" =>$this->input->post("patient_seq_id"),
          "patient_ID" =>$this->input->post("patientid"),
            "patient_case" =>$this->input->post("patient_case"),
             "patient_detail_case" =>$this->input->post("patient_detail_case"),
            "drug_type" =>$this->input->post("drug_type"),
            "medication_type" =>$this->input->post("medication_type"),
            "price" =>$this->input->post("price"),
            "patient_treatment_drugs" =>$this->input->post("patient_treatment_drugs"),
            "consumption_interval" =>$this->input->post("consumption_interval"),
             "total_time" =>$this->input->post("total_time"),
            "checkup_time" =>$this->input->post("checkup_time"),

             "checked_date" =>$this->input->post("checked_date"),
            "ckecked_by" =>$this->input->post("ckecked_by"),
            "pharmacist_approval" =>$this->input->post("pharmacist_approval"),
            "pharmacist_approval_date" =>$this->input->post("pharmacist_approval_date"),
            "medicine_status" =>$this->input->post("medicine_status"));

           if($this->input->post("update"))
            {
            $this->Pharmacist_M->update_patient_medicine($data,$this->input->post("hidden_id"));
              $this->session->set_flashdata('successmsg','updated successfully');
             redirect(base_url() . "Pharmacist_C/savedMedicinet",'refresh');
           }
              else 
              {
                   $this->session->set_flashdata('errormsg','Failed to save');
                 $this->PateintMedicine();
                
              }
            // }
            //   else{
            //     redirect(base_url() . "Pharmacist_C/patient_detail_fetch");
                   
            //            }
      }
    
    function savedMedicinet()
    {
     $this->PateintMedicine();
                
    } 
 
 

    function saved()
    {
        $this->AccessoryReg(); 
    }
    
    
}
?>