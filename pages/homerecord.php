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
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
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
        </h3>
        <ol class="breadcrumb">
          <li><a href="homerecord.php"><i class="fa fa-spin fa-refresh"></i> Home</a></li>
          <li class="active">record room</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
                        <div class="box box-warning" style="width: 100%; ">
                  <div class="box-body" style="">

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
            <?php
            include("connection.php");
            $sql="SELECT distinct filenumber,year,section,date,subject,name,bundlenumber,location from view_loc order by date desc LIMIT 30";
            $result=$conn->query($sql);

            echo "<thead>";
            echo "<tr>";
            /* get column metadata */
              // Get field information for all fields
                while ($fieldinfo=mysqli_fetch_field($result))
                  {
     
                    echo "<th>$fieldinfo->name</th>";
                    $fieldarray[]=$fieldinfo->name;
                  }

            echo "</tr>";
            echo "</thead>";
            echo " <tbody>";
            
            if ($result->num_rows > 0) {
            
            
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  foreach($row as $key=>$value)
                  {
                    echo "<td>$value</td>";
                  }
                  echo "</tr>";
                }
            } else {
                echo "0 results";
            }
             mysqli_close($conn);
            
               echo" </tbody>";
                echo" <tfoot>";
                     echo "<tr>";
                      /* get column metadata */
                        // Get field information for all fields
                         foreach ($fieldarray as $field){
                           # code...
                        
                            {
               
                              echo "<th>$field</th>";
                            }
                          }

                      echo "</tr>";
                ?>
              </table>
            </div>
          </div></div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div></ul></div></div></nav></header></div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Copyright &copy; 2016-2019 <a href="http://gptcpalakkad.in">che dept.</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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
}
?>  
</body>
</html>
