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
            <h2 class="h5">PRMS</h2><span>@PRMS</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"><strong class="text-primary">PRMS</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a  href="<?php echo base_url('Reception_C/ReceptionDashboard')?>"> <i class="fa fa-home"></i>Home  </a></li>
              <li> <a class="fa fa-bus" href="<?php echo base_url('Reception_C/PatientManage')?>"><i class=""></i>Patient Manage</a></li>   
          <li> <a class="fa fa-bus" href="<?php echo base_url('Reception_C/DocAssDashboard')?>"><i class=""></i>Assign Doctor</a></li>
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
                  <div class="brand-text d-none d-md-inline-block"><span>PRMS Patient</span><strong class="text-primary"> Record Managment  System</strong></div></a></div>
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
               <form   method="post" action="<?php echo base_url()?>Reception_C/AddPatient">
                 <div class="container row">
       <div class="col-lg-12"> <h4 style="font-family: sans-serif;">Patient Registration</h4></div>
           <hr>
          <div class="container  " style="background-color: green;">
              <?php if($scsmsg = $this->session->flashdata('successmsg'));?>
                     <?php echo $scsmsg; ?>
                   </div>
          <div class="container  " style="background-color: red;">
                          <?php if($errmsg = $this->session->flashdata('errormsg'));?>
                     <?php echo $errmsg; ?> 
             
        </div>
               <div class="form-label-group col-lg-4">
                        <label for="patientid">Patient ID</label>
                        <input type="text" class="form-control" id="patientid" name="patientid" placeholder="Insert patient id"  autofocus>
                        <span class="text-danger"><?php echo form_error("patientid"); ?></span>
                    </div>
                 
                    <div class="form-label-group col-lg-4">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="first name"  autofocus>
                        <span class="text-danger"><?php echo form_error("firstname"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="middlename">Middle Name</label>
                        <input class="form-control" id="middlename" name="middlename" placeholder="middle_name"  autofocus>
                        <span class="text-danger"><?php echo form_error("middlename"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname"  autofocus>
                        <span class="text-danger"><?php echo form_error("lastname"); ?></span>
                    </div>
                  
                    <div class="form-label-group col-lg-4" >
                        <label for="gender">Gander</label>
                        <select class="form-control text-success" id="gender" name="gender" >
                             <option >-select gender-</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="text-danger"><?php echo form_error("gender"); ?></span>
                    </div>
                      <div class="form-label-group col-lg-4">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="age"  autofocus>
                        <span class="text-danger"><?php echo form_error("age"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="address"  autofocus>
                        <span class="text-danger"><?php echo form_error("address"); ?></span>
                    </div>
                   
                     
                    <div class="form-label-group col-lg-4">
                        <label for="phoneno">Phone No</label>
                        <input type="text" class="form-control" id="phoneno" name="phoneno" placeholder="phoneno"  autofocus>
                         <span class="text-danger"><?php echo form_error("phoneno"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="patientcase">Patient Case</label>
                        <textarea type="text" class="form-control" id="patientcase" name="patientcase" placeholder="patient case"  autofocus> </textarea> 
                         <span class="text-danger"><?php echo form_error("patientcase"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="cardpayment">Card Payment</label>
                        <input type="text" class="form-control" id="cardpayment" name="cardpayment" placeholder="cardpayment"  autofocus>
                        <span class="text-danger"><?php echo form_error("cardpayment"); ?></span>
                    </div>
                   
                    <div class="form-label-group col-lg-4">
                        <label for="regdate">Registration Date</label>
                        <input type="date" class="form-control" id="regdate" name="regdate" placeholder="regdate"  autofocus>
                        <span class="text-danger"><?php echo form_error("regdate"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="regby">Registered By</label>
                        <input type="text" class="form-control" id="regby" name="regby" placeholder="regby"  autofocus value="<?php echo $this->session->userdata('username');?>" readonly>
                         <span class="text-danger"><?php echo form_error("regby"); ?></span>
                    </div>
                          <div class="form-group col-lg-12">
                      
                            <button type="submit" class="btn btn-primary mb-2" name="add" value="add">Submit</button>
                               
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