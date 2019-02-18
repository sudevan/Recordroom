
<?php 
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Profile</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <?php

 if(empty($_SESSION["user_name"])) { 

  echo "<h3> <a href = login.php>Click here to login </a> <h3>";
}
else
{
?>
<?php
 include("include.php");
 ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
           
             <div class="box"  style="border-top: 3px solid #00c0ef;">
            <div class="box-header">
              <h3 class="box-title">Contact us..!</h3>
               
            </div>
         
       
                  

      
            <!-- /.box-header -->
            <div class="box-body" style="height: 100%">
               
                <div class="col-sm-12" style=" margin-top: 50px">

                  <div class="col-sm-4" style="border-right: 2px solid #367fa9;border-left: 2px solid #367fa9">
                     <div class="col-sm-12"><center><img src="../dist/img/fazi.jpg" style="height: 180px; width: 180px" class="img-circle" alt="User Image"></center></div>
                       <div class="col-sm-12"><h3><center><label>MUHAMMED FASIL PT</label></center></h3></div>
                       <div name="details" class="col-sm-12">
                         <div class="col-sm-3"><h4><i class="fa fa-envelope"></i></h4></div><div class="col-sm-8"><h4><a href="#" >ptfasil786@gmail.com</a></h4></div> 
                          <div class="col-sm-3"><h4><i class="fa fa-phone"></i></h4></div><div class="col-sm-8"><h4><a href="#" >+91 81569 40210</a></h4></div>
                             <div class="col-sm-3"><h4><i class="fa fa-facebook"></i></h4></div><div class="col-sm-8"><h4><a href="https://www.facebook.com/fasil.pt.71" >@muhammedfasil</a></h4></div>
                       </div>

                  </div>

                  <div class="col-sm-4" style="border-right: 2px solid #367fa9">
                     <div class="col-sm-12"><center><img src="../dist/img/use.jpg" style="height: 180px; width: 180px" class="img-circle" alt="User Image"></center></div>
                       <div class="col-sm-12"><h3><center><label>SHINU N</label></center></h3></div>
                       <div name="details" class="col-sm-12">
                           <div class="col-sm-3"><h4><i class="fa fa-envelope"></i></h4></div><div class="col-sm-8"><h4><a href="#" >shinun@gmail.com</a></h4></div>
                             <div class="col-sm-3"><h4><i class="fa fa-phone"></i></h4></div><div class="col-sm-8"><h4><a href="#" >+91 98089 08209</a></h4></div>
                              <div class="col-sm-3"><h4><i class="fa fa-facebook"></i></h4></div><div class="col-sm-8"><h4><a href="https://www.facebook.com/profile.php?id=100008398609448" >@shinunandakumar</a></h4></div>                       </div>
                  </div>

                  <div class="col-sm-4" style="border-right: 2px solid #367fa9">
                    <div class="col-sm-12"><center><img src="../dist/img/sudevan.jpg" style="height: 180px; width: 180px" class="img-circle" alt="User Image"></center></div>
                       <div class="col-sm-12"><h3><center><label>SUDEVAN K</label></center></h3></div>
                       <div name="details" class="col-sm-12">
                      <div class="col-sm-3"><h4><i class="fa fa-envelope"></i></h4></div><div class="col-sm-8"><h4><a href="#" >sudevank@gmail.com</a></h4></div>
                             <div class="col-sm-3"><h4><i class="fa fa-phone"></i></h4></div><div class="col-sm-8"><h4><a href="#" >+91 72006 68804</a></h4></div>
                         <div class="col-sm-3"><h4><i class="fa fa-facebook"></i></h4></div><div class="col-sm-8"><h4><a href="https://www.facebook.com/sudevank" >@sudevank</a></h4></div>
                       </div>
                  </div>
                  



                </div>
            
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
         <?php
    include("footer.php");
    ?>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>                         
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<?php
//clossiing else of isset session
}
?>
</body>
</html>
