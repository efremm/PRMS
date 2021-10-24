<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
// require_once (APPPATH.'core/Custom_Controller.php');
 class Nurse_C extends CI_Controller{

   function __construct()
    {
         parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Technician_M');
         $this->load->model('Pharmacist_M');
         $this->load->model('Nurse_M');
               
    }
   
     public  function Help(){

           
            $this->load->view('header');
            $this->load->view('Admin/AdminNavbar');
           
            $this->load->view('Admin/Help');
            $this->load->view('footer'); 
           

          }
    public  function TechnicianDashboard(){
             
             $post["cnt_Patient"]=$this->Nurse_M->count_Patient(); 
             
              $post["cnt_pmd"]=$this->Nurse_M->count_medical_treatment(); 
             
          $this->load->view('Nurse/TechnicianDashboard',$post);
                  

          }
             public function patient_info_fetch($id)
            {
               $this->load->Model('Technician_M');
         $post["fetch_technician"]=$this->Nurse_M->fetch_dropdown_technician();
         $post["fetch_data"]=$this->Nurse_M->fetch_patient_data($id);
          $this->load->view('Nurse/PateintDetail',$post);
              }
           
           public  function NursePTrtDashboard(){
           
            $this->load->Model('Nurse_M');
           $posts=$this->Nurse_M->getPatientTrt();

            $this->load->view('Nurse/NursePTrtManage',['posts'=>$posts]);
            // $this->load->view('footer'); 
          }
          
          public  function PatientResultManage(){
           
            $this->load->Model('Technician_M');
           $posts=$this->Technician_M->getPatientResult();
            $this->load->view('Nurse/TechnicianResultManage',['posts'=>$posts]);
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
      
    

       
     
    public  function ViewTechHelp(){
              $this->load->Model('Patient_M');
           $posts=$this->Patient_M->getTechHelp();
                   $this->load->view('Patient/ViewTechHelp',['posts'=>$posts]);
          }
}
?>