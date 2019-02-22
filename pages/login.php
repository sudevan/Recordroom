<?php
session_start();
include("connection.php");
	
$message="";
echo "$message";

if(!empty($_POST["login"])) {
  $sql="SELECT * from users where email='".$_POST["user_name"]."' and password='".$_POST["password"]."'";
  $result=$conn->query($sql); 
  $row = $result->fetch_assoc();

	if(is_array($row)) {
  	$_SESSION["user_name"] = $row['email'];
    $_SESSION['usertype']=$row['usertype'];
  	} else {
  	 $message = "Invalid Username or Password!";
  	}
}
if(!empty($_POST["logout"])) {
	$_SESSION["user_name"] = "";
  $_SESSION['usertype']="";
	session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>RECORDROOM</title>   
   <link rel="icon" type="image/jpg" href="icon.jpg" class="img-circle">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<?php if(empty($_SESSION["user_name"])) { ?>
	<div class="login-box">
	  <div class="login-logo">
	    <a href="#"><b>RECORD ROOM</b></a>
	  </div>
	  <!-- /.login-logo -->
	  <div class="login-box-body">
	    <p class="login-box-msg">Sign in to start your session</p>
	
	<div style="display:block;margin:0px auto;">
    <form action="login.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="user_name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" value="Login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="social-auth-links text-center">
      <p>- OR -</p>
         <a href="../index.html" class="btn btn-block btn-social btn-google btn-flat"><i class="fa  fa-home"></i>Home </a>
    </div>
    <!-- /.social-auth-links -->

    <a href="changep.php">change my password</a><br>
    <a href="#" class="text-center">Register a new membership</a>
    </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php 
} else { 
?>
  <div class="login-box-body">
	    <p class="login-box-msg"><i class="fa fa-spin fa-refresh"></i> Redirecting to dashboard</p>
	</div>
<script type="text/javascript">
window.location.assign("homerecord.php"); 
</script>
<?php } ?>
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body></html>