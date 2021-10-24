
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
           <form   method="post" action="<?php echo base_url()?>Doctor_C/AddAssignTechnician">
               <div class="container row">
                  <div class="col-lg-12"> 
                    <h2 style="font-family: sans-serif;background-color: silver">Doctor Patient Assign to Technician </h2></div>
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
                  <span class="fa fa-user">Asign Patient to Technician for Diagonesis by a Doctor</span>
                  </div>
                      <div class="form-label-group col-lg-4">
                        <label for="patient_ID">patient_ID</label>
                        <input type="text" class="form-control" id="patientid" name="patientid" placeholder="Insert patientid"  value="<?php echo $row->patient_ID; ?>" autofocus readonly="">
                        <span class="text-danger"><?php echo form_error("patientid"); ?></span>
                    </div>
                 
                    <div class="form-label-group col-lg-4">
                        <label for="patient_case">patient_case</label>
                        <input type="text" class="form-control text-danger bg-warning" id="patient_case" name="patient_case" placeholder="first name" value="<?php echo $row->patient_case; ?>" autofocus required>
                        <span class="text-danger"><?php echo form_error("patient_case"); ?></span>
                    </div>
                     <?php }
                       }
                        ?> 

                      <div class="form-label-group col-lg-4" >
                        <label for="technician_ID">assign to technician</label>
                        <select class="form-control text-success"  id="technician_ID" name="technician_ID">
                          
                          <option value="">select technician</option>
                                   <!--  <option value="<?php echo $row->first_name; ?>" ><?php echo $row->status; ?> </option>  -->
                          <?php
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
                              ?> 
                      
                            
                        </select>
                        <span class="text-danger"><?php echo form_error("technician_ID"); ?></span>
                    </div> 
                    <div class="form-label-group col-lg-4">
                        <label for="blood_test_result">blood_test_result</label>
                        <input type="text" class="form-control" id="blood_test_result" name="blood_test_result" placeholder="Filled by Technician"  
                         readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("blood_test_result"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="stool_test_result">stool_test_result</label>
                        <input type="text" class="form-control" id="stool_test_result" name="stool_test_result" placeholder="Filled by Technician"  
                         readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("stool_test_result"); ?></span>
                    </div> 
                    <div class="form-label-group col-lg-4">
                        <label for="urine_test_result">urine_test_result</label>
                        <input type="text" class="form-control" id="urine_test_result" name="urine_test_result" placeholder="Filled by Technician"  
                         readonly autofocus required>
                        <span class="text-danger"><?php echo form_error("urine_test_result"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="other_tests">other_tests</label>
                        <textarea  type="text" class="form-control" id="other_tests" name="other_tests" placeholder="Filled by Technician"  
                         autofocus required></textarea>
                        <span class="text-danger"><?php echo form_error("other_tests"); ?></span>
                    </div>                   
                    <div class="form-label-group col-lg-4">
                        <label for="assigned_date">assigned_date</label>
                        <input type="date" class="form-control" id="assigned_date" name="assigned_date" placeholder="assigned_date"   autofocus required>
                        <span class="text-danger"><?php echo form_error("assigned_date"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="assigned_by">assigned_by</label>
                        <input type="text" class="form-control text-danger bg-success" id="assigned_by" name="assigned_by" placeholder="assigned_by"  value="<?php echo $this->session->userdata('username');?>" autofocus required>
                        <span class="text-danger"><?php echo form_error("assigned_by"); ?></span>
                    </div>
                      </hr>
                       <!-- //pharmacist approval part -->
                     <!-- <div class="form-label-group col-lg-4">
                        <label for="pharmacist_approval">pharmacist_approval</label>
                        <input type="text" class="form-control" id="pharmacist_approval" name="pharmacist_approval" placeholder="pharmacist_approval"  autofocus  readonly="">
                         <span class="text-danger"><?php echo form_error("pharmacist_approval"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="pharmacist_approval_date">pharmacist_approval_date</label>
                        <input type="date" class="form-control" id="pharmacist_approval_date" name="pharmacist_approval_date" placeholder="pharmacist_approval_date"  autofocus  readonly=""> 
                         <span class="text-danger"><?php echo form_error("pharmacist_approval_date"); ?></span>
                    </div>
                                      
                    <div class="form-label-group col-lg-4">
                        <label for="medicine_status">medicine_status</label>
                        <input type="text" class="form-control" id="medicine_status" name="medicine_status" placeholder="medicine_status"  autofocus readonly="">
                        <span class="text-danger"><?php echo form_error("medicine_status"); ?></span>
                    </div> -->
                 
                   <!-- nurse approval part -->
                     <!--  <div class="form-label-group col-lg-4">
                        <label for="assigned_nurse">assigned_nurse</label>
                        <input type="text" class="form-control" id="assigned_nurse" name="assigned_nurse" placeholder="assigned_nurse"  autofocus  readonly="">
                         <span class="text-danger"><?php echo form_error("assigned_nurse"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="nurse_approval">nurse_approval</label>
                        <input type="text" class="form-control" id="nurse_approval" name="nurse_approval" placeholder="nurse_approval"  autofocus  readonly=""> 
                         <span class="text-danger"><?php echo form_error("nurse_approval"); ?></span>
                    </div>
                                      
                    <div class="form-label-group col-lg-4">
                        <label for="nurse_approval_date">nurse_approval_date</label>
                        <input type="text" class="form-control" id="nurse_approval_date" name="nurse_approval_date" placeholder="nurse_approval_date"  autofocus readonly="">
                        <span class="text-danger"><?php echo form_error("nurse_approval_date"); ?></span>
                    </div> -->
                         </hr>
                  
                   
                            <div class="form-group col-lg-12">
                        <button type="submit" class="btn btn-primary mb-2" name="add" value="add">Submit</button>
                          
                            <?php echo anchor('Doctor_C/PatientAssigntoTech','Back',['class'=>'btn btn-defualt']);?>
                               
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