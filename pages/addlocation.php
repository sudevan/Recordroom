
<?php 
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RECORDROOM</title>
    <link rel="icon" type="image/jpg" href="icon.jpeg" class="img-circle">

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
           
         
       
                  

      
            <!-- /.box-header -->
            <div class="box-body">
               




                   <!-- excel form here -->
                  















            
           











                       <!-- main form here -->
<div id="addform">
                                              <div class="col-sm-12">
                                                     <div class="box-header col-sm-4">
                                                                  <h3>Add Location</h3>
                                                                   
                                                                </div>
                                                      <div class="col-sm-6" style="margin-top: 20px; margin-left: 30px">
                                                      <button class="btn btn-primary" onclick="document.getElementById('exelform').style.display='block'; document.getElementById('addform').style.display='none'">Bulk Add</button></div>

                                            </div>




                                                                   <form method="post" action="addlocation.php">
                                                    <div class="col-sm-12">
                                                      <div class="col-sm-6">
                                                    <div class="form-group">
                                                              <label>Bundle number</label>
                                                              <input type="text" name="bundlenumber" class="form-control" placeholder="Enter the bundlenumber">
                                                            </div>
                                                          </div>
                                            </div>
                                                              


                                            <div class="col-sm-12">
                                                      <div class="col-sm-6">

                                                              <div class="form-group">
                                                              <label>location</label>
                                                              <input type="text" name="location" class="form-control" placeholder="Enter the location" >
                                                            </div>
                                                          </div>

                                                        <div class="col-sm-8" style="margin-top: 10px">
                                                      <div class="col-sm-4">
                                                            <div class="form-group">
                                                           <input type="submit"class="btn btn-block btn-success" name="save" value="save" />
                                                         </div></div>


                                                  <div class="col-sm-1"></div>
                                                      <div class="col-sm-4">
                                                     
                                                                        <input type="button"class="btn btn-danger btn-block btn-flat"value="cancel" name="cancel" onclick="window.location.href='homerecord.php'">
                                            </div></div>
                                                            <?php
                                                           
                                                            include("connection.php");
                                                             if (isset($_POST['save'])) 
                                                             {
                                                            $bundlenumber=$_POST['bundlenumber'];
                                                            $location=$_POST['location'];
                                                            $sql="INSERT into rec_location_master values ('$bundlenumber','$location')";
                                                            $result=$conn->query($sql);
                                                             if ($result) {
                                                          echo "<script>alert('successfully inserted data')</script>";
                                                             }else{echo "<script>alert('oops something went wrong !!!!')</script>";}
                                                            }

                                                         

                                                     ?></div>
                                                 </form>
   </div>



 <div id="exelform" style="display: none;">
  <div class="col-sm-12">
         <div class="box-header col-sm-4">
                      <h3></h3>
                       
                    </div>
          <div class="col-sm-6" style="margin-top: 20px; margin-left: 30px">
          <button class="btn btn-primary" onclick="document.getElementById('addform').style.display='block'; document.getElementById('exelform').style.display='none'">Single Add</button></div>

</div><div class="col-sm-12">
                            <form enctype="multipart/form-data" action="excelUpload.php" method="post">

                            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

                             
                               <div class="col-sm-6 "><label for="xl"> drop excel file here :</label>
                               <input type="file" class="form-control" id="xl" name="file" accept=".xls ,.ods,.xlsx"  />
                                </div>









                                <div class="col-sm-8" style="margin-top: 20px">
                                <div class="col-sm-4">
                                <div class="form-group">

                                   <input type="submit"class="btn btn-block btn-success" name="upload" value="Upload" /></div></div>



                                <div class="col-sm-4">
                                  <div class="form-group">
                                <input type="button"class="btn btn-block btn-danger" name="cancel" value="Cancel" onclick="window.location.reload();" /></div></div></div>
                            

                            </form>
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
