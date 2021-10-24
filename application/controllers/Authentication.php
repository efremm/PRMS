<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH.'core/Custom_Controller.php');
class Authentication extends Custom_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthenticationModel');
        $this->load->library('session');

    }

    public function index()
	{
      // if ($this->checklogedin()){
         
      //     redirect(base_url('Admin_C/AdminDashboard'));
      //   }
	    if ($this->checkadminlogedin('admin')){
         
	        redirect(base_url('Admin_C/AdminDashboard'));
        }
       else  if ($this->checkdoctorlogedin('doctor')){
         
          redirect(base_url('Doctor_C/home'));
        }
        else if ($this->checknurselogedin('nurse')){
         
          redirect(base_url('Nurse_C/NursePTrtDashboard'));
        }
        else if ($this->checkpharmacistlogedin('pharmacist')){
         
          redirect(base_url('Pharmacist_C/PharmacistDashboard'));
        }
        else if ($this->checkreceptionlogedin('reception')){
         
          redirect(base_url('Reception_C/ReceptionDashboard'));
        }
         else if ($this->checktechnicianlogedin('technician')){
         
          redirect(base_url('Technician_C/TechnicianDashboard'));
        }
       
          else if ($this->checkpatientlogedin('patient')){
         
          redirect(base_url('Patient_C/PatientDashboard'));
        }
       else   
           {  
         redirect(base_url('Authentication/login'));
            }
          
	}
	function login()
    {
      
        $this->load->Library('form_validation');
        $this->form_validation->set_rules('username','user name','trim|required|min_length[2]');
        $this->form_validation->set_rules('password','password','trim|required|min_length[4]|max_length[25]');
       if($this->form_validation->run()==FALSE)
        {
          $this->load->view('login') ;
        }
       else
       {
           $username=$this->input->post('username');
           // $password=$this->input->post('password');
             $password=md5($this->input->post('password'));
           $result=$this->AuthenticationModel->login($username,$password);
           if($result)
           {
                  $userrole=$this->AuthenticationModel->CheckUserRole($username);
                 
           // if($userrole['user_type'] == 'admin' && $userrole['user_status'] == 'active')
                      // $sessionData=['user_id'=>$result->user_id,
                      //            'username'=>$result->user_name,
                      //            'email'=>$result->email,
                      //            'emp_id'=>$result->emp_id ];
                      //            $this->session->set_userdata($sessionData);

	           if($userrole['user_type'] == 'admin')
              // if($userrole['user_type'] == 'admin')
	              {

	           	 $this->session->set_flashdata('created','<p class="text-success">authenticate user </p>');
	               $this->session->set_userdata('admin','admin');
                 redirect(base_url("Admin_C/AdminDashboard"));
	               }
	              
                 else if($userrole['user_type'] == 'doctor') {
                  $this->session->set_flashdata('created','<p class="text-success">authenticate user </p>');
                   // $this->session->set_userdata('doctor','doctor');
                 redirect(base_url("Doctor_C/home"));
                 }
                 else if($userrole['user_type'] == 'patient') {
                  $this->session->set_flashdata('created','<p class="text-success">authenticate user </p>');
                 redirect(base_url("Patient_C/PatientDashboard"));
                 }
                 else if($userrole['user_type'] == 'pharmacist') {
                  $this->session->set_flashdata('created','<p class="text-success">authenticate user </p>');
                 redirect(base_url("Pharmacist_C/PharmacistDashboard"));
                 }
                 else if($userrole['user_type'] == 'manager') {
                  $this->session->set_flashdata('created','<p class="text-success">authenticate user </p>');
                 redirect(base_url("Manager_C/ManagerDashboard"));
                 }
                 // else if($userrole['user_type'] == 'patient') {
                 //  $this->session->set_flashdata('created','<p class="text-success">authenticate user </p>');
                 // redirect(base_url("Patient_C/home"));
                 // }
                  else if($userrole['user_type'] == 'technician') {
                  $this->session->set_flashdata('created','<p class="text-success">authenticate user </p>');
                 redirect(base_url("Technician_C/TechnicianDashboard"));
                 }
                  else if($userrole['user_type'] == 'reception') {
                  $this->session->set_flashdata('created','<p class="text-success">authenticate user </p>');
                 redirect(base_url("Reception_C/ReceptionDashboard"));
                 }
                 else if($userrole['user_type'] == 'nurse') {
                  $this->session->set_flashdata('created','<p class="text-success">authenticate user </p>');
                 redirect(base_url("Nurse_C/NursePTrtDashboard"));
                 }
                }
		           else
		           {
		               // echo "<script> alert('error  login');</script>";
		                $this->session->set_flashdata('notcreated','<p class="text-success">user account not correct</p>');
		               $this->load->view('login');

		           }
       }
    }

    public function HomeDashboard()
    {
        if ($this->checklogedin()) {


            $this->load->view('header');
            $this->load->view('nav');
            $this->load->view('dashboard');
            $this->load->view('footer');
        }
        else
            redirect(base_url('Authentication/login'));
    }
          function countallIncoder()
          {        echo $this->db->count_all_results('my_table');  
              $this->db->where('user_type', 'incoder');
              $this->db->from('tbl_users');
             echo $this->db->count_all_results(); 
}
        
    function logout(){
        $this->session->unset_userdata('username');
        redirect(base_url());
    }

}
?>