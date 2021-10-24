<div class="container">
           
   
                  <div class="float-right">
                         <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                                         <a class="dropdown-item" href="<?php echo base_url('Admin_C/AdminDashboard')?>"><i class="fa fa-home"></i>Home</a>
                                         
                                          <a class="dropdown-item" href="<?php echo base_url('Authentication/logout')?>"><i class="fa fa-power-off"></i>Logout</a>
                                           <!-- <?php echo form_close() ?> -->
                                           
                                         
                                            </div>
                                </li>
                            </ul>
                          </div>
                         </nav>
                      </div>
                   
    </div>
<div class="container">
    <div class="row">
 <form   method="post" action="<?php echo base_url()?>Admin_C/update_user">
    <h2 class="">Edit User Registration</h2>
    <hr>
     <?php 
                   if(isset($fetch_data))
                       {
                         foreach ($fetch_data as $row) 
                         {
                             
                            ?> 
          <div class="form-group">
          	<!-- <lable>user id</lable> -->
        <i class="fa fa-user icon"></i>
        <input  type="text" placeholder="userid" name="userid" value="<?php echo $row->user_id; ?>" required>
         <span class="text-danger"><?php echo form_error("userid"); ?></span>
    </div>

   <div class="form-group">
        <i class="fa fa-user icon"></i>
        <input  type="text" placeholder="empid" name="empid" value="<?php echo $row->emp_id; ?>">
         <span class="text-danger"><?php echo form_error("empid"); ?></span>
    </div>

    <div class="form-group">
    	<!-- <lable>user name</lable> -->
        <i class="fa fa-user icon"></i>
        <input  type="text" placeholder="Username" name="username" value="<?php echo $row->user_name; ?>" >
         <span class="text-danger"><?php echo form_error("username"); ?></span>
    </div>

    <div class="form-group">
    	<!-- <lable>email</lable> -->
        <i class="fa fa-envelope icon"></i>
        <input  type="text" placeholder="Email" name="email" value="<?php echo $row->email; ?>" required >
         <span class="text-danger"><?php echo form_error("email"); ?></span> 
    </div>

    <div class="form-group">
    	<!-- <lable>password</lable> -->
        <i class="fa fa-key icon"></i>
        <input type="password" placeholder="Password" name="password" value="<?php echo $row->user_password; ?>" required>
         <span class="text-danger"><?php echo form_error("password"); ?></span> 
    </div>

     
     <div class="form-group ">
     	             <!-- <lable>user status</lable> -->
                        <i class="fa 2xfa fa-user icon"></i>
                        <select class="form-group col-lg-6" id="usertype" name="usertype">
                        	 <option value="<?php echo $row->user_type; ?>"><?php echo $row->user_type; ?></option>
                            <option value="">-select usertype-</option>
                            <option value="admin">admin</option>
                            <option value="librarian">librarian</option>
                             <option value="doctor">doctor</option>
                            <option value="oprational">oprational</option>
                        </select>
                         <span class="text-danger"><?php echo form_error("repassword"); ?></span> 
          </div>
           <div class="form-group">
           	<!-- <lable>user id</lable> -->
                        <i class="fa 2xfa fa-user icon"></i>
                        <select class="form-group col-lg-6" id="userstatus" name="userstatus">
                        	 <option value="<?php echo $row->user_status; ?>"><?php echo $row->user_status; ?></option>
                            <option value="">-select userstatus-</option>
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                            
                        </select>
                         <span class="text-danger"><?php echo form_error("repassword"); ?></span> 
          </div>
    
     
                            <div class="form-group col-lg-12">
                         <input type="hidden" name="hidden_id" value="<?php  echo $row->user_id;?>" required>
                        <input type="submit" value="Update" class="btn btn-info" name="update"/>

                            <?php echo anchor('Admin_C/ManageUsers','Back',['class'=>'btn btn-defualt']);?>
                               
                          </div>
                     <?php }
                       }
                        ?> 
</form>
</div>
</div>
      <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap4/js/bootstrap.min.js"></script>

   <script type="text/javascript" src="<?php echo base_url().'assets/DropDown/1.12.4.ajax/jquery-.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/DropDown/2.15.1.ajaxjs/moment.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/DropDown/4.7.14.ajaxjs/bootstrap-datetimepicker.min.js'?>"></script>
 <link rel="stylesheet" href="<?php echo base_url().'assets/DropDown/4.7.14css/bootstrap-datetimepicker.min.css'?>"> 

        <script>
            $('input[data-type="date"]').datetimepicker({
                format: 'YYYY-MM-DD'
            });

        </script>

        <script type="text/javascript">
            $(document).ready(function() {
           $('#tblcamera').DataTable();
               } );
             </script>