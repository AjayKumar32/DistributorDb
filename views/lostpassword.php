<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/build/images/adesto-logo.png" />

    <title>Adesto</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="post" action="<?php echo base_url(); ?>/welcome/sent_password">
              <h1>Request Password</h1>
              <br />
              <?php if(!is_null($msg)) echo $msg;?>  
              <div>
                <input type="text" class="form-control" placeholder="Username/email" name="username" id="username" required>
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" value="Send">
                <a class="reset_pass" href="<?php echo base_url(); ?>/welcome">Login?</a>
              </div>

              <div class="clearfix"></div>

              
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
