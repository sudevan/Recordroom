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
          <li class="active">find record</li>
        </ol>
      </section>
	<section class="content">
      <div class="row">
              
      <form action="findrecord.php" method="post">
        
         <div class="col-md-12">
        <div class="col-md-2">
        <div class="form-group">
            <label>Section</label>
              <select name="section" id="cboproduct"   class="form-control"  onchange="load_product_type(),loadcomp()" >
                <option value="0" >Select a section</option>
                <option value="A">A</option>
                <option value="A1">A1</option>
               <option value="B">B</option>
                <option value="C">C</option>
                <option value='C5'>C5</option>
                <option value="D">D</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value='E'>E</option>
                <option value='E1'>E1</option>
                <option value='E2'>E2</option>
              </select>
              
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-3"-->


        <div class="col-md-2">
        <div class="form-group">
            <label>Filenumber</label>
            <input type="text" name="filenumber" id="filenumber" value="" class="form-control" onkeypress="return numeric(event)"/>
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-3"-->


        <div class="col-md-2">
        <div class="form-group">
            <label>subject</label>
            <input type="text" name="subject" id="subject" value="" class="form-control"/>
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-"-->
<div class="col-md-2">
        <div class="form-group">
            <label>person</label>
            <input type="text" name="person" id="person" value="" class="form-control"/>
        </div> <!--div class="form-group"-->
          </div>
        <div class="col-md-2">
        <div class="form-group">
            <label>Tags</label>
            <input type="text" name="tags" id="tags" value="" class="form-control" placeholder="space seperated tags" />
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-3"-->
 <div class="col-md-2">
        <div class="form-group">
            <label>Bundle Number</label>
            <input type="text" name="bundlenumber" id="bundlenumber" value="" class="form-control" placeholder="Enter the bundlenumber" />
        </div> <!--div class="form-group"-->
          </div>

        <div class="col-md-2">
        <div class="form-group">
            <label></label>
            <input type="submit" class="btn btn-block btn-success" name="search" value="Search" style="width:50% "  onclick="uptoallotaddRow('upto2')">
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-3"-->
      </div>
</form>






        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
           
				<?php
         include("connection.php");
         if (isset($_POST['search']))
          {
            echo "<h3 class='box-title'>Search result</h3>";
          $section=$_POST['section'];
          $subject=$_POST['subject'];
          $tags=$_POST['tags'];
          $person=$_POST['person'];
          $filenumber=$_POST['filenumber'];
          $bundlenumber=$_POST['bundlenumber'];

        $exploded=explode(" ",$tags);

        $sql="SELECT id,  filenumber,year,section,date,subject,name,tag,bundlenumber,location from view_loc  where " ;
        
        $conjunction="";
        if(!empty($section))
        {
          $sql=$sql."section='$section'";
          $conjunction=" and ";
          

        }
        if (!empty($filenumber)) {
          $sql=$sql.$conjunction." filenumber='$filenumber'";
          $conjunction=" and ";
         
        }
        if (!empty($subject)) {
          $sql=$sql.$conjunction." subject like '%$subject%'";
          $conjunction=" and ";

        }
        if (!empty($person)) {
          $sql=$sql.$conjunction."name like '%$person%'";

          $conjunction=" and ";
        }
        if (!empty($tags)) {
          $sql=$sql.$conjunction."id in (SELECT recordid from rec_tags where tag in ('".implode("','",$exploded)."'))";
        
           $conjunction=" and ";
        }
        if (!empty($bundlenumber)) {
          $sql=$sql.$conjunction."bundlenumber='$bundlenumber'";
        }
         
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
                    $var='0';
                  foreach($row as $key=>$value)
                  {  
                    if ($fieldarray[$var]==='id' ) {
                    echo "<td><form action='editrecord.php' method='POST'><br><input type='hidden' name='editname' value='".$value."'/><input type='submit'class='btn btn-block btn-success' name='submit-btn' value='edit' /></form></td>";
                    $var++; 
                    continue;
                      }
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

                      echo "</tr>";endl:
                      }
                ?> 
                   </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div></ul></div></div></nav></header>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2016-2019 <a href="https://www.gptcpalakkad.ac.in">che dept</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
</div>
<!-- ./wrapper -->

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
