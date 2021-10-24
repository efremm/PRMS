
<?php 
$system_name = $this->db->get_where('PRMS_global_data', array('type' => 'SystemName'))->row()->remark;
$system_title = $this->db->get_where('PRMS_global_data', array('type' => 'SystemTitle'))->row()->remark;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <title>DLMS</title> -->


    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/bootstrap4/css/bootstrap.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/DataTable/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/DataTable/css/dataTables.bootstrap4.css'?>">
   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/fontawesome-free-5.6.3-web/css/all.css'?>">

       <!-- <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"> -->



     <link rel="icon" href="<?php echo base_url(); ?>images/logo2.ico" type="image/x-icon"/>
        <title><?php echo $system_name; ?></title>


</head>
<body>
<div class="container">

       <div class="row">
              <img src="<?php echo base_url('/images/header.jpg'); ?> "  class="img-fluid" style="padding-top:0.5rem; padding-left:0.5rem;
                width:100%;height: 100px;" >
        </div>
