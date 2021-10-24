
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
        <li><a  href="<?php echo base_url('Reception_C/ReceptionDashboard')?>"> <i class="fa fa-home"></i>Home  </a></li>
              <li> <a class="fa fa-bus" href="<?php echo base_url('Reception_C/PatientManage')?>"><i class=""></i>Patient Manage</a></li>   
          <li> <a class="fa fa-bus" href="<?php echo base_url('Reception_C/DocAssDashboard')?>"><i class=""></i>Assign Doctor</a></li>
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
           <form   method="post" action="<?php echo base_url()?>Reception_C/AssignPatient">
               <div class="container row">
                  <div class="col-lg-12"> <h2 style="font-family: sans-serif;background-color: silver">Assign Doctor With Respective Room</h2></div>
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
              
                      <div class="form-label-group col-lg-4">
                            <label for="patientid">Member ID</label>
                            <input type="text" class="form-control" id="patientid" name="patientid" placeholder="Insert patient ID"  value="<?php echo $row->patient_ID; ?>" required autofocus>
                           <span class="text-danger"><?php echo form_error("patient_ID"); ?></span>
                        </div>
                       <div class="form-label-group col-lg-4">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Insert user name"  value="<?php echo $row->first_name; ?>"  required autofocus>
                           <span class="text-danger"><?php echo form_error("firstname"); ?></span>
                        </div>
                             <div class="form-label-group col-lg-4">
                            <label for="middlename">Middle Name</label>
                            <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Middle Name"  value="<?php echo $row->middle_name; ?>" autofocus> <span class="text-danger"><?php echo form_error("middlename"); ?></span>
                       
                        </div>
                        <div class="form-label-group col-lg-4">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="last name"  value="<?php echo $row->last_name; ?>" required autofocus><span class="text-danger"><?php echo form_error("lastname"); ?></span>
                           
                        </div>
                        <div class="form-label-group col-lg-4">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                          <option value="<?php echo $row->gender;?>">
                          <?php echo $row->gender; ?></option>
                            <option>-select gender-</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                        </select>
                    </div>
                      <div class="form-label-group col-lg-4">
                        
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Age"  value="<?php echo $row->age; ?>" required autofocus>
                        <span class="text-danger"><?php echo form_error("department"); ?></span>
                    </div>
                      <div class="form-label-group col-lg-4">
                        <label for="address">Address </label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="address" value="<?php echo $row->address; ?>"  required autofocus><span class="text-danger"><?php echo form_error("address"); ?></span>
                     </div>
                  
                     <div class="form-label-group col-lg-4">
                        <label for="patientcase">patient case</label>
                        <input type="text" class="form-control" id="patientcase" name="patientcase" placeholder="patientcase" value="<?php echo $row->patient_case; ?>"  required autofocus><span class="text-danger"><?php echo form_error("patientcase"); ?></span>
                       </div>
                      <div class="form-label-group col-lg-4">
                        <label for="cardpayment">Card Payment</label>
                        <input type="text" class="form-control" id="cardpayment" name="cardpayment" placeholder="cardpayment" value="<?php echo $row->card_payment; ?>"  required autofocus><span class="text-danger"><?php echo form_error("cardpayment"); ?></span>
                     </div>
                  
                     <div class="form-label-group col-lg-4">
                        <label for="regdate">Registration Date</label>
                        <input type="date" class="form-control" id="regdate" name="regdate" placeholder="registration date" value="<?php echo $row->registration_date; ?>"  required autofocus><span class="text-danger"><?php echo form_error("regdate"); ?></span>
                       </div>
                    <div class="form-label-group col-lg-4">
                        <label for="registeredby">registered by </label>
                        <input type="text" class="form-control bg-success text-danger" id="registeredby" name="registeredby" placeholder="registered by" value="<?php echo $this->session->userdata('username');?>" readonly  required autofocus><span class="text-danger"><?php echo form_error("registeredby"); ?></span>
                      
                    </div>

                

                      </hr>
                 <div class="col-lg-12 bg-warning">
                  <span class="fa fa-user">Approval Part</span>
                  <!-- <hr></hr> -->
                 </div>
                 
                   
                      <div class="form-label-group col-lg-4" readonly>
                        <label for="assignedroom">Assigned Room</label>
                        <select class="form-control text-danger" id="assignedroom" name="assignedroom" >
                            
                            <option class="text-danger" value="<?php echo $row->assigned_room; ?>"><?php echo $row->assigned_room; ?></option>
                            <option class="text-success" value="Room1">Room1</option>
                            <option class="text-success" value="Room2">Room2</option>
                             <option class="text-success" value="Room3">Room3</option>
                             <option class="text-success" value="Room4">Room4</option>
                            <option class="text-success" value="Room5">Room5</option>
                             <option class="text-success" value="Room6">Room6</option>
                             <option class="text-success" value="Room7">Room7</option>
                             <option class="text-success" value="Room8">Room8</option>
                            <option class="text-success" value="Room9">Room9</option>
                             <option class="text-success" value="Room10">Room10</option>

                        </select>
                        <span class="text-danger"><?php echo form_error("assignedroom"); ?></span>
                    </div>
                   
                     
                       <div class="form-label-group col-lg-4" >
                        <label for="assigneddoctor">assigneddoctor</label>
                        <select class="form-control text-success"  id="assigneddoctor" name="assigneddoctor">
                          
                          <option value="">select doctor</option>
                                   <!--  <option value="<?php echo $row->first_name; ?>" ><?php echo $row->status; ?> </option>  -->
                          <?php
                                 if(isset($fetch_doctor))
                             {
                               foreach ($fetch_doctor as $instname) 
                               {
                                   
                                  ?> 
                                   <option value="<?php echo $instname->emp_id; ?>">
                                      <?php echo $instname->first_name;  echo  "   " ;   
                                        echo $instname->middle_name; ?> 
                                  </option>
                                  <?php }
                             }
                              ?> 
                      
                            
                        </select>
                        <span class="text-danger"><?php echo form_error("assigneddoctor"); ?></span>
                    </div>


                     <div class="form-label-group col-lg-4">
                        <label for="assigneddate">Assigned Date</label>
                        <input  type="date" class="form-control" id="assigneddate" name="assigneddate" placeholder="assigneddate" value="<?php echo $row->assigned_date; ?>" autofocus>
                        <span class="text-danger"><?php echo form_error("assigneddate"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="assignedby">Assigned By</label>
                        <input  type="text" class="form-control bg-success text-danger" id="assignedby" name="assignedby" placeholder="assignedby"  autofocus value="<?php echo $this->session->userdata('username');?>" readonly>
                        <span class="text-danger"><?php echo form_error("assignby"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="assignedstatus">Assigned Status</label>
                        <select class="form-control" id="assignedstatus" name="assignedstatus">
                          <option value="<?php echo $row->assigned_status;?>">
                          <?php echo $row->assigned_status; ?></option>
                            <option>-select assigned status-</option>
                            <option value="Assigned">Assigned</option>
                            <option value="Suspended">Suspended</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                   
                            <div class="form-group col-lg-12">
                         <input type="hidden" name="hidden_id" value="<?php  echo $row->patient_ID;?>" required>
                        <input type="submit" value="Update" class="btn btn-info" name="update"/>

                            <?php echo anchor('Reception_C/ReceptionDashboard','Back',['class'=>'btn btn-defualt']);?>
                               
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

  
 
    <script>
            $('input[data-type="date"]').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        </script>


  </body>
</html>