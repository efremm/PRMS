<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dynamic Dropdown Menu using Bootstrap 4 in CodeIgniter</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap4/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  	<a class="navbar-brand" href="#">SourceCodeSter</a>
  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
 
  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    	<ul class="navbar-nav mr-auto">
      		<li class="nav-item dropdown">
        		<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          		Category
        		</a>
	        	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	        		
	        					<a class='dropdown-item' href='#'>"name."</a>
	        	
	        	</div>
      		</li>
    	</ul>
  	</div>
</nav>
 
<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap4/js/bootstrap.min.js"></script>

</body>
</html>