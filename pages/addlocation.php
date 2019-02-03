<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    
  </style>
</head>
<body class="hold-transition skin-blue layout-top-nav">
  <?php

 if(empty($_SESSION["user_name"])) { 

  echo "<h3> <a href = login.php>Click here to login </a> <h3>";
}
else
{
?>
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="" class="navbar-brand"><b>RECORD ROOM</b></a>
           
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="addrecord.php"><i class="fa fa-folder-o"></i>Add Record</a></li>
            <li><a href="findrecord.php"><i class="fa fa-folder-o"></i>Find Record</a></li>
             <li ><a href="addlocation.php"><i class="fa fa-folder-o"></i>Add Location</a></li>
           
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
              <li>
            <form action="login.php" method="post" id="frmLogout">
        <input type="submit" name="logout" value="Logout" class="btn btn-block btn-success" style="margin-top: 10px;">
        </form>
        </li>

        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h3>
          RECORD ROOM
          <small>;)</small>
        </h3>
        <ol class="breadcrumb">
          <li><a href="homerecord.php"><i class="fa fa-spin fa-refresh"></i> Home</a></li>
          <li class="active">add location</li>
        </ol>
      </section>
<form enctype="multipart/form-data" action="excelUpload.php" method="post" style="padding-left: 60px;">

            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

              <table width="600">
                <tr>
                <td>drop excel file here :</td>
                <td><input type="file" name="file" accept=".xls ,.ods,.xlsx"  /></td>
                <td><input type="submit"class="btn btn-block btn-success" name="upload" value="Upload" /></td>
                </tr>
              </table>

            </form><br><br>
      <form method="post" action="addlocation.php">
        <div class="form-data">
        <div class="form-group">
                  <label>Bundle number</label>
                  <input type="text" name="bundlenumber" class="form-control" placeholder="Enter the bundlenumber" style="width:250px;">
                </div>
                        <div class="form-group">
                  <label>location</label>
                  <input type="text" name="location" class="form-control" placeholder="Enter the location" style="width:250px;">
                </div>
                <div class="form-group">
               <input type="submit"class="btn btn-block btn-success" name="save" value="save" style="width:10%; " />
                            <input type="submit"class="btn btn-primary btn-block btn-flat"style="width:10%; "value="cancel" name="cancel">
</div>
               <img src="../back3.jpg" style="position: absolute; width: 45%;left:50%;top:35%;">
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

              if (isset($_POST['cancel'])) {
                echo"<b>cancelled<b>";
              }

         ?></div>
     </form>
    
    <!-- Main content -->
  <!--div class="col-md-3"-->
      </div>
     
      </div><!-- <div class="row"> -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2016-2019 <a href="https://www.gptcpalakkad.ac.in">che dept</a>.</strong> All rights
    reserved.
  </footer>


<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<?php
//clossiing else of isset session
}
?>
</body>
</html>
