
<?php 
$system_name = $this->db->get_where('PRMS_global_data', array('type' => 'SystemName'))->row()->remark;
$system_title = $this->db->get_where('PRMS_global_data', array('type' => 'SystemTitle'))->row()->remark;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PRMS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
     
      <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sidemenu/bootstrap/css/bootstrap.css'?>">

        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
       
          <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sidemenu/bootstrap/css/bootstrap.css'?>">

           <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sidemenu/bootstrap/css/bootstrap.css'?>">

        
           <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sidemenu/css/style.blue.css'?>">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sidemenu/css/style.default.css'?>">
             <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap4/css/bootstrap.min.css'?>">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sidemenu/css/style.green.css'?>">
             <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sidemenu/css/fontastic.css'?>">
              <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap4/css/bootstrap-grid.css'?>">
       
  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
        <div class="sidenav-header-inner text-center"><img src="<?php echo base_url('/images/icon.PNG'); ?> "  alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">PRMS</h2><span>@KHC</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong class="text-primary">PRMS</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
         <hr>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li><a  href="<?php echo base_url('Pharmacist_C/PharmacistDashboard')?>"> <i class="fa fa-home"></i>Home  </a></li>
          <li> <a class="fa fa-user" href="<?php echo base_url('Pharmacist_C/PateintMedicine')?>"><i class=""></i>Patient Medicine</a></li>  
            <li> <a class="fa fa-user" href="<?php echo base_url('Pharmacist_C/MedicineDetail')?>"><i class=""></i>Detail Medicine</a></li>  
             </ul>
        </div>
         <div class="admin-menu">
        <hr>
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
           <!--  <li> <a class="fa fa-bus" href="<?php echo base_url('Doctor_C/VehicleDashboard')?>"><i class=""></i>View System Help</a></li> -->
        
                  <li><a class="" href="<?php echo base_url('Authentication/logout')?>"><i class="fa fa-power-off"></i>Logout</a></li>
     
             </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Patient  </span><strong class="text-primary"> Record Managment  System</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              
                   <div class="float-right">
                         <nav class="navbar navbar-expand-lg ">
                          <a class="navbar-brand" href="#">Welcome</a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                       
                          <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                            <ul class="navbar-nav mr-auto">

                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     <?php echo $this->session->userdata('username');?>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                         <a class="dropdown-item" href="<?php echo base_url('Admin_C/Help')?>"><i class="fa fa-user"></i>Help</a>
                                         
                                          <a class="dropdown-item" href="<?php echo base_url('Authentication/logout')?>"><i class="fa fa-power-off"></i>Logout</a>
                                                                                            
                                            </div>
                                </li>
                            </ul>
                          </div>
                         </nav>
                      </div>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container">
          <div class="row">
                       <!-- body-->
           <form   method="post" action="<?php echo base_url()?>Pharmacist_C/AddPatientMedicine">
               <div class="container row">
                  <div class="col-lg-12"> 
                    <h2 style="font-family: sans-serif;background-color: silver">Doctor Patient Treatment </h2></div>
                        <hr>
                          <div class="col-lg-12" style="background-color: green">
                      <?php if($scsmsg = $this->session->flashdata('successmsg'));?>
                     <?php echo $scsmsg; ?>
                       
                     </div>
                      <div class="col-lg-12" style="background-color: red">
                          <?php if($errmsg = $this->session->flashdata('errormsg'));?>
                     <?php echo $errmsg; ?>
                   </div>
                   <?php 
                   if(isset($fetch_data))
                       {
                         foreach ($fetch_data as $row) 
                         {
                             
                            ?> 
              
                      <div class="form-label-group col-lg-3">
                            <label for="patientid">Patient ID</label>
                            <input type="text" class="form-control text-danger" id="patientid" name="patientid" placeholder="Insert patient ID"  value="<?php echo $row->patient_ID; ?>" readonly  autofocus>
                           <span class="text-danger"><?php echo form_error("patient_ID"); ?></span>
                        </div>
                       <div class="form-label-group col-lg-3">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control text-danger" id="fullname" name="fullname" placeholder="Insert fullname"  value="<?php echo $row->first_name ."  ".$row->middle_name ."  ".$row->last_name;?>"  readonly  autofocus>
                           <span class="text-danger"><?php echo form_error("fullname"); ?></span>
                        </div>
                             
                        <div class="form-label-group col-lg-3">
                        <label for="gender">Gender</label>
                        <select class="form-control text-danger" id="gender" name="gender" disabled="">
                          <option value="<?php echo $row->gender;?>">
                          <?php echo $row->gender; ?></option>
                            <option>-select gender-</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                      <div class="form-label-group col-lg-3" hidden="">
                        
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Age"  
                        value="<?php echo $row->age; ?>"    autofocus>
                        <span class="text-danger"><?php echo form_error("age"); ?></span>
                    </div>
           
                        <div class="form-label-group col-lg-3" >
                        <label for="phone_no">Phone No</label>
                        <input type="text" class="form-control text-danger" id="phone_no" name="phone_no" placeholder="phone_no" value="<?php echo $row->phone_no; ?>"  readonly  autofocus><span class="text-danger"><?php echo form_error("phone_no"); ?></span>
                     </div>
                  
               
                      </hr>
                 
         
                    <div class="form-label-group col-lg-4">
                        <label for="patient_case">patient_case</label>
                        <input type="text" class="form-control text-danger bg-warning" id="patient_case" name="patient_case" placeholder="first name" value="<?php echo $row->patient_case; ?>" autofocus >
                        <span class="text-danger"><?php echo form_error("patient_case"); ?></span>
                    </div>
                     <?php }
                       }
                        ?> 

                      <div class="container bg-info btn btn-primary">Patient Deiagonesis Result by Technician</div>
                      <?php
                           if(isset($fetch_data_result))
                       {
                         foreach ($fetch_data_result as $row) 
                         {
                             
                            ?> 
              
                      <div class="form-label-group col-lg-3"  hidden="">
                            <label for="patientid">Patient ID</label>
                            <input type="text" class="form-control text-danger" id="patientid" name="patientid" placeholder="Insert patient ID"  value="<?php echo $row->patient_ID; ?>" readonly  autofocus>
                           <span class="text-danger"><?php echo form_error("patient_ID"); ?></span>
                        </div>
                      
                    <div class="form-label-group col-lg-4">
                        <label for="patient_case">patient_case</label>
                        <input type="text" class="form-control text-danger bg-warning" id="patient_case" name="patient_case" placeholder="first name" value="<?php echo $row->patient_case; ?>"  readonly autofocus >
                        <span class="text-danger"><?php echo form_error("patient_case"); ?></span>
                    </div>
                   

                                      
                     <div class="form-label-group col-lg-4" >
                        <label for="assigntotechnician">assign to technician</label>
                        <select class="form-control text-success"  id="assigntotechnician" name="assigntotechnician" disabled="" >
                       <option value="<?php echo $row->emp_id; ?>" ><?php echo $row->emp_id; ?> </option>
                          <option value="">select technician</option>

                          <?php
                                 if(isset($fetch_technician))
                             {
                               foreach ($fetch_technician as $popname) 
                               {
                                   
                                  ?> 
                                   <option value="<?php echo $popname->emp_id; ?>">
                                      <?php echo $popname->technician_fname;  echo  "   " ;   
                                        echo $popname->technician_mname; ?> 
                                  </option>
                                  <?php }
                             }
                              ?> 
                      
                            
                        </select>
                        <span class="text-danger"><?php echo form_error("assigntotechnician"); ?></span>
                    </div>               
                
                    <div class="form-label-group col-lg-4" hidden="">
                        <label for="blood_test_result">blood_test_result</label>
                        <input type="text" class="form-control" id="blood_test_result" name="blood_test_result" placeholder="Filled by Technician"  value="<?php echo $row->blood_test_result; ?>" 
                          readonly autofocus >
                        <span class="text-danger"><?php echo form_error("blood_test_result"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4" hidden="">
                        <label for="stool_test_result">stool_test_result</label>
                        <input type="text" class="form-control" id="stool_test_result" name="stool_test_result" placeholder="Filled by Technician"  
                         value="<?php echo $row->stool_test_result; ?>"  readonly autofocus >
                        <span class="text-danger"><?php echo form_error("stool_test_result"); ?></span>
                    </div> 
                    <div class="form-label-group col-lg-4" hidden="">
                        <label for="urine_test_result">urine_test_result</label>
                        <input type="text" class="form-control" id="urine_test_result" name="urine_test_result" placeholder="Filled by Technician"  
                         value="<?php echo $row->urine_test_result; ?>"   readonly autofocus >
                        <span class="text-danger"><?php echo form_error("urine_test_result"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4" hidden="">
                        <label for="other_tests">other_tests</label>
                        <textarea  type="text" class="form-control" id="other_tests" name="other_tests" placeholder="Filled by Technician"  value="<?php echo $row->other_tests; ?>" 
                         readonly autofocus ></textarea>
                        <span class="text-danger"><?php echo form_error("other_tests"); ?></span>
                    </div>                   
                    <div class="form-label-group col-lg-4" hidden="">
                        <label for="assigned_date">assigned_date by Dr.</label>
                        <input type="date" class="form-control" id="assigned_date" name="assigned_date" placeholder="assigned_date"  value="<?php echo $row->assigned_date; ?>"   readonly autofocus >
                        <span class="text-danger"><?php echo form_error("assigned_date"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4" hidden="">
                        <label for="assigned_by">assigned_by Dr.</label>
                        <input type="text" class="form-control text-danger" id="assigned_by" name="assigned_by" placeholder="assigned_by"    readonly autofocus >
                        <span class="text-danger"><?php echo form_error("assigned_by"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="checked_date">checked_date</label>
                        <input type="date" class="form-control" id="checked_date" name="checked_date" placeholder="checked_date"  value="<?php echo $row->checked_date; ?>" readonly  autofocus >
                        <span class="text-danger"><?php echo form_error("checked_date"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4" hidden="">
                        <label for="checked_by">checked_by</label>
                        <input type="text" class="form-control text-danger bg-success" id="checked_by" name="checked_by" placeholder="checked_by"  value="<?php echo $row->checked_by; ?>" readonly autofocus >
                        <span class="text-danger"><?php echo form_error("checked_by"); ?></span>
                    </div>
                  
                         </hr>
                  
                       <?php   
                      }
                     }?>
                      <!-- end technician result -->
                       <div class="container bg-info btn btn-primary">Doctor Treatment Detail</div>
                         <?php
                           if(isset($fetch_data_medicine))
                       {
                         foreach ($fetch_data_medicine as $row) 
                         {
                             
                            ?> 
                           <div class="form-label-group col-lg-3"  >
                            <label for="patientid">Patient ID</label>
                            <input type="text" class="form-control text-danger" id="patientid" name="patientid" placeholder="Insert patient ID"  value="<?php echo $row->patient_ID; ?>" readonly  autofocus>
                           <span class="text-danger"><?php echo form_error("patient_ID"); ?></span>
                        </div>
                         <div class="form-label-group col-lg-4" >
                        <label for="patient_seq_id">patient_seq_id</label>
                        <input type="text" class="form-control text-danger bg-warning" id="patient_seq_id" name="patient_seq_id" placeholder="patient_seq_id" value="<?php echo $row->patient_seq_id; ?>"  readonly autofocus >
                        <span class="text-danger"><?php echo form_error("patient_seq_id"); ?></span>
                    </div>  
                       <div class="form-label-group col-lg-4">
                        <label for="patient_case">patient_case</label>
                        <input type="text" class="form-control text-danger bg-warning" id="patient_case" name="patient_case" placeholder="first name" value="<?php echo $row->patient_case; ?>"  readonly autofocus >
                        <span class="text-danger"><?php echo form_error("patient_case"); ?></span>
                    </div>
                   

                         <div class="form-label-group col-lg-4">
                        <label for="patient_detail_case">patient_detail_case</label>
                        <textarea type="text" class="form-control" id="patient_detail_case" name="patient_detail_case" placeholder="patient_detail_case" value="<?php echo $row->patient_detail_case; ?>" autofocus  readonly></textarea>
                        <span class="text-danger"><?php echo form_error("patient_detail_case"); ?></span>
                    </div>
                            
                    <div class="form-label-group col-lg-4" >
                        <label for="drug_type">Dosage_Type/drug_type</label>
                        <select class="form-control text-success" id="drug_type" name="drug_type"  disabled="">
                          <option value="<?php echo $row->drug_type; ?>"><?php echo $row->drug_type; ?></option>
                             <option >-select drug_type-</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Flued">Flued</option>
                            <option value="other">Other</option>
                        </select>
                        <span class="text-danger"><?php echo form_error("drug_type"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4" >
                        <label for="medication_type">medication_type</label>
                        <select class="form-control text-success" id="medication_type" name="medication_type"  disabled="">
                          <option value="<?php echo $row->medication_type; ?>"><?php echo $row->medication_type; ?></option>
                             <option >-select medication_type-</option>
                            <option value="Follow Up">bed fellow up</option>
                            <option value="Surgery">Surgery</option>
                            <option value="Home">Home</option>
                            <option value="Other">Other</option>
                        </select>
                        <span class="text-danger"><?php echo form_error("drug_type"); ?></span>
                    </div>
                      <div class="form-label-group col-lg-4">
                        <label for="patient_treatment_drugs">Rx/patient_treatment_drugs</label>
                        <textarea type="text" class="form-control" id="patient_treatment_drugs" name="patient_treatment_drugs" placeholder="patient_treatment_drugs" value="<?php echo $row->patient_treatment_drugs; ?>"  readonly autofocus ><?php echo $row->patient_treatment_drugs; ?></textarea>
                        <span class="text-danger"><?php echo form_error("patient_treatment_drugs"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="consumption_interval">Dosage/consumption_interval</label>
                        <input type="text" class="form-control" id="consumption_interval" name="consumption_interval" placeholder="consumption_interval" value="<?php echo $row->consumption_interval; ?>" readonly autofocus >
                        <span class="text-danger"><?php echo form_error("consumption_interval"); ?></span>
                    </div>
                   
                     
                    <div class="form-label-group col-lg-4">
                        <label for="total_time">numer of days</label>
                        <input type="text" class="form-control" id="total_time" name="total_time" placeholder="total_time" value="<?php echo $row->total_time; ?>" readonly autofocus >
                         <span class="text-danger"><?php echo form_error("total_time"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="checkup_time">checkup_time</label>
                        <input type="date" class="form-control" id="checkup_time" name="checkup_time" placeholder="checkup_time" value="<?php echo $row->checkup_time; ?>" readonly autofocus > 
                         <span class="text-danger"><?php echo form_error("checkup_time"); ?></span>
                    </div>
                                      
                    <div class="form-label-group col-lg-4">
                        <label for="checked_date">checked_date</label>
                        <input type="date" class="form-control" id="checked_date" name="checked_date" placeholder="checked_date" value="<?php echo $row->checked_date; ?>" readonly autofocus >
                        <span class="text-danger"><?php echo form_error("checked_date"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="ckecked_by">ckecked_by</label>
                        <input type="text" class="form-control text-danger bg-success" id="ckecked_by" name="ckecked_by" placeholder="ckecked_by"   value="<?php echo $row->ckecked_by; ?>" readonly autofocus >
                        <span class="text-danger"><?php echo form_error("ckecked_by"); ?></span>
                    </div>
                 
                         </hr>
                         <div class="container bg-info">Pharmacist Approval Part</div>
                          </hr>
                          <div class="form-label-group col-lg-4">
                        <label for="pharmacist_approval">pharmacist_approval</label>
                        <input type="text" class="form-control text-danger bg-success" id="pharmacist_approval" name="pharmacist_approval" placeholder="pharmacist_approval" value=" <?php echo $this->session->userdata('username'); ?>" autofocus required>
                        <span class="text-danger"><?php echo form_error("pharmacist_approval"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="pharmacist_approval_date">pharmacist_approval_date</label>
                        <input type="date" class="form-control text-danger" id="pharmacist_approval_date" name="pharmacist_approval_date" placeholder="pharmacist_approval_date"    value="<?php echo $row->pharmacist_approval_date; ?>" autofocus >
                        <span class="text-danger"><?php echo form_error("pharmacist_approval_date"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4" >
                        <label for="medicine_status">Medicine Status</label>
                        <select class="form-control text-success" id="medicine_status" name="medicine_status" >
                          <option value="<?php echo $row->medicine_status; ?>"><?php echo $row->medicine_status; ?></option>
                             <option >-select Medicine Status-</option>
                            <option value="All Granted">All Granted</option>
                            <option value="Parcially Granted">Parcially Granted</option>
                             <option value="Not Available">Not Available</option>
                            <option value="Other">Other</option>
                        </select>
                        <span class="text-danger"><?php echo form_error("medicine_status"); ?></span>
                    </div>
                      <div class="form-label-group col-lg-4">
                        <label for="price">Price</label>
                        <textarea ype="textarea" class="form-control text-danger" id="price" name="price" placeholder="detail drug price"   
                         value="<?php echo $row->price; ?>" autofocus ></textarea>
                        <span class="text-danger"><?php echo form_error("price"); ?></span>
                    </div>
                  
                   
                            <div class="form-group col-lg-12">
                      <input type="hidden" name="hidden_id" value="<?php  echo $row->patient_seq_id;?>" required>
                        <input type="submit" value="Update" class="btn btn-info" name="update"/>
                          
                            <?php echo anchor('Pharmacist_C/PateintMedicine','Back',['class'=>'btn btn-defualt']);?>
                               
                          </div>
                      <?php
                        }
                      }
                        ?> 
                  </div>
              </form>
          </div>
        </div>
      </section>
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>KHC &copy; 2020-21</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="" class="external">Me</a></p>
             
            </div>
          </div>
        </div>
      </footer>
    </div>
      <script src="<?php echo base_url(); ?>assets/sidemenu/jquery/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/sidemenu/popper/popper.min.js"></script>
     <script src="<?php echo base_url(); ?>assets/sidemenu/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/sidemenu/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/sidemenu/jquery.cookie/jquery.cookie.js"></script>
 <script src="<?php echo base_url(); ?>assets/sidemenu/chart.js/Chart.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/sidemenu/jqueryvalidate/validate.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/sidemenu/Chart/charts-home.js"></script>
  <script src="<?php echo base_url(); ?>assets/sidemenu/js/front.js"></script>
   <script src="<?php echo base_url(); ?>assets/sidemenu/scroll/jquery.Scrollbar.min.js"></script>

  
 
    <script>
            $('input[data-type="date"]').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        </script>


  </body>
</html>