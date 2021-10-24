<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Doctor_C extends CI_Controller{
  function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
          $this->load->model('Doctor_M');
    }
      
       public  function Help(){
         $this->load->Model('Doctor_M');
          $posts=$this->Doctor_M->getTechHelp();
         $this->load->view('doctor/ViewtechnicalHelp',['posts'=>$posts]);
           
          }
           public function patient_fetch($id)
            {
               $this->load->Model('Doctor_M');
         $post["fetch_data"]=$this->Doctor_M->fetch_patient_data($id);
          $this->load->view('Doctor/PatienAssigTech_Fetch',$post);
              }
              public function patient_info_fetch($id)
            {
               $this->load->Model('Doctor_M');
         $post["fetch_data"]=$this->Doctor_M->fetch_patient_data($id);
         $post["fetch_data_result"]=$this->Doctor_M->fetch_patient_result($id);
         $post["fetch_technician"]=$this->Doctor_M->fetch_dropdown_technician();
         $post["fetch_nurse"]=$this->Doctor_M->fetch_dropdown_nurse();
          $this->load->view('Doctor/PatientTreatment',$post);
              }

      
	    public  function home(){
            // $this->load->view('header');
             $this->load->Model('Doctor_M');
              $post["cnt_Patient"]=$this->Doctor_M->count_Patient(); 
              $post["cnt_ptreatment"]=$this->Doctor_M->count_ptreated(); 
            // $this->load->view('Doctor/doctorNavbar');
            $this->load->view('Doctor/DoctorDashboard',$post);
                     }
       
       
           public  function PatientDashboard(){
                $this->load->Model('Doctor_M');
               $username=$this->input->post("hidden_name");
                // $qnty=$this->input->post("quantity");
                 // check if the data is available
           // if( $this->Doctor_M->fetch_username($username) > 0)
           //    {

              $posts=$this->Doctor_M->getPatientData();
              $this->load->view('doctor/PatientManage' ,['posts'=>$posts]);
               // }
             }
             
	     public  function PatientReg(){
              $this->load->view('doctor/PatientReg');
               }
  
     public  function additemform(){
            $this->load->view('header');
            $this->load->view('doctor/doctorsNavbar');
            $this->load->view('doctor/AddItemForm');
            $this->load->view('footer'); 
          }
         
          //Patient form
           public  function PatientRegistration(){
            $this->load->view('header');
            $this->load->view('doctor/doctorsNavbar');
          
            $this->load->view('doctor/Patient_Registration');
            $this->load->view('footer'); 
          }
         
           public  function PatientTrmtDashboard(){
         
                  $this->load->Model('Doctor_M');
              $posts=$this->Doctor_M->getPatientTrtmtData();
            // $this->load->view('doctors/CamDashboard',['posts'=>$posts]);
              $this->load->view('doctor/PatientTrmtDetail' ,['posts'=>$posts]);
              }
           public  function PatientAssigntoTech(){
            
         
                  $this->load->Model('Doctor_M');
               $posts=$this->Doctor_M->getPatientData();
              $this->load->view('doctor/PatienttoTechncian' ,['posts'=>$posts]);

              }
        public function patient_assigntech_fetch($id)
            {
               $this->load->Model('Doctor_M');
             $post["fetch_data"]=$this->Doctor_M->fetch_patient_data($id);
              // $post["fetch_data_tech"]=$this->Doctor_M->fetch_tech_result();
              $post["fetch_technician"]=$this->Doctor_M->fetch_dropdown_technician();
            $this->load->view('Doctor/PatienAssigTech_Fetch',$post);
              }
                public  function MemberRegManage()
                     {
              $this->load->Model('Doctor_M');
              $posts=$this->Doctor_M->getMember();
              $this->load->view('doctor/MemberRegManage' ,['posts'=>$posts]);
                  }
          public  function MemberReg(){
                    
              $this->load->view('doctor/MemberReg');
           
                }
          function update_member_fetch($id)
             {
        $this->load->model('Doctor_M');
         $post["fetch_data"]=$this->Doctor_M->fetch_member_data($id);
         $this->load->view('doctor/MemberUpdate',$post);
       
          }
  
    //add doctor treatment
    public function AddTreatment() 
         {
     $this->load->Library('form_validation');
       $this->form_validation->set_rules("patientid","patient_ID",'required|min_length[2]');
        $this->form_validation->set_rules("patient_case","patient_case",'required|min_length[2]');
        $this->form_validation->set_rules('patient_detail_case','patient_detail_case','required|min_length[2]');
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
        
       if($this->form_validation->run()) 
        { 
              // valid form
            $this->load->model("Doctor_M");
        $data=array(
          "patient_ID" =>$this->input->post("patientid"),
              "patient_case" =>$this->input->post("patient_case"),
              "patient_detail_case" =>$this->input->post("patient_detail_case"),
            "drug_type" =>$this->input->post("drug_type"),
            "medication_type" =>$this->input->post("medication_type"),
            "patient_treatment_drugs" =>$this->input->post("patient_treatment_drugs"),
            "consumption_interval" =>$this->input->post("consumption_interval"),
             "total_time" =>$this->input->post("total_time"),
            "checkup_time" =>$this->input->post("checkup_time"),
            "checked_date" =>$this->input->post("checked_date"),
            "ckecked_by" =>$this->input->post("ckecked_by"));

              if($this->input->post("add"))
            {
            $this->Doctor_M->save_treatment_data($data);
              $this->session->set_flashdata('successmsg','successfully Registered!');
            redirect(base_url() . "Doctor_C/savedTreatment",'refresh');

           
              }
              else 
              {
                   $this->session->set_flashdata('errormsg','Failed to save');
                 $this->PatientDashboard();
                
              }
            }
              else{
                redirect(base_url() . "Doctor_C/patient_info_fetch");
                       // $this->patient_info_fetch();
                       }
      }
    
    function savedTreatment()
    {
     $this->PatientDashboard();
                
    } 
       //add doctor treatment
    public function AddAssignTechnician() 
         {
     $this->load->Library('form_validation');
       $this->form_validation->set_rules("patientid","patient_ID",'required|min_length[2]');
        $this->form_validation->set_rules("patient_case","patient_case",'required|min_length[2]');
        // $this->form_validation->set_rules('patient_detail_case','patient_detail_case','required|min_length[2]');
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
        
       if($this->form_validation->run()) 
        { 
              // valid form
            $this->load->model("Doctor_M");
        $data=array(
           
           "emp_id" =>$this->input->post("technician_ID"),
          "patient_ID" =>$this->input->post("patientid"),
            "patient_case" =>$this->input->post("patient_case"),
             "blood_test_result" =>$this->input->post("blood_test_result"),
            "stool_test_result" =>$this->input->post("stool_test_result"),
            "urine_test_result" =>$this->input->post("urine_test_result"),
            "other_tests" =>$this->input->post("other_tests"),
             "assigned_date" =>$this->input->post("assigned_date"),
            "assigned_by" =>$this->input->post("assigned_by"));

              if($this->input->post("add"))
            {
            $this->Doctor_M->save_patientassign_data($data);
              $this->session->set_flashdata('successmsg','successfully Registered!');
            redirect(base_url() . "Doctor_C/savedTechAssign",'refresh');

           
              }
              else 
              {
                   $this->session->set_flashdata('errormsg','Failed to save');
                 $this->PatientAssigntoTech();
                
              }
            }
              else{
                redirect(base_url() . "Doctor_C/patient_assigntech_fetch");
                       // $this->patient_info_fetch();
                       }
      }
    
    function savedTechAssign()
    {
     $this->PatientAssigntoTech();
                
    } 
    function update_Patient_fetch($id)
      {
        $this->load->model('Doctor_M');
      
         $post["fetch_data"]=$this->Doctor_M->fetch_Patient_data($id);
        $this->load->view('doctor/PatientUpdate',$post);
           
       }
     function update_ptreatment_fetch($id)
      {
        $this->load->model('Doctor_M');
          $post["fetch_nurse"]=$this->Doctor_M->fetch_dropdown_nurse();
         $post["fetch_data"]=$this->Doctor_M->fetch_ptreatment_data($id);
       
            $this->load->view('doctor/UpdatePtreatment',$post);
      
       }
  
   public function update_Patient_trt()
    {
        $this->load->model("Doctor_M");
         $this->load->Library('form_validation');
        
         // if($this->form_validation->run()) 
         //      { 
              // valid form
            $this->load->model("Doctor_M");
        $data=array(
            "patient_ID" =>$this->input->post("patientid"),
            "patient_case" =>$this->input->post("patient_case"),
             "patient_detail_case" =>$this->input->post("patient_detail_case"),
            "drug_type" =>$this->input->post("drug_type"),
            "medication_type" =>$this->input->post("medication_type"),
            "patient_treatment_drugs" =>$this->input->post("patient_treatment_drugs"),
            "consumption_interval" =>$this->input->post("consumption_interval"),
             "total_time" =>$this->input->post("total_time"),
            "checkup_time" =>$this->input->post("checkup_time"),

             "checked_date" =>$this->input->post("checked_date"),
            "ckecked_by" =>$this->input->post("ckecked_by"),
            "pharmacist_approval" =>$this->input->post("pharmacist_approval"),

            "pharmacist_approval_date" =>$this->input->post("pharmacist_approval_date"),
            "medicine_status" =>$this->input->post("medicine_status"),
            "assigned_nurse" =>$this->input->post("assigned_nurse"),

           "assigned_nurse" =>$this->input->post("assigned_nurse"),
            "nurse_approval" =>$this->input->post("nurse_approval"),
            "nurse_approval_date" =>$this->input->post("nurse_approval_date"));
        if($this->input->post("update"))
        {
            $this->Doctor_M->update_patient_treatment($data,$this->input->post("hidden_id"));
              $this->session->set_flashdata('successmsg','updated successfully');
            redirect(base_url() . "Doctor_C/updatedPatient",'refresh');
      
        }
        else 
        {
             $this->session->set_flashdata('errormsg','Failed to update');
           $this->PatientTrmtDashboard();
          
         }
      // }
      //   else
      //   {
      //      $this->PatientDashboard();
      //   }
       
    }
   
    function updatedPatient()
    {
        $this->PatientTrmtDashboard();
    } 
       function delete_ptreatment_c($ptrtmid){
        // $id=$this->uri->segment(3);
        $this->load->model("Doctor_M");
        $this->Doctor_M->delete_ptraetment_m($ptrtmid);
        $this->session->set_flashdata('successmsg','deleted successfully');
        redirect(base_url() . "Doctor_C/deleted_ptrtm_redirect");
        
    }
    public function deleted_ptrtm_redirect()
    {
      $this->PatientTrmtDashboard();  
    }
     public function deleted_Patient_redirect()
    {
      $this->PatientDashboard();  
    }
    function delete_member_c($memberid){
        // $id=$this->uri->segment(3);
        $this->load->model("Doctor_M");
        $this->Doctor_M->delete_member_m($memberid);
        $this->session->set_flashdata('successmsg','deleted successfully');
        redirect(base_url() . "Doctor_C/deleted_member_redirect");
        
    }
    public function deleted_member_redirect()
    {
      $this->MemberRegManage();  
    }
}
?>