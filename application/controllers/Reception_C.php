<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Reception_C extends CI_Controller{
	function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Patient_M');
         $this->load->model('Reception_M');
     }
      
       
	    public  function Help(){
              $this->load->Model('Patient_M');
           $posts=$this->Patient_M->getTechHelp();
                   $this->load->view('Reception/ViewTechnicalHelp',['posts'=>$posts]);
          }
          public  function PatientReg(){
               // $post["cnt_employee"]=$this->Reception_M->count_employee(); 
             // $post["cnt_Patient"]=$this->Reception_M->count_Patient(); 
             
              $this->load->view('Reception/PatientRegistration');
            
          }
          public  function EmployeeReg(){
            
              $this->load->view('Reception/EmployeeReg');
                     }
            public  function ReceptionDashboard(){
               $post["cnt_employee"]=$this->Reception_M->count_employee(); 
             $post["cnt_Patient"]=$this->Reception_M->count_Patient(); 
              // $post["cnt_"]=$this->Reception_M->count_(); 
                     
              $this->load->view('Reception/ReceptionDashboard',$post);
             // $this->load->view('footer'); 
          }
          public  function DocAssDashboard(){
                    $posts=$this->Reception_M->getRequestPatient();    
              $this->load->view('Reception/DoctorAssignDashboard',['posts'=>$posts]);
             // $this->load->view('footer'); 
          }
            public  function PatientManage(){
                    $posts=$this->Reception_M->getPatient();    
              $this->load->view('Reception/PatientManage',['posts'=>$posts]);
             }
             public  function MemberDashboard()
                     {
              $this->load->Model('Reception_M');
              $posts=$this->Reception_M->getMember();
              $this->load->view('Reception/MemberManage' ,['posts'=>$posts]);
                  }
               public function patient_info_fetch($id)
            {
               $this->load->Model('Reception_M');
         $post["fetch_data"]=$this->Reception_M->fetch_patient_data($id);
          $this->load->view('Reception/UpdatePatientInfo',$post);
              }
                public function employee_info_fetch($id)
            {
               $this->load->Model('Reception_M');
         $post["fetch_data"]=$this->Reception_M->fetch_employee_data($id);
          $this->load->view('Reception/EmployeeUpdate',$post);
              }
         function delete_patient_c($id){
        // $id=$this->uri->segment(3);
        $this->load->model("Reception_M");
        $this->Reception_M->delete_patient_m($id);
        $this->session->set_flashdata('successmsg','deleted successfully');
        redirect(base_url() . "Reception_C/deleted_patient_redirect",'refresh');
       }

	     public function doctor_assignment_fetch($id)
            {
               $this->load->Model('Reception_M');
               $post["fetch_doctor"]=$this->Reception_M->fetch_dropdown_doctor();
                 $post["fetch_data"]=$this->Reception_M->fetch_patient_data($id);
          $this->load->view('Reception/DoctorAssignConfirm',$post);
              }

       public function deleted_patient_redirect()
          {
            $this->PatientManage();  
          }

    //save patient
    public function AddPatient() 
         {
   $this->load->Library('form_validation');
       $this->form_validation->set_rules("patientid","patient ID",'required|min_length[2]');
        $this->form_validation->set_rules("firstname","First Name",'required|min_length[2]');
        $this->form_validation->set_rules('middlename','Middle Name','required|min_length[2]');
        $this->form_validation->set_rules('lastname','Last Name','required|min_length[2]');
        $this->form_validation->set_rules('gender','Gender','required|min_length[2]');
        $this->form_validation->set_rules('age','Age','required|min_length[2]'); 
         $this->form_validation->set_rules('address','address','required|min_length[2]');         
         $this->form_validation->set_rules('phoneno','phone_no','required|min_length[2]');
      
          $this->form_validation->set_rules('patientcase','patient case','required|min_length[1]');
        $this->form_validation->set_rules('cardpayment','card payment','required|min_length[2]');
        
           $this->form_validation->set_rules('regdate','Registration Date','required|min_length[2]');
         $this->form_validation->set_rules('regby','Registered By','required|min_length[2]');
       if($this->form_validation->run()) 
        { 
              // valid form
            $this->load->model("Reception_M");
        $data=array(
         "patient_ID" =>$this->input->post("patientid"),
            "first_name" =>$this->input->post("firstname"),
            "middle_name" =>$this->input->post("middlename"),
            "last_name" =>$this->input->post("lastname"),
            "gender" =>$this->input->post("gender"),
            "age" =>$this->input->post("age"),
             "address" =>$this->input->post("address"),
              "phone_no" =>$this->input->post("phoneno"),
               "patient_case" =>$this->input->post("patientcase"),
            "card_payment" =>$this->input->post("cardpayment"),
                      
            "registration_date" =>$this->input->post("regdate"),
            "registered_by" =>$this->input->post("regby"));

              if($this->input->post("add"))
            {
            $this->Reception_M->save_Patient_data($data);
              $this->session->set_flashdata('successmsg','successfully Registered!');
            redirect(base_url() . "Reception_C/savedPatient",'refresh');

                         }
              else 
              {
                   $this->session->set_flashdata('errormsg','Failed to save');
                 $this->PatientReg();
                
              }
            }
              else{
                       $this->PatientReg();
                       }
      }
    
   public function savedPatient()
   {
     $this->PatientReg();
   }
   //update patient
          public function UpdatePatient()
           {
             $this->load->Library('form_validation');
       $this->form_validation->set_rules("memberid","Member ID",'required|min_length[2]');
        $this->form_validation->set_rules("first_name","First Name",'quired|min_length[2]');
       //  $this->form_validation->set_rules('middle_name','Middle Name','required|min_length[2]');
       //  $this->form_validation->set_rules('last_name','Last Name','required|min_length[2]');
       //  $this->form_validation->set_rules('gender','Gender','required|min_length[2]');
       //  $this->form_validation->set_rules('age','Age','required|min_length[2]');
       //    $this->form_validation->set_rules('department','department ','required|min_length[2]');
       //    $this->form_validation->set_rules('position','position','required|min_length[2]');
       //  $this->form_validation->set_rules('salary','salary','required|min_length[3]');
       //    // $this->form_validation->set_rules('salary','salary','required|alpha|min_length[3]');
       //      $this->form_validation->set_rules('hired_date','hired_date','required|min_length[1]');
             
       //       $this->form_validation->set_rules('phone_no','phone_no','required|min_length[2]');
      
       //    $this->form_validation->set_rules('requested_date','requested_date','required|min_length[1]');
       //     $this->form_validation->set_rules('requested_reason','requested_reason','required|min_length[2]');

       // if($this->form_validation->run()) 
       //  {   
            $data=array(
              "patient_ID" =>$this->input->post("patientid"),
            "first_name" =>$this->input->post("firstname"),
            "middle_name" =>$this->input->post("middlename"),
            "last_name" =>$this->input->post("lastname"),
            "gender" =>$this->input->post("gender"),
            "age" =>$this->input->post("age"),
             "address" =>$this->input->post("address"),
              "phone_no" =>$this->input->post("phoneno"),
               "patient_case" =>$this->input->post("patientcase"),
            "card_payment" =>$this->input->post("cardpayment"),
       
            "registration_date" =>$this->input->post("regdate"),
            "registered_by" =>$this->input->post("regby"),


          "assigned_room" =>$this->input->post("assignedroom"),
           "assigned_doctor" =>$this->input->post("assigneddoctor"),
            "assigned_date" =>$this->input->post("assigneddate"),
          "assigned_by" =>$this->input->post("assignedby"),
            "assigned_status" =>$this->input->post("assignedstatus"));

             //     $this->Encoder_M->update_membership($data,$this->input->post("hidden_id"));
             //  $this->session->set_flashdata('successmsg','successfully Update!');
             //   redirect(base_url() . "Encoder_C/updated_mem_redirect",'refresh');
             //     }
             // else{
             //  $this->session->set_flashdata('errormsg','Failed to Update');
             //     $this->MemberDashboard();
             //     }
        //        
           if($this->input->post("update"))
                {
                    $this->Reception_M->update_patient($data,$this->input->post("hidden_id"));
                      $this->session->set_flashdata('successmsg','updated successfully');
                    redirect(base_url() . "Reception_C/updated_patient_redirect",'refresh');
                   
                }
                else 
                {
                     $this->session->set_flashdata('errormsg','Failed to update');
                   $this->PatientManage();
                  
                }
        // } 
        // else
        // {
        // $this->MemberDashboard();  
        // }
    }
    function updated_patient_redirect()
    {
        $this->PatientManage();
    }
    //update assignment patient to doctor
               public function AssignPatient()
           {
             $this->load->Library('form_validation');
       $this->form_validation->set_rules("patientid","patient_ID",'required|min_length[2]');
        $this->form_validation->set_rules("firstname","First Name",'quired|min_length[2]');
       //  $this->form_validation->set_rules('middle_name','Middle Name','required|min_length[2]');
       //  $this->form_validation->set_rules('last_name','Last Name','required|min_length[2]');
       //  $this->form_validation->set_rules('gender','Gender','required|min_length[2]');
       //  $this->form_validation->set_rules('age','Age','required|min_length[2]');
       //    $this->form_validation->set_rules('department','department ','required|min_length[2]');
       //    $this->form_validation->set_rules('position','position','required|min_length[2]');
       //  $this->form_validation->set_rules('salary','salary','required|min_length[3]');
       //    // $this->form_validation->set_rules('salary','salary','required|alpha|min_length[3]');
       //      $this->form_validation->set_rules('hired_date','hired_date','required|min_length[1]');
             
       //       $this->form_validation->set_rules('phone_no','phone_no','required|min_length[2]');
      
       //    $this->form_validation->set_rules('requested_date','requested_date','required|min_length[1]');
       //     $this->form_validation->set_rules('requested_reason','requested_reason','required|min_length[2]');

       // if($this->form_validation->run()) 
       //  {   
            $data=array(
              "patient_ID" =>$this->input->post("patientid"),
            "first_name" =>$this->input->post("firstname"),
            "middle_name" =>$this->input->post("middlename"),
            "last_name" =>$this->input->post("lastname"),
            "gender" =>$this->input->post("gender"),
            "age" =>$this->input->post("age"),
             "address" =>$this->input->post("address"),
              "phone_no" =>$this->input->post("phoneno"),
               "patient_case" =>$this->input->post("patientcase"),
            "card_payment" =>$this->input->post("cardpayment"),
       
            "registration_date" =>$this->input->post("regdate"),
            "registered_by" =>$this->input->post("regby"),


          "assigned_room" =>$this->input->post("assignedroom"),
          "assigned_doctor" =>$this->input->post("assigneddoctor"),
            "assigned_date" =>$this->input->post("assigneddate"),
          "assigned_by" =>$this->input->post("assignedby"),
            "assigned_status" =>$this->input->post("assignedstatus"));

             //     $this->Encoder_M->update_membership($data,$this->input->post("hidden_id"));
             //  $this->session->set_flashdata('successmsg','successfully Update!');
             //   redirect(base_url() . "Encoder_C/updated_mem_redirect",'refresh');
             //     }
             // else{
             //  $this->session->set_flashdata('errormsg','Failed to Update');
             //     $this->MemberDashboard();
             //     }
        //        
           if($this->input->post("update"))
                {
                    $this->Reception_M->update_patient($data,$this->input->post("hidden_id"));
                      $this->session->set_flashdata('successmsg','updated successfully');
                    redirect(base_url() . "Reception_C/updated_assign_redirect",'refresh');
                   
                }
                else 
                {
                     $this->session->set_flashdata('errormsg','Failed to update');
                   $this->DocAssDashboard();
                  
                }
        // } 
        // else
        // {
        // $this->MemberDashboard();  
        // }
    }  
     function updated_assign_redirect()
    {
        $this->DocAssDashboard();
    }
    // add employee_info_fetch
     public function AddEmployee() 
         {
   $this->load->Library('form_validation');
       $this->form_validation->set_rules("employeeid","employeeid",'required|min_length[2]');
       // $this->form_validation->set_rules("title","title",'required|min_length[2]');
       //  $this->form_validation->set_rules("firstname","First Name",'required|min_length[2]');
       //  $this->form_validation->set_rules('middlename','Middle Name','required|min_length[2]');
       //  $this->form_validation->set_rules('lastname','Last Name','required|min_length[2]');
       //  $this->form_validation->set_rules('gender','Gender','required|min_length[2]');
       //  $this->form_validation->set_rules('department','department','required|min_length[2]'); 
       //   $this->form_validation->set_rules('salary','salary','required|min_length[2]');
       //   $this->form_validation->set_rules('address','address','required|min_length[2]');         
       //   $this->form_validation->set_rules('phoneno','phone_no','required|min_length[2]');
      
       //    $this->form_validation->set_rules('hireddate','hired_date','required|min_length[1]');
       //  $this->form_validation->set_rules('emptype','emp_type','required|min_length[2]');
        
       if($this->form_validation->run()) 
        { 
              // valid form
            $this->load->model("Reception_M");
        $data=array(
         "emp_id" =>$this->input->post("employeeid"),
         "title" =>$this->input->post("title"),
            "first_name" =>$this->input->post("firstname"),
            "middle_name" =>$this->input->post("middlename"),
            "last_name" =>$this->input->post("lastname"),
            "gender" =>$this->input->post("gender"),
            "department" =>$this->input->post("department"),
            "salary" =>$this->input->post("salary"),
             "address" =>$this->input->post("address"),
              "phone_no" =>$this->input->post("phoneno"),
               "hired_date" =>$this->input->post("hireddate"),
            "emp_type" =>$this->input->post("emptype"));

              if($this->input->post("add"))
            {
            $this->Reception_M->save_employee_data($data);
              $this->session->set_flashdata('successmsg','successfully Registered!');
            redirect(base_url() . "Reception_C/savedEmployee",'refresh');

           
              }
              else 
              {
                   $this->session->set_flashdata('errormsg','Failed to save');
                 $this->EmployeeReg();
                
              }
            }
              else{
                       $this->EmployeeReg();
                       }
      }
    
    function savedEmployee()
   {
     $this->EmployeeReg();
   }
   //update patient
          public function UpdateEmployee()
           {
             $this->load->Library('form_validation');
     $this->form_validation->set_rules("employeeid","employeeid",'required|min_length[2]');
        // $this->form_validation->set_rules("firstname","First Name",'required|min_length[2]');
        // $this->form_validation->set_rules('middlename','Middle Name','required|min_length[2]');
        // $this->form_validation->set_rules('lastname','Last Name','required|min_length[2]');
        // $this->form_validation->set_rules('title','Last Name','required|min_length[2]');
        // $this->form_validation->set_rules('gender','Gender','required|min_length[2]');
        // $this->form_validation->set_rules('department','department','required|min_length[2]'); 
        //  $this->form_validation->set_rules('salary','salary','required|min_length[2]');
        //  $this->form_validation->set_rules('address','address','required|min_length[2]');         
        //  $this->form_validation->set_rules('phoneno','phone_no','required|min_length[2]');
      
        //   $this->form_validation->set_rules('hireddate','hired_date','required|min_length[1]');
        // $this->form_validation->set_rules('emptype','emp_type','required|min_length[2]');
        
       if($this->form_validation->run()) 
        // { 
              // valid form
            $this->load->model("Reception_M");
        $data=array(
           "emp_id" =>$this->input->post("employeeid"),
            "first_name" =>$this->input->post("firstname"),
            "middle_name" =>$this->input->post("middlename"),
            "last_name" =>$this->input->post("lastname"),
            "gender" =>$this->input->post("gender"),
            "department" =>$this->input->post("department"),
            "salary" =>$this->input->post("salary"),
             "address" =>$this->input->post("address"),
              "phone_no" =>$this->input->post("phoneno"),
               "hired_date" =>$this->input->post("hireddate"),
            "emp_type" =>$this->input->post("emptype"));
        //        
           if($this->input->post("update"))
                {
                    $this->Reception_M->update_employee($data,$this->input->post("hidden_id"));
                      $this->session->set_flashdata('successmsg','updated successfully');
                    redirect(base_url() . "Reception_C/updated_employee_redirect",'refresh');
                   
                }
                else 
                {
                     $this->session->set_flashdata('errormsg','Failed to update');
                   $this->MemberDashboard();
                  
                }
        // } 
        // else
        // {
        // $this->MemberDashboard();  
        // }
    }
    function updated_employee_redirect()
    {
        $this->MemberDashboard();
    }
     function delete_employee_c($id){
        // $id=$this->uri->segment(3);
        $this->load->model("Reception_M");
        $this->Reception_M->delete_employee_m($id);
        $this->session->set_flashdata('successmsg','deleted successfully');
        redirect(base_url() . "Reception_C/deleted_employee_redirect",'refresh');
       }

       function deleted_employee_redirect()
          {
            $this->MemberDashboard();  
          }
}
?>