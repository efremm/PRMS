
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
           <li> <a class="fa fa-bus" href="<?php echo base_url('Reception_C/MemberDashboard')?>"><i class=""></i>Manage Employee</a></li>
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
           <form   method="post" action="<?php echo base_url()?>Reception_C/UpdateEmployee">
               <div class="container row">
                  <div class="col-lg-12"> <h2 style="font-family: sans-serif;background-color: silver">Update Employee Info</h2></div>
                        <hr>
                          <div class="col-lg-12" style="background-color: green">
                      <?php if($scsmsg = $this->session->flashdata('successmsg'));?>
                     <?php echo $scsmsg; ?>
                   <!-- </div>
                      <div class="col-lg-12" style="background-color: red"> -->
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
                        <label for="employeeid">Employee ID</label>
                        <input type="text" class="form-control" id="employeeid" name="employeeid" placeholder="Insert employeeid id" 
                         value="<?php echo $row->emp_id; ?>"  autofocus>
                        <span class="text-danger"><?php echo form_error("employeeid"); ?></span>
                    </div>
                      <div class="form-label-group col-lg-4" >
                        <label for="title">title</label>
                        <select class="form-control text-success" id="title" name="title" >
                          <option  value="<?php echo $row->title; ?>"> <?php echo $row->title; ?></option>
                             <option >-select title-</option>
                            <option value="Dr">Dr</option>
                            <option value="Ms">Ms</option>
                            <option value="Nurse">Nurse</option>
                            <option value="Lab Technician">Lab Technician</option>
                             <option value="Encoder">Encoder</option>
                            <option value="Secretary">Secretary</option>
                            <option value="Receptienist">Receptienist</option>
                             <option value="Parmacist">Parmacist</option>
                              <option value="Casher">Casher</option>
                        </select>
                        <span class="text-danger"><?php echo form_error("title"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="first name" 
                         value="<?php echo $row->first_name; ?>" autofocus>
                        <span class="text-danger"><?php echo form_error("first_name"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="middlename">Middle Name</label>
                        <input class="form-control" id="middlename" name="middlename" placeholder="middle_name" 
                         value="<?php echo $row->middle_name; ?>" autofocus>
                        <span class="text-danger"><?php echo form_error("middle_name"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="lastname" placeholder="lastname" 
                         value="<?php echo $row->last_name; ?>" autofocus>
                        <span class="text-danger"><?php echo form_error("last_name"); ?></span>
                    </div>
                  
                    <div class="form-label-group col-lg-4" >
                        <label for="gender">Gender</label>
                        <select class="form-control text-success" id="gender" name="gender" >
                             <option value="<?php echo $row->gender; ?>"><?php echo $row->gender; ?></option>
                             <option >-select gender-</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <span class="text-danger"><?php echo form_error("gender"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="department">Department</label>
                        <input type="text" class="form-control" id="department" name="department" placeholder="department" 
                         value="<?php echo $row->department; ?>" autofocus>
                        <span class="text-danger"><?php echo form_error("department"); ?></span>
                    </div>
                      <div class="form-label-group col-lg-4">
                        <label for="salary">salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" placeholder="salary" 
                         value="<?php echo $row->salary; ?>" autofocus>
                        <span class="text-danger"><?php echo form_error("salary"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="address" 
                         value="<?php echo $row->address; ?>" autofocus>
                        <span class="text-danger"><?php echo form_error("address"); ?></span>
                    </div>
                   
                     
                    <div class="form-label-group col-lg-4">
                        <label for="phone_no">Phone No</label>
                        <input type="text" class="form-control" id="phone_no" name="phoneno" placeholder="phoneno" 
                         value="<?php echo $row->phone_no; ?>"  autofocus>
                         <span class="text-danger"><?php echo form_error("phone_no"); ?></span>
                    </div>
                     <div class="form-label-group col-lg-4">
                        <label for="hired_date">hired_date</label>
                        <input type="date" name=""  class="form-control" id="hired_date" name="hireddate" placeholder="hired_date" 
                         value="<?php echo $row->hired_date; ?>" autofocus>
                         <span class="text-danger"><?php echo form_error("hired_date"); ?></span>
                    </div>
                    <div class="form-label-group col-lg-4">
                        <label for="emp_type">emp_type</label>
                        <input type="text" class="form-control" id="emp_type" name="emptype" placeholder="emp_type" 
                         value="<?php echo $row->emp_type; ?>" autofocus>
                        <span class="text-danger"><?php echo form_error("emp_type"); ?></span>
                    </div>
                   
                            <div class="form-group col-lg-12">
                         <input type="hidden" name="hidden_id" value="<?php  echo $row->emp_id;?>" required>
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