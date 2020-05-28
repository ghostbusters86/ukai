<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="<?php echo base_url() ?>assets/images/logo.png">

  <title>  Login Sistem  </title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/4.1/examples/floating-labels/floating-labels.css" rel="stylesheet">
</head>
   
<body>
  <form action="<?php echo site_url('index.php/login') ?>" method="post" class="form-signin">
    <div class="text-center mb-4">
      <img class="mb-4" src="<?php echo base_url(); ?>assets/images/head.png" alt="" width="60%">
      <h1 class="h3 mb-3 font-weight-normal">Login Sistem</h1>
      <?php
      if ($this->session->flashdata('notifikasi')) {
        echo "<br>";
        echo "<div class='alert'><center>";
        echo $this->session->flashdata('notifikasi');
        echo "</center></div>";
      }
      ?>
    </div>   

    <div class="form-label-group">
      <input type="text" id="inputEmail" class="form-control" placeholder="Email" required autofocus name="email">
      <label for="inputEmail">Email</label>
    </div>

    <div class="form-label-group">
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
      <label for="inputPassword">Password</label>
    </div>    

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a href="<?php echo site_url('registrasi'); ?>"><p style="text-align: center">daftar akun</p> </a> 
    <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p> -->
  </form>
</body>
</html>
