<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH.'core/Custom_Controller.php');
 class Admin_C extends Custom_Controller{

   function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model("AuthenticationModel");
         $this->load->model("Doctor_M");
         $this->load->model("Patient_M");
         $this->load->model("Pharmacist_M");
         $this->load->model("Technician_M");
         $this->load->model("Reception_M");
         // $this->load->model("Manager_M");
           // $this->load->Model('Reception_M');
        if(!$this->session->userdata('admin'))
            redirect(base_url() . "login");
               
    }
   
   public  function SystemHelpDashboard(){
              $this->load->Model('AuthenticationModel');
           $posts=$this->AuthenticationModel->getSystemHelp();
                   $this->load->view('Admin/SystemHelpDashboard',['posts'=>$posts]);
          }
    public  function AdminDashboard(){
             
        if ($this->checkadminlogedin()){
             
         $this->load->model('AuthenticationModel');
         
          $post["printll"]=$this->AuthenticationModel->count_all_user();
         $post["countactive"]=$this->AuthenticationModel->count_active_user();
         $post["countinactive"]=$this->AuthenticationModel->count_inactive_user();
        $username=$this->session->userdata('username');
          // $post["fetchimage"]=$this->AuthenticationModel->getImage($username);
          // //$posts=$this->AuthenticationModel->getPosts();
            $this->load->view('Admin/AdminDashboard',$post);
    
             }
           else{
                redirect(base_url('Authentication/login'));
            }
           

          }
           public  function ManageUsers(){
           
           $posts=$this->AuthenticationModel->getPosts();
            $this->load->view('Admin/Manageusers',['posts'=>$posts]);
            // $this->load->view('footer'); 
          }
          public  function TechHelpDashboard(){
       
           $posts=$this->AuthenticationModel->getCase();
                   $this->load->view('Admin/TechnicalHelpDashboard',['posts'=>$posts]);
          }
         public  function ManageTechHelp(){
             $posts=$this->AuthenticationModel->getPosts();
            $this->load->view('Admin/ManageTechnicalHelp',['posts'=>$posts]);
          }
          function technical_help_fetch($id)
            {
            
         $post["fetch_data"]=$this->AuthenticationModel->fetch_technical_help($id);
       
            $this->load->view('Admin/EditTechnicalHelp',$post);
      
             }
             function sys_help_fetch($id)
            {
            
         $post["fetch_data"]=$this->AuthenticationModel->fetch_sys_help($id);
       
            $this->load->view('Admin/EditSystemHelp',$post);
      
             }
          public function creat_users(){
        
            $this->load->view('Admin/CreateUsers');
             }
         public function creat_case(){
        
            $this->load->view('Admin/CreateCase');
             }
              public function creat_system_help(){
        
            $this->load->view('Admin/CreateSystemHelp');
             }
      
      function UpdateUser($id)
           { 
        $this->load->model('AuthenticationModel');
          $post["fetch_data"]=$this->AuthenticationModel->fetch_data($id);
           // $this->load->view('header');
            // $this->load->view('Admin/AdminNavbar');
            $this->load->view('Admin/EditUsers',$post);
            // $this->load->view('footer'); 
         }

    
         public function add() 
        {
     $this->load->Library('form_validation');
        $this->form_validation->set_rules("empid","empid",'required|min_length[2]');
        $this->form_validation->set_rules("username","username",'required|min_length[2]');
        $this->form_validation->set_rules('email','email','required|min_length[2]');
        $this->form_validation->set_rules('password','password','required|min_length[2]');
         // $this->form_validation->set_rules('repassword','repassword','required|min_length[2]');
         $this->form_validation->set_rules('usertype','usertype','required|min_length[2]');
         

            
           if($this->form_validation->run()) 
            { 



              // valid form
           $this->load->model("AuthenticationModel");
              $employeeid=$this->input->post("empid");
              $employeename=$this->input->post("username");
             
              // if($this->AuthenticationModel->check_empid($employeeid)>=1)
              //    {
                   if($this->AuthenticationModel->check_username($employeename)<=1)
                     {
           
                $data=array(
            "user_name" =>$this->input->post("username"),
            "email" =>$this->input->post("email"),
            "user_password"=>md5($this->input->post("password")),
            // "user_password"=>$this->input->post("password"),
            "user_type" =>$this->input->post("usertype"),
            // "user_image" =>$infoimg,
            "emp_id" =>$this->input->post("empid"));

              $this->AuthenticationModel->save_user($data);
            $this->session->set_flashdata('successmsg','successfully saved!');
                redirect(base_url() . "Admin_C/saved",'refresh');
               // redirect(base_url() . "Admin_C/saved");
               

                        } 
                       else{
                        $employeename = $this->input->post("username");
                        // $this->session->set_flashdata('errormsg','This Employee ID is Not Found!');
                        $this->session->set_flashdata('errormsg',$employeename.' -> '.'This user Duplicated!');
                         $this->creat_users();
                        redirect(base_url() . "Admin_C/employeename_validate",'refresh');
                            }
                  //    }
                  // else
                  //      {
                  //       $employeeid = $this->input->post("empid");
                  //      $this->session->set_flashdata('errormsg',$employeeid .' ->'.'This Employee ID Not Found!');
                  //       redirect(base_url() . "Admin_C/empid_validate",'refresh');
                  //      } 
                 

               }
            
                      
             else{
                 $this->creat_users();
                 }
         // }
      }
       function saved()
    {
        $this->creat_users(); 
    }
    function saved_validate()
    {
        $this->creat_users(); 
    }
     function empid_validate()
    {
        $this->creat_users(); 
    }
   function employeename_validate()
    {
        $this->creat_users(); 
    }

     public function update_user()
    {
        $this->load->Library('form_validation');
        // $this->form_validation->set_rules("empid","empid",'required|min_length[2]');
        $this->form_validation->set_rules("username","username",'required|min_length[2]');
        $this->form_validation->set_rules('email','email','required|min_length[2]');
        $this->form_validation->set_rules('password','password','required|min_length[2]');
         $this->form_validation->set_rules('usertype','usertype','required|min_length[2]');
         $this->form_validation->set_rules('userstatus','userstatus','required|min_length[2]');
          $employeeid=$this->input->post("empid");
              $employeename=$this->input->post("username");
               $userid=$this->input->post("userid");

               if($this->form_validation->run()) 
                      { 
         
          if($this->AuthenticationModel->check_userempid($userid)>=1)
                 {
                   // if($this->AuthenticationModel->check_username($employeename)>=1)
                   //   {

                    
                      $this->load->model("AuthenticationModel");
                      $data=array( "user_name" =>$this->input->post("username"),
                          "email" =>$this->input->post("email"),
                          "user_password" =>md5($this->input->post("password")),
                          "user_type" =>$this->input->post("usertype"),
                          "user_status" =>$this->input->post("userstatus"));
                         // "emp_id" =>$this->input->post("empid"));
                            // "user_image" =>$infoimgupdate);
                            if($this->input->post("update"))
                            {
                                $this->AuthenticationModel->update_users($data,$this->input->post("hidden_id"));
                                  $this->session->set_flashdata('successmsg','user updated successfully');
                                redirect(base_url() . "Admin_C/updated",'refresh');

                               
                                      }
                                else 
                                {
                                     $this->session->set_flashdata('errormsg','Failed to update');
                                   $this->ManageUsers();
                                  
                                }
                         
                       //     } 
                      
                       // else{
                       //  $username = $this->input->post("username");
                       //   $this->session->set_flashdata('errormsg','The user name in Not Available!');
                       //  redirect(base_url() . "Admin_C/saved",'refresh');
                       //      }      

                          }
                  else
                       {
                       
                         $this->session->set_flashdata('errormsg', 'This Employee ID Not Found!');
                         
                            $this->ManageUsers();
                       }
                   }       
                           // redirect(base_url() . "Admin_C/ManageUsers");                        
                 else{
                     $this->ManageUsers();
                     }     
                       
    }

    function updated()
    {
          $this->ManageUsers();
    }
  function delete_user_c($camid){
      
        $this->load->model("AuthenticationModel");
        $this->AuthenticationModel->delete_user_m($camid);
        $this->session->set_flashdata('successmsg','user data deleted successfully');
        redirect(base_url() . "Admin_C/deleted_user_redirect");
        
    }
    public function deleted_user_redirect()
    {
      $this->AdminDashboard();  
    }
    function delete_techhelp_c($techid){
      
        $this->load->model("AuthenticationModel");
        $this->AuthenticationModel->delete_techhelp_m($techid);
        $this->session->set_flashdata('successmsg','data deleted successfully');
        redirect(base_url() . "Admin_C/deleted_tech_redirect");
        
    }
    public function deleted_tech_redirect()
    {
      $this->TechHelpDashboard();  
    }
    function delete_syshelp_c($sysid){
      
        $this->load->model("AuthenticationModel");
        $this->AuthenticationModel->delete_techhelp_m($sysid);
        $this->session->set_flashdata('successmsg','data deleted successfully');
        redirect(base_url() . "Admin_C/deleted_sys_redirect");
        
    }
    public function deleted_sys_redirect()
    {
      $this->SystemHelpDashboard();  
    }
     public function SubmitCase() 
        {
     $this->load->Library('form_validation');
        $this->form_validation->set_rules("case_name","case_name",'required|min_length[2]');
        $this->form_validation->set_rules('case_type','case_type','required|min_length[2]');
        $this->form_validation->set_rules('case_solution','case_solution','required|min_length[2]');
        $this->form_validation->set_rules('issue_date','issue_date','required|min_length[2]');
           
       if($this->form_validation->run()) 
        { 
              // valid form
            $this->load->model("AuthenticationModel");
        $data=array(
            "case_name" =>$this->input->post("case_name"),
            "case_type" =>$this->input->post("case_type"),"case_solution" =>$this->input->post("case_solution"),"issue_date" =>$this->input->post("issue_date"));
                 
                    // $this->load->Pharmacist_M->save_Pharmacist($data);

           if($this->input->post("add"))
            {
            $this->AuthenticationModel->save_case($data);
              $this->session->set_flashdata('successmsg','successfully Registered!');
            redirect(base_url() . "Admin_C/savedcase",'refresh');

           
        }
        else 
        {
             $this->session->set_flashdata('errormsg','Failed to save');
           $this->RegCase();
          
        }
      }
        else{
                 $this->RegCase();
                 }

             
      }
       function savedcase()
    {
          $this->RegCase();
    }
     public  function RegCase(){
            
            $this->load->view('Admin/CreateCase');
          
          }
   public function SubmitSystemHelp() 
        {
     $this->load->Library('form_validation');
        $this->form_validation->set_rules("system_help_name","system_help_name",'required|min_length[2]');
        $this->form_validation->set_rules('system_help_description','system_help_description','required|min_length[2]');
        $this->form_validation->set_rules('registered_date','registered_date','required|min_length[2]');
       
       if($this->form_validation->run()) 
        { 
              // valid form
            $this->load->model("AuthenticationModel");
        $data=array(
            "system_help_name" =>$this->input->post("system_help_name"),
            "system_help_description" =>$this->input->post("system_help_description"),"registered_date" =>$this->input->post("registered_date"));
             

           if($this->input->post("add"))
            {
            $this->AuthenticationModel->save_system_case($data);
              $this->session->set_flashdata('successmsg','successfully Registered!');
            redirect(base_url() . "Admin_C/savedSystemHelp",'refresh');

           
        }
        else 
        {
             $this->session->set_flashdata('errormsg','Failed to save');
           $this->RegSystemHelp();
          
        }
      }
        else{
                 $this->RegSystemHelp();
                 }

             
      }
       function savedSystemHelp()
          {
                $this->SystemHelpDashboard();
          }
     public  function RegSystemHelp(){
            
            $this->load->view('Admin/SystemHelpDashboard');
          
          }
          //update technical help
          public function update_technical_help()
          {
       
     $this->load->Library('form_validation');
     $this->form_validation->set_rules('casename','casename','required|min_length[2]');
     $this->form_validation->set_rules('casetype','casetype','required|min_length[1]');
     $this->form_validation->set_rules('solution','solution','required|min_length[2]');
     $this->form_validation->set_rules('issuedate','issuedate','required|min_length[2]|max_length[15]');
       
         if($this->form_validation->run()) 
              { 
              // valid form
        $data=array( "case_id" =>$this->input->post("caseid"),
                 "case_name" =>$this->input->post("casename"),
                 "case_type" =>$this->input->post("casetype"),
                  "case_solution" =>$this->input->post("solution"),
                  "issue_date" =>$this->input->post("issuedate")
                    );
        if($this->input->post("update"))
          {
            $this->AuthenticationModel->update_technicalhelp_m($data,$this->input->post("hidden_id"));
              $this->session->set_flashdata('successmsg','updated successfully');
            redirect(base_url() . "Admin_C/TechHelpDashboard",'refresh');

           
        }
        else 
        {
             $this->session->set_flashdata('errormsg','Failed to update');
           $this->TechHelpDashboard();
          
        }
      }
        else
        {
           $this->TechHelpDashboard();
        }
       
    }
          //update system help
    public function UpdateSystemHelp()
          {
       
     $this->load->Library('form_validation');
     $this->form_validation->set_rules('systemhelpname','system_help_name','required|min_length[2]');
     $this->form_validation->set_rules('systemhelpdescription','system_help_description','required|min_length[1]');
     $this->form_validation->set_rules('registereddate','registered_date','required|min_length[2]');
           
         if($this->form_validation->run()) 
              { 
              // valid form
        $data=array( 
                "syshelp_id" =>$this->input->post("syshelpid"),
                "system_help_name" =>$this->input->post("systemhelpname"),
                 "system_help_description" =>$this->input->post("systemhelpdescription"),
                  "registered_date" =>$this->input->post("registereddate")
                    );
        if($this->input->post("update"))
          {
            $this->AuthenticationModel->update_systemhelp_m($data,$this->input->post("hidden_id"));
              $this->session->set_flashdata('successmsg','updated successfully');
            redirect(base_url() . "Admin_C/SystemHelpDashboard",'refresh');

           
        }
        else 
        {
             $this->session->set_flashdata('errormsg','Failed to update');
           $this->SystemHelpDashboard();
          
        }
      }
        else
        {
           $this->SystemHelpDashboard();
        }
       
    }
          //doctors part

          public  function MemberRegManage() {
               $posts=$this->Doctor_M->getMember();
              $this->load->view('Admin/MemberRegManage' ,['posts'=>$posts]);
                  }
          public  function PatientDashboard(){
             
              $posts=$this->Doctor_M->getPatientData();
              $this->load->view('Admin/PatientManage' ,['posts'=>$posts]);
               }
                public  function PatientManage(){
                  $posts=$this->Doctor_M->getVehicleData();
                 $this->load->view('Admin/VehicleDashboard' ,['posts'=>$posts]);
              }
              //Patients part
               public  function RequestRegManage(){
             $posts=$this->Patient_M->getRequest();
            $this->load->view('Admin/RequestRegManage',['posts'=>$posts]);
             }
              public  function ViewStatus(){
             $posts=$this->Patient_M->getRequest();
            $this->load->view('Admin/ViewVhclStatus',['posts'=>$posts]);
              }
        
                 
} 
?>