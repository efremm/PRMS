

<div class="container">
             <div class="col-lg-12 " style="background-color: green;">
                     
                 </div>
                     
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
                                         <a class="dropdown-item" href="<?php echo base_url("Admin_C/AdminDashboard")?>"><i class="fa fa-home"></i>Home</a>
                                         
                                          <a class="dropdown-item" href="<?php echo base_url('Authentication/logout')?>"><i class="fa fa-power-off"></i>Logout</a>
                                           <!-- <?php echo form_close() ?> -->
                                           
                                         
                                            </div>
                                </li>
                            </ul>
                          </div>
                         </nav>
                      </div>
                   
    </div>
    <div class="col-lg-12" style="background-color: green">
          <?php if($scsmsg = $this->session->flashdata('successmsg'));?>
                     <?php echo $scsmsg; ?>
                          <?php if($errmsg = $this->session->flashdata('errormsg'));?>
                     <?php echo $errmsg; ?>
                   </div>
       <!-- <?php 
                    if($this->uri->segment(2) == "updated")
                    {
                    
                echo '<p class="text-success">successfully updated</p>'; 
                    }
                    ?> -->
    <div class="container">
        <!-- <section> -->
                <br>
                <!-- <div id="tabsJustifiedContent" class="tab-content"> -->

                    <!-- <div id="home1" class="tab-pane fade active show"> -->
                   <div class="col-lg-12">  
                   <?php echo anchor('Admin_C/creat_users','Add User',['class'=>'btn btn-info']);?>
                  </div>
                     <hr>
                     <div class="container">
                          <table id="tbluser"  name="tbluser" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th >user_id</th>
                                <th >user_name</th>
                                <th >user_password</th>
                                 <th>user_type</th>
                                <th >user_status</th>
                                <th>Update</th>
                                 <th>Delete</th>
                                    </tr>
                            </thead>
                            <tbody>
                              <?php if(count($posts)):?>
                                <?php foreach($posts as $post):?>
                              <tr>
                                <td><?php echo $post->user_id;?></td>
                                <td><?php echo $post->user_name; ?></td>
                                <td><?php echo $post->user_password;?></td>
                                <td><?php echo $post->user_type;?></td>
                                <td><?php echo $post->user_status;?></td>
                               
                              <td> <?php echo anchor("Admin_C/AdminUserView/{$post->user_id}",'<span class="fa fa-edit"></span>',['class'=>'btn btn-info']);?></td>
                                 <td> <a class="delete_data btn btn-danger" href="#" id="<?php echo $post->user_id; ?>"><span class="fa fa-trash"></span></a> </td>
                 
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
        
    <!-- </section>  -->
      

    </div>

  
              <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
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
            var userdata=$(this).attr("id");
            if(confirm("Are you sure you want to delete this"))
                {
                   window.location="<?php echo base_url(); ?>Admin_C/delete_user_c/"+userdata;
                }     
                else
                {
                  return false;
                }  
              });
             }); 

           </script>
        