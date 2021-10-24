
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
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
           <li> <a class="fa fa-home" href="<?php echo base_url('Doctor_C/home')?>"><i class=""></i>Home</a></li>  
          <li> <a class="fa fa-bus" href="<?php echo base_url('Doctor_C/PatientAssigntoTech')?>"><i class=""></i>Patient Asign to Tech</a></li>
          <li> <a class="fa fa-user" href="<?php echo base_url('Doctor_C/PatientDashboard')?>"><i class=""></i>Assign Patient Treatment</a></li>

          <li> <a class="fa fa-bus" href="<?php echo base_url('Doctor_C/PatientTrmtDashboard')?>"><i class=""></i>Manage Treatment Detail</a></li>
     
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
              <form   method="post" action="<?php echo base_url()?>Doctor_C/update_Patient_trt">
                 <div class="container row">
                  <div class="col-lg-12"> <h4 style="font-family: sans-serif;">Edit Patient Treatment Data</h4></div>
                        <hr>
                          <div class="col-lg-12" style="background-color: green">
                      <?php if($scsmsg = $this->session->flashdata('successmsg'));?>
                     <?php echo $scsmsg; ?>
                          <?php if($errmsg = $this->session->flashdata('errormsg'));?>
                     <?php echo $errmsg; ?>
                   </div>
                   <?php 
                   if(isset($fetch_data))
                       {
                         foreach ($fetch_data as $row) 
                         {
                             
                            ?> 
                    
                     <div class="col-lg-12 bg-warning">
                  <span class="fa fa-user">Doctor Treatment Part</span>
                  </div>
              
                      <div class="form-label-group col-lg-4">
                        <label for="patientid">Patient ID</label>
                        <input type="text" class="form-control" id="patientid" name="patientid" placeholder="Insert patient id"  value="<?php echo $row->patient_ID; ?>" autofocus readonly>
                        <span class="text-danger"><?php echo form_error("patientid"); ?></span>
                    </div>
                 
                    <div class="form-label-group col-lg-4">
                        <label for="patient_case">patient_case</label>
                        <input type="text" class="form-control text-danger bg-warning" id="patient_case" name="patient_case" placeholder="" value="<?php echo $row->patient_case; ?>" autofocus required>
                        <span class="text-danger"><?php echo form_error("patient_case"); ?></span>
                    </div>
                    

                         <div class="form-label-group col-lg-4">
                        <label for="patient_detail_case">patient_detail_case</label>
                        <textarea type="text" class="form-control" id="patient_detail_case" name="patient_detail_case" placeholder="patient_detail_case" value="<?php echo $row->patient_detail_case; ?>"  autofocus required><?php echo $row->patient_detail_case; ?></textarea>
                        <span class="text-danger"><?php echo form_error("patient_detail_case"); ?></span>
                    </div>
                    
                    <div class="form-label-group col-lg-4" >
                        <label for="drug_type">drug_type</label>
                        <select class="form-control text-success" id="drug_type" name="drug_type" required>
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
                        <select class="form-control text-success" id="medication_type" name="medication_type" required>
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
                        <label for="patient_treatment_drugs">patient_treatment_drugs</label>
                        <textarea type="text" class="form-control" id="patient_treatment_drugs" name="patient_treatment_drugs" placeholder="patient_treatment_drugs" value="<?php echo $row->patient_treatment_drugs; ?>" autofocus required><?php echo $row->patient_treatment_drugs; ?></textarea>
                        <span class="text-danger"><?php echo form_error("patient_treatment_drugs"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="consumption_interval">consumption_interval</label>
                        <input type="text" class="form-control" id="consumption_interval" name="consumption_interval" placeholder="consumption_interval"  value="<?php echo $row->consumption_interval; ?>" autofocus required>
                        <span class="text-danger"><?php echo form_error("consumption_interval"); ?></span>
                    </div>
                   
                     
                    <div class="form-label-group col-lg-4">
                        <label for="total_time">total_time</label>
                        <input type="text" class="form-control" id="total_time" name="total_time" placeholder="total_time"  value="<?php echo $row->total_time; ?>" autofocus required>
                         <span class="text-danger"><?php echo form_error("total_time"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="checkup_time">checkup_time</label>
                        <input type="date" class="form-control" id="checkup_time" name="checkup_time" placeholder="checkup_time" value="<?php echo $row->checkup_time; ?>"  autofocus required> 
                         <span class="text-danger"><?php echo form_error("checkup_time"); ?></span>
                    </div>
                                      
                    <div class="form-label-group col-lg-4">
                        <label for="checked_date">checked_date</label>
                        <input type="date" class="form-control" id="checked_date" name="checked_date" placeholder="checked_date"  value="<?php echo $row->checked_date; ?>" autofocus required>
                        <span class="text-danger"><?php echo form_error("checked_date"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="ckecked_by">ckecked_by</label>
                        <input type="text" class="form-control text-danger bg-success" id="ckecked_by" name="ckecked_by" placeholder="ckecked_by"  value="<?php echo $this->session->userdata('username');?>" value="<?php echo $row->ckecked_by; ?>" autofocus required>
                        <span class="text-danger"><?php echo form_error("ckecked_by"); ?></span>
                    </div>

                    <!-- //pharmacist approval part -->
                     <div class="form-label-group col-lg-4">
                        <label for="pharmacist_approval">pharmacist_approval</label>
                        <input type="text" class="form-control" id="pharmacist_approval" name="pharmacist_approval" placeholder="pharmacist_approval" value="<?php echo $row->pharmacist_approval; ?>" autofocus  readonly="">
                         <span class="text-danger"><?php echo form_error("pharmacist_approval"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="pharmacist_approval_date">pharmacist_approval_date</label>
                        <input type="text" class="form-control" id="pharmacist_approval_date" name="pharmacist_approval_date" 
                        value="<?php echo $row->pharmacist_approval_date; ?>" placeholder="pharmacist_approval_date"  autofocus  readonly=""> 
                         <span class="text-danger"><?php echo form_error("pharmacist_approval_date"); ?></span>
                    </div>
                                      
                    <div class="form-label-group col-lg-4">
                        <label for="medicine_status">medicine_status</label>
                        <input type="text" class="form-control" id="medicine_status" name="medicine_status" placeholder="medicine_status" value="<?php echo $row->medicine_status; ?>" autofocus readonly="">
                        <span class="text-danger"><?php echo form_error("medicine_status"); ?></span>
                    </div>
                           </hr>
                           <!-- nurse approval part -->
                      <!-- <div class="form-label-group col-lg-4">
                        <label for="assigned_nurse">assigned_nurse</label>
                        <input type="text" class="form-control" id="assigned_nurse" name="assigned_nurse" placeholder="assigned_nurse" value="<?php echo $row->assigned_nurse; ?>" autofocus  readonly="">
                         <span class="text-danger"><?php echo form_error("assigned_nurse"); ?></span>
                    </div> -->
                     <div class="form-label-group col-lg-4" >
                        <label for="assigned_nurse">assign to nurse</label>
                        <select class="form-control text-success"  id="assigned_nurse" name="assigned_nurse">
                   <option value="<?php echo $row->assigned_nurse; ?>" >
                              <?php echo $row->assigned_nurse; ?> </option> 
                          <option value="">select technician</option>
                                  
                          <?php
                                 if(isset($fetch_nurse))
                             {
                               foreach ($fetch_nurse as $popnursename) 
                               {
                                   
                                  ?> 
                                   <option value="<?php echo $popnursename->emp_id; 
                                    echo "  ";  ?>">
                                      <?php echo $popnursename->first_name;  echo  "   " ;   
                                        echo $popnursename->middle_name; ?> 
                                  </option>
                                  <?php }
                             }
                              ?> 
                      
                            
                        </select>
                        <span class="text-danger"><?php echo form_error("assigned_nurse"); ?></span>
                    </div> 
                     <div class="form-label-group col-lg-4">
                        <label for="nurse_approval">nurse_approval</label>
                        <input type="text" class="form-control" id="nurse_approval" name="nurse_approval" placeholder="nurse_approval" value="<?php echo $row->nurse_approval; ?>" autofocus  readonly=""> 
                         <span class="text-danger"><?php echo form_error("nurse_approval"); ?></span>
                    </div>
                                      
                    <div class="form-label-group col-lg-4">
                        <label for="nurse_approval_date">nurse_approval_date</label>
                        <input type="text" class="form-control" id="nurse_approval_date" name="nurse_approval_date" placeholder="nurse_approval_date" value="<?php echo $row->nurse_approval_date; ?>" autofocus readonly="">
                        <span class="text-danger"><?php echo form_error("nurse_approval_date"); ?></span>
                    </div>
                         </hr>
                     
                      <div class="form-group col-lg-12">
                      <input type="hidden" name="hidden_id" value="<?php  echo $row->patient_mt_id;?>" required>
                        <input type="submit" value="Update" class="btn btn-info" name="update"/>

                            <?php echo anchor('Doctor_C/PatientTrmtDashboard','Back',['class'=>'btn btn-defualt']);?>
                               
                          </div>
                     <?php }
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

  <!-- 
  <script>
            $('input[data-type="date"]').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        </script> -->

  </body>
</html>