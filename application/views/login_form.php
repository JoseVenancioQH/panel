<html>

<?php

    if(isset($this->session->userdata['logged_in'])) {
     //var_dump(load_class('Config')->config['base_url']);
      //exit;
      header("location: ".load_class('Config')->config['base_url']."/User_Authentication/user_login_process");
    }
?>

<head>
  <style>

    .error_msg{
        color: #ce0f0f;
        font-weight: bold;
        font-style: normal;
        text-align: center;
    }

    body, html {
      height: 100%;
      margin: 0;
      font: 400 15px/1.8 "Lato", sans-serif;
      color: #777;
    }

    .bgimg-1, .bgimg-2, .bgimg-3 {
      position: relative;
      
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .bgimg-1 {
      background-image: url("<?php echo load_class('Config')->config['base_url'];//base_url(); ?>css/img/img_parallax.jpg");
      height: 100%;
    }

    .caption {
      position: absolute;
      left: 0;
      top: 50%;
      width: 100%;
      text-align: center;
      color: #000;
    }

    .caption span.border {
      background-color: #111;
      color: #fff;
      padding: 18px;
      font-size: 25px;
      letter-spacing: 10px;
    }

    h3 {
      letter-spacing: 5px;
      text-transform: uppercase;
      font: 20px "Lato", sans-serif;
      color: #111;
    }

  </style>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Control Placas | Acceso</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo load_class('Config')->config['base_url'];//base_url(); ?>/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo load_class('Config')->config['base_url'];//base_url(); ?>/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo load_class('Config')->config['base_url'];//base_url(); ?>/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo load_class('Config')->config['base_url'];//base_url(); ?>/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo load_class('Config')->config['base_url'];//base_url(); ?>/css/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition bgimg-1" scroll="no" style="overflow: hidden">

<?php
  if (isset($logout_message)) {
      echo "<div class='message'>";
      echo $logout_message;
      echo "</div>";
  }
?>
<?php
  if (isset($message_display)) {
      echo "<div class='message'>";
      echo $message_display;
      echo "</div>";
  }
?>

<div class="login-box-body" style="cursor:pointer; cursor: hand;">
  <a class="glyphicon glyphicon-info-sign" data-toggle="modal" data-target="#modal-ver-ayuda"><b >Ayuda</a>
</div>

<div class="login-box">
 
  <div class="login-logo">
   
      <div class="login-box-body">
        <a href="<?php echo load_class('Config')->config['base_url'];//base_url() ?>User_Authentication"><b >Control Placas</a>
      </div>

  </div>
  
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresa los datos para comenzar tu sesión</p>

    <?php echo form_open('User_Authentication/user_login_process'); ?>
    <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
            echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
    ?>

    <!--<form action="<?php echo load_class('Config')->config['base_url'];//base_url() ?>index.php/user_authentication/user_registration_show" method="post">-->
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Nombre de Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
          <!--<div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Recordar Contraseña
              </label>
            </div>
          </div>-->
          <!-- /.col -->
          <div class="col-xs-4">
            <input type="submit" class="btn btn-primary btn-block btn-flat" value="Acceso " name="submit"/><br />

            <a href="<?php echo load_class('Config')->config['base_url'];//base_url() ?>/User_Authentication/user_registration_show"></a>

            <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Acceso<a href="<?php echo load_class('Config')->config['base_url'];//base_url() ?>index.php/user_authentication/user_registration_show"></a></button>-->

            <?php echo form_close(); ?>
        </div>
        <!-- /.col -->
      </div>
    <!--</form>-->

    <!--<div class="social-auth-links text-center">
      <p>- Ó -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Iniciar Sessión FaceBook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Iniciar Sessión Google+</a>
    </div>-->
    <!-- /.social-auth-links -->        

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<div class="modal fade" id="modal-ver-ayuda">
  <div class="modal-dialog" style="width:95%;">
    <div class="modal-content" style="height:85%;">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titleform">Ayuda - Inicio</h4>
      </div>

      <iframe style="width:100%; height:100%;" src="<?php echo load_class('Config')->config['base_url'];//base_url() ?>ayuda/Inicio%20-%20Control%20Placas/Inicio%20-%20Control%20Placas.html"></iframe>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->      

<!-- jQuery 3 -->
<script src="<?php echo load_class('Config')->config['base_url'];//base_url(); ?>/jquery/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo load_class('Config')->config['base_url'];//base_url(); ?>/jquery/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo load_class('Config')->config['base_url'];//base_url(); ?>/jquery/icheck.min.js"></script>

<script>
  $(function () {
    /*$('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });*/
  });
</script>

</body>