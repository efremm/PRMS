
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
     
      <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap4/css/bootstrap.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/DataTable/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/DataTable/css/dataTables.bootstrap4.css'?>">
    
      <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/sidemenu/bootstrap/css/bootstrap.css'?>">


        <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
       
        
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
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
             <li><a  href="<?php echo base_url('Pharmacist_C/PharmacistDashboard')?>"> <i class="fa fa-home"></i>Home  </a></li>
          <li> <a class="fa fa-user" href="<?php echo base_url('Pharmacist_C/PateintMedicine')?>"><i class=""></i>Patient Medicine</a></li>  
           <!--  <li> <a class="fa fa-user" href="<?php echo base_url('Pharmacist_C/MedicineDetail')?>"><i class=""></i>Detail Medicine</a></li>   -->
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
                  <div class="brand-text d-none d-md-inline-block"><span>Patient</span><strong class="text-primary"> Record Managment  System</strong></div></a></div>
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
                                        <!--  <a class="dropdown-item" href="<?php echo base_url('Admin_C/Help')?>"><i class="fa fa-user"></i>Help</a> -->
                                         
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
        <div class="container-fluid">
          <div class="row">
            <!-- body-->
                     <div class="col-lg-12" style="background-color: green">
                <?php if($scsmsg = $this->session->flashdata('successmsg'));?>
                     <?php echo $scsmsg; ?>
                          <?php if($errmsg = $this->session->flashdata('errormsg'));?>
                     <?php echo $errmsg; ?>
                   </div>
                   <div class="col-lg-12" style="background-color: orange">  
                 Grant Patient Medicine Which is given by Doctors
                  </div>
     
            <div class="container">
                  <!-- <div class="col-lg-12">  
                   <?php echo anchor('Doctor_C/PatientReg','Add Patient',['class'=>'btn btn-info']);?>
                  </div> -->
                   
                     <hr>
                     <div class="container">
                          <table id="tbluser"  name="tbluser" class="table table-responsive table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                 <th >patient_seq_id</th>
                                <th >Patient_ID</th>
                                    <th >patient_case</th>
                                 <th>patient_detail_case</th>
                                 <th class="bg-info">medication_type</th>
                                 <th class="bg-info">checkup_time</th>
                                <th class="bg-info">ckecked_by</th>
                                <th class="bg-info">pharmacist_approval</th>
                                 <th class="bg-info">pharmacist_approval_date</th>
                                 <th class="bg-info">medicine_status</th>
                                 <!--  <th class="bg-info">pharmacist_approval</th>
                                 <th class="bg-info">medicine_status</th> -->
                                   <th class="bg-warning">Edit</th>
                                 <!-- <th >Delete</th> -->
                                    </tr>
                            </thead>
                            <tbody>
                              <?php if(count($posts)):?>
                                <?php foreach($posts as $post):?>
                              <tr>
                                  <td><?php echo $post->patient_seq_id;?></td>
                                <td><?php echo $post->patient_ID;?></td>
                                <!--  <td><?php echo $post->first_name ."  ".$post->middle_name ."  ".$post->last_name;?></td> -->
                                <td><?php echo $post->patient_case;?></td>
                                <td><?php echo $post->patient_detail_case;?></td>
                                <td class="bg-info text-danger"><?php echo $post->medication_type;?></td>
                                <td class="text-success"><?php echo $post->checkup_time;?></td>
                                <td class="text-danger"><?php echo $post->ckecked_by;?></td>
                                 <td class="text-warning"><?php echo $post->pharmacist_approval;?></td>
                                <td class="text-warning"><?php echo $post->pharmacist_approval_date;?></td>
                               <td class="text-success"><?php echo $post->medicine_status;?></td>
                                <!--  <td class="text-warning"><?php echo $post->pharmacist_approval;?></td>
                               <td class="text-success"><?php echo $post->medicine_status;?></td> -->
                           
                                <td> <a class=" btn btn-warning" href="<?php echo base_url("Pharmacist_C/patient_detail_fetch/{$post->patient_seq_id}")?>">
                                          <span class="fa fa-edit"></span>
                                          </a> </td>    
                                 <!-- <td> <a class="delete_data btn btn-danger" href="#" id="<?php echo $post->patient_seq_id; ?>"><span class="fa fa-trash"></span></a> </td> -->
                 
                              </tr>
                            <?php endforeach;?>
                            <?php else: ?>
                              <tr>
                                <td>No Records Found!</td>
                              </tr>
                            <?php endif;?>
                            </tbody>
                          </table> 
                     </div>
                   </div>

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

    <!-- <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script> -->
<script type="text/javascript" src="<?php echo base_url().'assets/bootstrap4/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/DataTable/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/DataTable/js/dataTables.bootstrap4.js'?>"></script>

        <script>
            $('input[data-type="date"]').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        </script>

        <script type="text/javascript">
            $(document).ready(function() {
           $('#tbluser').DataTable();
               } );
             </script>
  <script type="text/javascript">
       $(document).ready(function() {
          $('.delete_data').click(function()
           {
            var vehicledata=$(this).attr("id");
            if(confirm("Are you sure you want to delete this"))
                {
                   window.location="<?php echo base_url(); ?>Reception_C/delete_patient_c/"+vehicledata;
                }     
                else
                {
                  return false;
                }  
              });
             }); 

           </script>
       
 

  </body>
</html>