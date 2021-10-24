<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
// require_once (APPPATH.'core/Custom_Controller.php');
 class Technician_C extends CI_Controller{

   function __construct()
    {
         parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Technician_M');
           $this->load->model('Pharmacist_M');
               
    }
   
     public  function Help(){

           
            $this->load->view('header');
            $this->load->view('Admin/AdminNavbar');
           
            $this->load->view('Admin/Help');
            $this->load->view('footer'); 
                     }
    public  function TechnicianDashboard(){
             
             $post["cnt_Patient"]=$this->Technician_M->count_Patient(); 
             
              $post["cnt_pmd"]=$this->Technician_M->count_medical_treatment(); 
             
          $this->load->view('Technician/TechnicianDashboard',$post);
                  

          }
             public function patient_info_fetch($id)
            {
               $this->load->Model('Technician_M');
         $post["fetch_technician"]=$this->Technician_M->fetch_dropdown_technician();
         $post["fetch_data"]=$this->Technician_M->fetch_patient_data($id);
          $this->load->view('Technician/PateintDetail',$post);
              }
           
           public  function PatientDiagonesisManage(){
           
            $this->load->Model('Technician_M');
           $posts=$this->Technician_M->getPatientDiagonesis();

            $this->load->view('Technician/PatientDiagonesisManage',['posts'=>$posts]);
            // $this->load->view('footer'); 
          }
          public  function PatientResultManage(){
            $this->load->Model('Technician_M');
           $posts=$this->Technician_M->getPatientResult();
            $this->load->view('Technician/TechnicianResultManage',['posts'=>$posts]);
          } 
           function FetchUpdatePResult($id)
            {
         $this->load->Model('Technician_M');
         $post["fetch_data"]=$this->Technician_M->fetch_patientresult_data($id);
         $post["fetch_technician"]=$this->Technician_M->fetch_dropdown_technician();
           $this->load->view('Technician/PatientResult',$post);
        }
          public  function ViewStatus(){
           
            $this->load->Model('Patient_M');
           $posts=$this->Patient_M->getRequest();
            $this->load->view('Patient/ViewVhclStatus',['posts'=>$posts]);
            // $this->load->view('footer'); 
          }
      
        public function AddResultTechnician() 
         {
     $this->load->Library('form_validation');
       // $this->form_validation->set_rules("patientid","patient_ID",'required|min_length[2]');
       //  $this->form_validation->set_rules("patient_case","patient_case",'required|min_length[2]');
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
        
       // if($this->form_validation->run()) 
       //  { 
              // valid form
            $this->load->model("Technician_M");
        $data=array(
          "patient_ID" =>$this->input->post("patientid"),
           "emp_id" =>$this->input->post("empid"),
            "patient_case" =>$this->input->post("patient_case"),
             "blood_test_result" =>$this->input->post("blood_test_result"),
            "stool_test_result" =>$this->input->post("stool_test_result"),
            "urine_test_result" =>$this->input->post("urine_test_result"),
             "other_tests" =>$this->input->post("other_tests"),
             "assigned_date" =>$this->input->post("assigned_date"),
            "assigned_by" =>$this->input->post("assigned_by"),
          "checked_date" =>$this->input->post("checked_date"),
            "checked_by" =>$this->input->post("checked_by"));

              if($this->input->post("update"))
            {
              $this->Technician_M->update_patient_result($data,$this->input->post("hidden_id"));
              $this->session->set_flashdata('successmsg','successfully update!');
            redirect(base_url() . "Technician_C/savedTechResult",'refresh');

           
              }
              else 
              {
                   $this->session->set_flashdata('errormsg','Failed to update');
                 $this->PatientResultManage();
                
              }
            // }
            //   else{
            //     redirect(base_url() . "Technician_C/FetchUpdatePResult");
            //            // $this->patient_info_fetch();
            //            }
      }
    
    function savedTechResult()
    {
     $this->PatientResultManage();
                
    } 

      
    
	function delete_service_c($requestid){
      
        $this->load->model("Technician_M");
        $this->Technician_M->delete_service_m($requestid);
        $this->session->set_flashdata('successmsg','user data deleted successfully');
        redirect(base_url() . "Technician_C/ServiceDetailRegManage");
        
    }
    public function deleted_request_redirect()
    {
      $this->RequestRegManage();  
    }
    public  function ViewTechHelp(){
              $this->load->Model('Patient_M');
           $posts=$this->Patient_M->getTechHelp();
                   $this->load->view('Patient/ViewTechHelp',['posts'=>$posts]);
          }
}
?>