
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
       <li> <a class="fa fa-home" href="<?php echo base_url('Doctor_C/home')?>"><i class=""></i>Home</a></li>  
          <li> <a class="fa fa-bus" href="<?php echo base_url('Doctor_C/PatientAssigntoTech')?>"><i class=""></i>Patient Asign to Tech</a></li>
          <li> <a class="fa fa-user" href="<?php echo base_url('Doctor_C/PatientDashboard')?>"><i class=""></i>Assign Patient Treatment</a></li>

          <li> <a class="fa fa-bus" href="<?php echo base_url('Doctor_C/PatientTrmtDashboard')?>"><i class=""></i>Manage Treatment Detail</a></li>
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
           <form   method="post" action="<?php echo base_url()?>Doctor_C/AddTreatment">
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
                            <input type="text" class="form-control text-danger" id="patientid" name="patientid" placeholder="Insert patient ID"  value="<?php echo $row->patient_ID; ?>" readonly required autofocus>
                           <span class="text-danger"><?php echo form_error("patient_ID"); ?></span>
                        </div>
                       <div class="form-label-group col-lg-3">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control text-danger" id="fullname" name="fullname" placeholder="Insert fullname"  value="<?php echo $row->first_name ."  ".$row->middle_name ."  ".$row->last_name;?>"  readonly required autofocus>
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
                        value="<?php echo $row->age; ?>"   required autofocus>
                        <span class="text-danger"><?php echo form_error("age"); ?></span>
                    </div>
                    <!--   <div class="form-label-group col-lg-4" hidden="">
                        <label for="address">Address </label>
                        <input type="text" class="form-control" id="address" name="address"
                         placeholder="address"
                         value="<?php echo $row->address; ?>"  required autofocus>
                        <span class="text-danger"><?php echo form_error("address"); ?></span>
                     </div> -->
                  
                    <!--  <div class="form-label-group col-lg-4" hidden="">
                        <label for="maincase">main_case</label>
                        <input type="text" class="form-control" id="maincase" name="maincase" placeholder="main_case" value="<?php echo $row->main_case; ?>"  required autofocus><span class="text-danger"><?php echo form_error("maincase"); ?></span>
                       </div> -->
                        <div class="form-label-group col-lg-3" >
                        <label for="cardpayment">card payment</label>
                        <input type="text" class="form-control text-danger" id="cardpayment" name="cardpayment" placeholder="cardpayment" value="<?php echo $row->card_payment; ?>"  readonly required autofocus><span class="text-danger"><?php echo form_error("cardpayment"); ?></span>
                     </div>
                  
                    <!--  <div class="form-label-group col-lg-4" hidden="">
                        <label for="regdate">Registration Date</label>
                        <input type="date" class="form-control" id="regdate" name="regdate" placeholder="registration date" value="<?php echo $row->registration_date; ?>"  required autofocus><span class="text-danger"><?php echo form_error("regdate"); ?></span>
                       </div>
                    <div class="form-label-group col-lg-4" hidden="">
                        <label for="registeredby">registered by </label>
                        <input type="text" class="form-control bg-success text-danger" id="registeredby" name="registeredby" placeholder="registered by" value="<?php echo $this->session->userdata('username');?>" readonly  required autofocus><span class="text-danger"><?php echo form_error("registeredby"); ?></span>
                      
                    </div>
 -->
                
                      </hr>
                 <div class="col-lg-12 bg-warning">
                  <span class="fa fa-user">Doctor Treatment Part</span>
                  </div>
         
                    <div class="form-label-group col-lg-4">
                        <label for="patient_case">patient_case</label>
                        <input type="text" class="form-control text-danger bg-warning" id="patient_case" name="patient_case" placeholder="first name" value="<?php echo $row->patient_case; ?>" autofocus required>
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
              
                      <div class="form-label-group col-lg-3">
                            <label for="patientid">Patient ID</label>
                            <input type="text" class="form-control text-danger" id="patientid" name="patientid" placeholder="Insert patient ID"  value="<?php echo $row->patient_ID; ?>" readonly required autofocus>
                           <span class="text-danger"><?php echo form_error("patient_ID"); ?></span>
                        </div>
                      
                    <div class="form-label-group col-lg-4">
                        <label for="patient_case">patient_case</label>
                        <input type="text" class="form-control text-danger bg-warning" id="patient_case" name="patient_case" placeholder="first name" value="<?php echo $row->patient_case; ?>"  readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("patient_case"); ?></span>
                    </div>
                   
                    <div class="form-label-group col-lg-4" >
                        <label for="technician_ID">assign to technician</label>
                        <select class="form-control text-success"  id="technician_ID" name="technician_ID" disabled>
                           <option value="<?php echo $row->emp_id; ?>" ><?php echo $row->emp_id; ?> </option> 
                          <option value="">select technician</option>
                                   <!--  <option value="<?php echo $row->emp_id; ?>" ><?php echo $row->emp_id; ?> </option>  -->
                         <!--  <?php
                                 if(isset($fetch_technician))
                             {
                               foreach ($fetch_technician as $poptechname) 
                               {
                                   
                                  ?> 
                                   <option value="<?php echo $poptechname->emp_id; ?>">
                                      <?php echo $poptechname->first_name;  echo  "   " ;   
                                        echo $poptechname->middle_name; ?> 
                                  </option>
                                  <?php }
                             }
                              ?>  -->
                      
                            
                        </select>
                        <span class="text-danger"><?php echo form_error("technician_ID"); ?></span>
                    </div>           
                
                    <div class="form-label-group col-lg-4">
                        <label for="blood_test_result">blood_test_result</label>
                        <input type="text" class="form-control" id="blood_test_result" name="blood_test_result" placeholder="Filled by Technician"  value="<?php echo $row->blood_test_result; ?>"
                          readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("blood_test_result"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="stool_test_result">stool_test_result</label>
                        <input type="text" class="form-control" id="stool_test_result" name="stool_test_result" placeholder="Filled by Technician"  
                         value="<?php echo $row->stool_test_result; ?>" readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("stool_test_result"); ?></span>
                    </div> 
                    <div class="form-label-group col-lg-4">
                        <label for="urine_test_result">urine_test_result</label>
                        <input type="text" class="form-control" id="urine_test_result" name="urine_test_result" placeholder="Filled by Technician"  
                         value="<?php echo $row->urine_test_result; ?>" readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("urine_test_result"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="other_tests">other_tests</label>
                        <textarea  type="text" class="form-control" id="other_tests" name="other_tests" placeholder="Filled by Technician"  
                         readonly autofocus required><?php echo $row->other_tests; ?></textarea>
                        <span class="text-danger"><?php echo form_error("other_tests"); ?></span>
                    </div>                   
                    <div class="form-label-group col-lg-4">
                        <label for="assigned_date">assigned_date by Dr.</label>
                        <input type="date" class="form-control" id="assigned_date" name="assigned_date" placeholder="assigned_date"  value="<?php echo $row->assigned_date; ?>"  readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("assigned_date"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="assigned_by">assigned_by Dr.</label>
                        <input type="text" class="form-control text-danger" id="assigned_by" name="assigned_by" placeholder="assigned_by"   value="<?php echo $row->assigned_by; ?>" readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("assigned_by"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="checked_date">checked_date</label>
                        <input type="date" class="form-control" id="checked_date" name="checked_date" placeholder="checked_date"  value="<?php echo $row->checked_date; ?>" readonly  autofocus required>
                        <span class="text-danger"><?php echo form_error("checked_date"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="checked_by">checked_by</label>
                        <input type="text" class="form-control text-danger bg-success" id="checked_by" name="checked_by" placeholder="checked_by"  value="<?php echo $row->checked_by; ?>" readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("checked_by"); ?></span>
                    </div>
                  
                         </hr>
                  
                       <?php   
                      }
                     }?>
                      <!-- end technician result -->
                       <div class="container bg-info btn btn-primary">Doctor Treatment Detail</div>
                         <div class="form-label-group col-lg-4">
                        <label for="patient_detail_case">patient_detail_case</label>
                        <textarea type="text" class="form-control" id="patient_detail_case" name="patient_detail_case" placeholder="patient_detail_case"  autofocus required></textarea>
                        <span class="text-danger"><?php echo form_error("patient_detail_case"); ?></span>
                    </div>
                            
                    <div class="form-label-group col-lg-4" >
                        <label for="drug_type">drug_type</label>
                        <select class="form-control text-success" id="drug_type" name="drug_type" required>
                             <option value="none">-select drug_type-</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Flued">Flued</option>
                            <option value="other">Other</option>
                        </select>
                        <span class="text-danger"><?php echo form_error("drug_type"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4" >
                        <label for="medication_type">medication_type</label>
                        <select class="form-control text-success" id="medication_type" name="medication_type" required>
                             <option >-select medication_type-</option>
                            <option value="Follow Up">bed fellow up</option>
                            <option value="Surgery">Surgery</option>
                            <option value="Home">Home</option>
                             <option value="Refer">Refer</option>
                            <option value="Other">Other</option>
                        </select>
                        <span class="text-danger"><?php echo form_error("drug_type"); ?></span>
                    </div>
                      <div class="form-label-group col-lg-4">
                        <label for="patient_treatment_drugs">patient_treatment_drugs</label>
                        <textarea type="text" class="form-control" id="patient_treatment_drugs" name="patient_treatment_drugs" placeholder="patient_treatment_drugs"  autofocus ></textarea>
                        <span class="text-danger"><?php echo form_error("patient_treatment_drugs"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="consumption_interval">consumption_interval</label>
                        <input type="text" class="form-control" id="consumption_interval" name="consumption_interval" placeholder="consumption_interval"  autofocus >
                        <span class="text-danger"><?php echo form_error("consumption_interval"); ?></span>
                    </div>
                   
                     
                    <div class="form-label-group col-lg-4">
                        <label for="total_time">total_time</label>
                        <input type="text" class="form-control" id="total_time" name="total_time" placeholder="total_time"  autofocus >
                         <span class="text-danger"><?php echo form_error("total_time"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="checkup_time">checkup_time</label>
                        <input type="date" class="form-control" id="checkup_time" name="checkup_time" placeholder="checkup_time"  autofocus > 
                         <span class="text-danger"><?php echo form_error("checkup_time"); ?></span>
                    </div>
                                      
                    <div class="form-label-group col-lg-4">
                        <label for="checked_date">checked_date</label>
                        <input type="date" class="form-control" id="checked_date" name="checked_date" placeholder="checked_date"  autofocus >
                        <span class="text-danger"><?php echo form_error("checked_date"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="ckecked_by">ckecked_by</label>
                        <input type="text" class="form-control text-danger bg-success" id="ckecked_by" name="ckecked_by" placeholder="ckecked_by"  value="<?php echo $this->session->userdata('username');?>" autofocus required>
                        <span class="text-danger"><?php echo form_error("ckecked_by"); ?></span>
                    </div>
                 
                         </hr>
                  
                   
                            <div class="form-group col-lg-12">
                        <button type="submit" class="btn btn-primary mb-2" name="add" value="add">Submit</button>
                          
                            <?php echo anchor('Doctor_C/Home','Back',['class'=>'btn btn-defualt']);?>
                               
                          </div>
                    
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