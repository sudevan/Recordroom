
<?php 
 session_start();
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

 if(!empty($_SESSION["user_name"])) { 

  echo "<h3> <a href = login.php>hello </a> <h3>";
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
            <div class="box-header" style="margin-bottom: 10px">
             <center> <h3><u><b>CREDITS</b></u></h3></center>
               
            </div>
         
       
                  

      
            <!-- /.box-header -->
            <div class="box-body" style="height: 100%">
              
             <div class="col-sm-12">
               
          <div class="col-sm-12">
              <!-- principal -->
              <div class="col-sm-4" >
              
                <div class="col-sm-12">
               <center> <img src="../dist/img/principal.jpg" class="img-circle" style="height: 150px;width: 150px"></center>
               </div>
                <div class="col-sm-12">
                 <center><h3><b>M.CHANDRAKUMAR</b></h3></center>
               </div>
              </div>
              <!-- ss -->
              <div class="col-sm-4">
                <div class="col-sm-12">
               <center> <img src="../dist/img/pradeep.jpg" class="img-circle" style="height: 150px;width: 150px"></center>
               </div>
                <div class="col-sm-12">
                 <center><h3><b>PRADEEP M</b></h3></center>
               </div>
              </div>

              <!-- sudevan -->
              <div class="col-sm-4" >
               
              <div class="col-sm-12">
               <center> <img src="../dist/img/sudevan.jpg" class="img-circle" style="height: 150px;width: 150px"></center>
               </div>
               <div class="col-sm-12">
                 <center><h3><b>SUDEVAN K</b></h3></center>
               </div>
              </div>
              
            </div>
            <div class="col-sm-12">
              <!-- babu -->
              <div class="col-sm-4">
                <div class="col-sm-12">
               <center> <img src="../dist/img/babuvl.jpg" class="img-circle" style="height: 150px;width: 150px"></center>
               </div>
                <div class="col-sm-12">
                 <center><h3><b>BABU VALLANGHY</b></h3></center>
               </div>
              </div>
               <!-- anjana -->
              <div class="col-sm-4">
                <div class="col-sm-12">
               <center> <img src="../dist/img/anjana.jpg" class="img-circle" style="height: 150px;width: 150px"></center>
               </div>
                <div class="col-sm-12">
                 <center><h3><b>ANJANA A</b></h3></center>
               </div>
              </div>
              <!-- sruthi -->
              <div class="col-sm-4">
                <div class="col-sm-12">
               <center> <img src="../dist/img/sruthi.jpg" class="img-circle" style="height: 150px;width: 150px"></center>
               </div>
                <div class="col-sm-12">
                 <center><h3><b>SRUTHI S</b></h3></center>
               </div>
              </div>

              
            </div>
            <div class="col-sm-12">
              <!-- fazi -->
              <div class="col-sm-4">
                
                <div class="col-sm-12">
               <center> <img src="../dist/img/fazi.jpg" class="img-circle" style="height: 150px;width: 150px"></center>
               </div>
              <div class="col-sm-12">
                 <center><h3><b>MUHAMMED FASIL PT</b></h3></center>
               </div>

              </div>
             <!-- shinu -->
              <div class="col-sm-4" >
                
                 <div class="col-sm-12">
               <center> <img src="../dist/img/shinu.jpg" class="img-circle" style="height: 150px;width: 150px"></center>
               </div>

                <div class="col-sm-12">
                 <center><h3><b>SHINU N</b></h3></center>
               </div>
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
