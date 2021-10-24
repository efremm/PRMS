
<?php 
$system_name = $this->db->get_where('PRMS_global_data', array('type' => 'SystemName'))->row()->remark;
$system_title = $this->db->get_where('PRMS_global_data', array('type' => 'SystemTitle'))->row()->remark;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <title>Login CodeIgniter</title> -->
  <script type="text/javascript" src="<?php echo base_url('assets/bootstrap4/js/bootstrap.js');?>"></script>
   <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
   
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap4/css/bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap4/css/bootstrap-grid.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/custom_file/float_lib.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-free-5.6.3-web/css/all.css'?>">
      <link rel="icon" href="<?php echo base_url(); ?>images/icon.png" type="image/x-icon"/>
        <title><?php echo $system_name; ?></title>
  </head>
   <body class="bdy">
   <style type="text/css">
          .bglogin {
            background-image: url('../images/bgmdc4.jpg');
            background-repeat: space;
            background-size: cover; 
          }
            .bdy {
            background-image: url('../images/bgmdc2.jpg');
            background-repeat: space;
            background-size: cover; 
           
        }
     </style>
       
     <style type="text/css">
                ticks: {
          precision:0
        }
      </style>

<div class="container bglogin ticks">
  <div class="row">
      <div class="d-flex  container justify-content-center align-items-center pad">
          <h1 class="text-warning"><span class="fa fa-Patient"> 
          PRMS(Patient Record Managment  System)  </span></h1>
      </div>
      <div class="d-flex  container justify-content-center align-items-center pad">
          <h1 class="text-white text-warning"><span class="fa fa-Patient"> 
          KHC(Kolfe Health Center) </span></h1>
      </div>

     <div class="card  bg-light" >
        <div class="" id="loginform">
         <?php
        if ($this->session->flashdata('notcreated'))
        {
            echo "<div class='alert alert-success'>".$this->session->flashdata('notcreated')."</div>";
        }
        ?>
        </div>
     </div>
     <div class="col-lg-4 container justify-content-center align-items-center">
     <div class="px-0 ">
         
            <img src="<?php echo base_url('/images/bgmdc1.png'); ?>" class="img-fluid rounded-circle" style="padding-bottom:0.5rem;padding-left: 5rem;padding-right: 5rem;" >
        </div>
    </div>
  </div>
    <div class="row" >
    <div class="container d-flex  justify-content-center align-items-center" >

     <form method="post" action="<?php echo site_url('Authentication/login');?>">

      <div class="form-row col-lg-12 ">


        <div class="form-label-group col-lg-12">

          <input type="text" class="form-control" id="username" name="username" placeholder="user name" required autofocus>
              <label for="username"  class="fa fa-user">User Name</label>
               <span class="text-danger"><?php echo form_error("username"); ?></span>
        </div>
        <div class=" form-label-group col-lg-12">
             <input type="password" class="form-control" id="password"  name="password" placeholder="Password" required autofocus>
             <label for="password" class="fa fa-key">Password</label>
        </div>
      </div>
    
        <div class="col-lg-4">
          <button type="submit" class="btn btn-info mb-2">Login</button>
        </div>

         <?php echo validation_errors('<p class="text-danger">','</p>')?>
        </form>
    </div>
               <!--  <div class="floating-right col-lg-4">
                   <li> <a class="fa fa-user text-warning" href="<?php echo base_url('Patient_C/PatientDashboard')?>"><i class=""></i>Patient Result</a></li>
                </div>
              </br> -->
    </div>
  </div>

  <script> 
        setTimeout(function() {
            $('#loginform').hide('fast');
        }, 2000);
    </script>


