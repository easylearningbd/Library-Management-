<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <title>Library Management</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>lib/font-awesome/css/font-awesome.css">

    <script src="<?php echo base_url(); ?>lib/jquery-1.11.1.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/theme.css"/>
</head>
<body class=" theme-blue">
  
    <div class="navbar navbar-default loginnav">
        Library Management
     </div>

    

   <div class="dialog loginform">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Sign In</p>
       <div class="panel-body">
           <?php
           $msg =  $this->session->flashdata('msg');
           if (isset($msg)) {
              echo $msg;
           }
                    ?>


            <form action="<?php echo base_url(); ?>user/loginForm" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control span12" required="1">
                </div>
                <div class="form-group">
                <label>Password</label>
                    <input type="password" name="pass" class="form-controlspan12 form-control" required="1">
                </div>
				
				<div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>

                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>

    <script src="<?php echo base_url(); ?>lib/bootstrap/js/bootstrap.js"></script>

 <div class="footenote">
 <h2>easy learning </h2>
 </div> 
</body></html>
