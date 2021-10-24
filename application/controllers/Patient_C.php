<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
// require_once (APPPATH.'core/Custom_Controller.php');
 class Patient_C extends CI_Controller{

   function __construct()
    {
         parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('Patient_M');
         $this->load->model('Technician_M');
          $this->load->helper(array('form', 'url'));
               
    }
    function index()
    {
       $this->load->view('Patient/RequestUpdate', array('error' => ' ' ));
         $this->load->view('upload_form', array('error' => ' ' ));
    }
   
     public  function Help(){
     
            $this->load->view('header');
            $this->load->view('Admin/AdminNavbar');
           
            $this->load->view('Admin/Help');
            $this->load->view('footer'); 
          
          }
    public  function PatientDashboard(){
      $src_value =$this->input->post("txtsearch");
            //  $posts=$this->Patient_M->getPtreatment();
            // $this->load->view('Patient/PatientDashboard',['posts'=>$posts]);  
          //     $post["src_patient"]=$this->Patient_M->searchPatient($src_value); 
          // $this->load->view('Patient/PatientDashboard',$post);
           // if($this->input->post("txtsearch")!=empty())
      // if($this->input->post("txtsearch"))
      //        {
            
              // $this->session->set_flashdata('successmsg','successfully Registered!');
            $posts=$this->Patient_M->searchPatient($src_value);
             $this->load->view('Patient/PatientDashboard',['posts'=>$posts]);  
            // redirect(base_url() . "Patient_C/savedrequest",'refresh');
          
               
            // }

            // else 
            // {
            //      $this->session->set_flashdata('errormsg','Failed to save');
            //    $this->PatientDashboard();
              
            // }        

          }
          // public function searchP()
          // {
          //   $this->PatientDashboard(); 
          // }
           public  function PatientDetail(){
           
            $this->load->Model('Patient_M');
            // $post["src_patient"]=$this->Patient_M->searchPatient($src_value);
           $posts=$this->Patient_M->getPtreatment();
            $this->load->view('Patient/PatientDetailTreatment',['posts'=>$posts]);
            // $this->load->view('footer'); 
          }
           public  function PatientInfo(){
                $this->load->Model('Patient_M');
               $username=$this->input->post("txtsearch");
               

              $posts=$this->Patient_M->displayPatientData($username);
              $this->load->view('patient/PatientDetailTreatment' ,['posts'=>$posts]);
               // }
             }
          public  function ViewStatus(){
           
            $this->load->Model('Patient_M');
           $posts=$this->Patient_M->getRequest();
            $this->load->view('Patient/ViewVhclStatus',['posts'=>$posts]);
            // $this->load->view('footer'); 
          }
      
        public function PatientRequestReg(){
    	  
            $this->load->view('Patient/RequestReg');
             }
         function FetchUpdateRequest($id)
           { 
        $this->load->model('Patient_M');
          $post["fetch_data"]=$this->Patient_M->fetch_request_data($id);
            $this->load->view('Patient/RequestUpdate',$post);
          }
        // public function do_upload()
        //     {
        //         $config['upload_path']          = './images/';
        //         $config['allowed_types']        = 'gif|jpg|png';
        //         $config['max_size']             = 100;
        //         $config['max_width']            = 1024;
        //         $config['max_height']           = 768;

        //         $this->load->library('upload', $config);

        //         if ( ! $this->upload->do_upload('userfile'))
        //         {
        //                 $error = array('error' => $this->upload->display_errors());

        //                 $this->load->view('Patient/RequestReg', $error);
        //         }
        //         else
        //         {
        //                 $data = array('vehicle_image' => $this->upload->data());
        //                      // insert_image
        //          $this->Patient_M->insert_image($data);
        //       $this->session->set_flashdata('successmsg','successfully Registered!');
        //       redirect(base_url() . "Patient_C/savedrequest",'refresh');

        //                 // $this->load->view('Patient/upload_success', $data);
        //         }
        // }

      // public function SaveImage()
      // {
      //    $config  = array(
      //       'upload_path' =>'/images/',         
      //        'allowed_types'=>'jpg|jpeg|png|gif',
      //        'filename' => url_title($this->input->post('uploadimage')),
      //       'encrypt_name'=>true);
      //   //  $config['upload_path'] = './images/';
      //   // $config['allowed_types'] = 'jpg|jpeg|png|gif';
      //   // $config['max_size'] = 2000;
      //   // $config['max_width'] = 1500;
      //   // $config['max_height'] = 1500;

      //   $this->load->library('upload', $config);
      
      //       if($this->upload->do_upload('uploadimage'))
      //           {
      //             $this->db->insert('request_help_tbl',array('vehicle_image' => $this->upload->filename));
      //             $this->session->set_flashdata('msg','successfully!!!');
      //            }
      //            $this->load->view('Patient/RequestReg');
      // }
      // public function do_upload()
      //   {
      //           $config['upload_path']          = './uploads/';
      //           $config['allowed_types']        = 'gif|jpg|png';
      //           $config['max_size']             = 100;
      //           $config['max_width']            = 1024;
      //           $config['max_height']           = 768;

      //           $this->load->library('upload', $config);

      //           if ( ! $this->upload->do_upload('userfile'))
      //           {
      //                   $error = array('error' => $this->upload->display_errors());

      //                   $this->load->view('Patient/RequestReg', $error);
      //           }
      //           else
      //           {
      //                   $data = array('upload_data' => $this->upload->data());

      //                   $this->load->view('Patient/RequestReg', $data);
      //           }
      //   }
    public function SendRequest() 
        {
     $this->load->Library('form_validation');
     // start image upload
        $this->load->model("Patient_M");
   
     //end image upload
        $this->form_validation->set_rules("requestername","requestername",'required|min_length[2]');
         $this->form_validation->set_rules('plateno','plateno','required|min_length[2]');
        $this->form_validation->set_rules('location','location','required|min_length[2]');
         $this->form_validation->set_rules("issue","issue",'required|min_length[2]');
        $this->form_validation->set_rules("requestdate","requestdate",'required|min_length[2]');
         // $this->form_validation->set_rules('uploadimage','uploadimage','required');

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
         if (!$this->upload->do_upload('uploadimage'))
                {
                        $error = array('error' => $this->upload->display_errors());
                       // $this->load->view('Patient/RequestRegManage', $error);
                       redirect(base_url() . "Patient_C/savedrequest" ,$error);
                        // $this->load->view('upload_form', $error);
                }
          else
                {
       
                // $data = $this->input->post();
                $info = $this->upload->data();
                $infoimg=$info['file_name'];

       if($this->form_validation->run()) 
        { 
        
       


        $data=array(
            "requester_name" =>$this->input->post("requestername"),
            "plate_no" =>$this->input->post("plateno"),
              "location" =>$this->input->post("location"),
               "issue" =>$this->input->post("issue"),
            "requested_date" =>$this->input->post("requestdate"),
              "vehicle_image" => $infoimg
            );
          
           if($this->input->post("add"))
             {
            $this->Patient_M->save_request($data);
              $this->session->set_flashdata('successmsg','successfully Registered!');
            redirect(base_url() . "Patient_C/savedrequest",'refresh');
          
               
            }

            else 
            {
                 $this->session->set_flashdata('errormsg','Failed to save');
               $this->PatientRequestReg();
              
            }
              // }
           
          // }
          //  else{
          //         $this->PatientRequestReg();
          //        }
              }
                else
                {
                 $this->PatientRequestReg();
                }
              }

     
      }
       function savedrequest()
       {
         $this->PatientRequestReg(); 
        }
    public function update_request()
    {
       $this->load->Library('form_validation');
       $this->form_validation->set_rules("requestername","requestername",'required|min_length[2]');
         $this->form_validation->set_rules('plateno','plateno','required|min_length[2]');
        $this->form_validation->set_rules('location','location','required|min_length[2]');
         $this->form_validation->set_rules("issue","issue",'required|min_length[2]');
        $this->form_validation->set_rules("requestdate","requestdate",'required|min_length[2]');
         $this->form_validation->set_rules('uploadimage','uploadimage','required|min_length[2]');
         // aproval parent
        $this->form_validation->set_rules("issue_status","issue_status",'required|min_length[2]');
        $this->form_validation->set_rules('approval_description','approval_description','required|min_length[2]');
         $this->form_validation->set_rules("service_status","service_status",'required|min_length[2]');
        $this->form_validation->set_rules("assigned_to","assigned_to",'required|min_length[2]');
          $this->form_validation->set_rules('assigned_date','assigned_date','required|min_length[2]');
         $this->form_validation->set_rules('approved_by','approved_by','required|min_length[2]');

           $config['upload_path'] = './images/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);
         if (!$this->upload->do_upload('uploadimage'))
                {
                        $error = array('error' => $this->upload->display_errors());
                       // $this->load->view('Patient/RequestRegManage', $error);
                       redirect(base_url() . "Patient_C/updatedrequest" ,$error);
                        // $this->load->view('upload_form', $error);
                }
          else
                {
       
                // $data = $this->input->post();
                $info = $this->upload->data();
                $updateinfoimg=$info['file_name'];

         if($this->form_validation->run()) 
              { 
                  $this->load->model("Patient_M");
         $data=array(
          "requester_name" =>$this->input->post("requestername"),
            "plate_no" =>$this->input->post("plateno"),
              "location" =>$this->input->post("location"),
               "issue" =>$this->input->post("issue"),
            "requested_date" =>$this->input->post("requestdate"),
             "vehicle_image" =>$updateinfoimg,
           "issue_status" =>$this->input->post("issue_status"),
            "approval_description" =>$this->input->post("approval_description"),
              "service_status" =>$this->input->post("service_status"),
               "assigned_to" =>$this->input->post("assigned_to"),
            "assigned_date" =>$this->input->post("assigned_date"),
             "approved_by" =>$this->input->post("approved_by"));
        if($this->input->post("update"))
        {
            $this->Patient_M->update_request($data,$this->input->post("hidden_id"));
              $this->session->set_flashdata('successmsg','updated successfully');
            redirect(base_url() . "Patient_C/updatedrequest",'refresh');

           
        }
        else 
        {
             $this->session->set_flashdata('errormsg','Failed to update');
           $this->RequestRegManage();
          
        }
      }
        else
        {
           $this->RequestRegManage();
        }
      }
       
    }
    function updatedrequest()
    {
        $this->RequestRegManage();
    }
    
	function delete_request_c($requestid){
      
        $this->load->model("Patient_M");
        $this->Patient_M->delete_request_m($requestid);
        $this->session->set_flashdata('successmsg','user data deleted successfully');
        redirect(base_url() . "Patient_C/deleted_request_redirect");
        
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