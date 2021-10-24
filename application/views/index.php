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
      <link rel="icon" href="<?php echo base_url(); ?>images/logo2.ico" type="image/x-icon"/>
        <title><?php echo $system_name; ?></title>
  </head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register"> 
  <div class="login-box">
    <div class="white-box" style="border:2px solid green"> 

               <div align="center"> 
			   
				<img  width="100" height="100" src="<?php echo base_url(); ?>optimum/logo.png">
                    <br><br>
					Welcome to<br> <strong style="color:green">DLMS</strong>. Digital Library  Record Managment  System.
                <div align="center">
                       <?php if (isset($page) && $page == "logout"): ?>
                    <div class="alert alert-success hide_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> Logout Successfully &nbsp;
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
               	 	<?php endif ?>
                    </div>
		<br><br>
						<form class="form-horizontal form-material" id="login-form" action="<?php echo base_url('auth/log'); ?>" method="post"> 

					<div class="form-group">
                                   
                                    <div class="col-xs-12">
                            <input class="form-control" type="email" name="user_name" value="efrem@admin.com" required="" placeholder="Email Address" style="width:100%">
                                    </div>
                                </div>
       <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" value="1234" required="" placeholder="Password" style="width:100%">
                        </div>
                    </div>
                   
    
	 <!-- CSRF token -->
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
		  
<button class="btn btn-info style1 btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" style="width:100%; color:white">
Login
</button>
<div align="center"><img id="install_progress" src="<?php echo base_url() ?>optimum/images/loading.gif" style="margin-left: 20px;  display: none"/></div>

                        </div>
						<br><br>
                    </div>
					
                 </form>
        			
            </div>
        </div>
		
		
		
		

    </section>
	

<!-- jQuery -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>

<!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>optimum/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>optimum/js/custom.js"></script>
	

	
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
 
 <!-- auto hide message div-->
    <script type="text/javascript">
        $( document ).ready(function(){
           $('.hide_msg').delay(2000).slideUp();
        });
    </script>
	
<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>optimum/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>

<script>
    $('form').submit(function (e) 
	{
        $('#install_progress').show();
        $('#modal_1').show();
        $('.btn').val('Login...');
        $('form').submit();
        e.preventDefault();
    });
	
</script>


</body>

</html>
