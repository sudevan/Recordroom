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
<body class="hold-transition skin-blue layout-top-nav" style="background-color: black;">
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
          <li class="active">add record</li>
        </ol>
      </section>
         <form enctype="multipart/form-data" action="excelread.php" method="post" style="padding-left: 60px;">

            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

              <table width="600">
                <tr>
                <td>drop excel file here :</td>
                <td><input type="file" name="file" accept=".xls ,.ods,.xlsx"  /></td>
                <td><input type="submit"class="btn btn-block btn-success" value="Upload" /></td>
                </tr>
              </table>

            </form><br><br>
            <div class="box box-warning" style="padding-left: 60px;">
                  <div class="box-body">
            <form action="addrecord.php" role="form" method="post" >
                <!-- text input -->
                
                  <div class="form-group">
                  <label>File number</label>
                  <input type="text" name="filenumber" class="form-control" placeholder="Enter the filenumber" style="width:400px;">
                </div>    
                                <div class="form-group">
                  <label>Year</label>
                  <input type="text" name="year" class="form-control" placeholder="Enter the year" style="width:400px;">
                </div>
                      <div class="form-group">
            <label>Section</label>
              <select name="section" id="cboproduct"   class="form-control"  onchange="load_product_type(),loadcomp()" style="width:400px;" >
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
              
        </div>

                <!-- textarea -->
                <div class="form-group">
                  <label>tags</label>
                  <textarea class="form-control" name="tags" rows="2" placeholder="Enter the space seperated tag"  style="width:400px;"></textarea>
                </div>
                <div class="form-group">
                  <label>Subject</label>
                  <input type="text" name="subject" class="form-control" placeholder="Enter the subject" style="width:400px;">
                </div>
                <div class="form-group">
                  <label>person name</label>
                  <input type="text" name="personname" class="form-control" placeholder="Enter the person name" style="width:400px;">
                </div>
                <div class="form-group">
                  <label>pages</label>
                  <input type="text" name="pages" class="form-control" placeholder="Enter the pages" style="width:400px;">
                </div>
                <div class="form-group">
                  <label>category</label>
                  <input type="text" name="category" class="form-control" placeholder="Enter the category" style="width:400px;">
                </div>
                <div class="form-group">
                  <label>date</label>
                  <input type="text" name="date" class="form-control" placeholder="Enter date" style="width:400px;">
                </div>
                <div class="form-group">
                  <label>Entered by</label>
                  <input type="text" name="enteredby" class="form-control" placeholder="Enter your name" style="width:400px;">
                </div>
                <div class="form-group">
                  <label>bundlenumber</label>
                  <input type="text" name="bundlenumber" class="form-control" placeholder="Enter your bundlenumber" style="width:400px;">
                </div>
               
               <input type="submit" class="btn btn-block btn-success" name="save" value="save record"style="width:10%; ">
               <input type="submit"class="btn btn-primary btn-block btn-flat"style="width:10%; "value="cancel" name="cancel">
          </div>
      <?php
                  include("connection.php");
                  if (isset($_POST['save']))
                   {
                    $filenumber=$_POST['filenumber'];
                    $year=$_POST['year'];
                    $section=$_POST['section'];
                    $tags=$_POST['tags'];
                    $subject=$_POST['subject'];
                    $person=$_POST['personname'];
                    $pages=$_POST['pages'];
                    $category=$_POST['category'];
                    $date=$_POST['date'];
                    $enteredby=$_POST['enteredby'];
                    $bundlenumber=$_POST['bundlenumber'];

 function getPersonid($person)
  {
        //echo "$personame <br>";
    global $conn;
     
    $tablename = "rec_person";
    $sql="SELECT id from $tablename where name='$person'";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    if(is_array($row)) {
      return $row['id'];
    }
    else
    {
      // no such  person in db. insert and get the id
      $sql1="INSERT into $tablename(name) values('$person')";
      $result=$conn->query($sql1);
      //using previous query
      $result=$conn->query($sql);
      $row = $result->fetch_assoc();
      return $row['id'];
    }
    return 1;

  }
     if($person!= '' )
    {
      $personid =  getPersonid($person); // calling function to get person id
    }
    else
    {
      $personid=0;
    }

                    if ($filenumber!='' && $year!='' && $category!='' && $section!='' && $tags!='' && $subject!='' && $pages!='' && $date!='' && $enteredby!='' ) {
                      $sql="INSERT into rec_record_master (filenumber,year,section,subject,pages,category,ddate,enteredby,personid) values('$filenumber','$year','$section','$subject','$pages','$category','$date','$enteredby','$personid')";
                      //$sql.="INSERT into rec_bundle_record values ('$fileid','$bundlenumber')";
                     $result=mysqli_query($conn,$sql);
                          if ($result) {
                        
                              $sql="SELECT LAST_INSERT_ID() as id";
                              $result=$conn->query($sql);
                              $row = $result->fetch_assoc();
                              $id=$row['id'];
                              $sql = "INSERT INTO rec_bundle_record(bundlenumber,recordid) values ($bundlenumber,$id)";
                              $result=$conn->query($sql);
                              if($result)
                              {
                               $tagarray = preg_split('/\s+/', $tags);

                              foreach ($tagarray as $tag) {
                                $sql = "INSERT INTO rec_tags(recordid,tag) values('$id','$tag')";
                                $result=$conn->query($sql);
                                      }
                                if ($result) {
                                   echo "<script> alert('successfully inserting data ');</script>";
                                  }
                                  else{ echo "<script> alert('error inserting    data  ');</script>";}
                               }

                              }
               
                 }
              else{
                      echo "<script> alert('all fields are mandatory');</script>";

                    }
             }
                 
                    
                  ?>
              <?php
              if (isset($_POST['cancel'])) {
                echo"<b>cancelled<b>";
              }
              ?>
               

              </form>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
         <!-- /.control-sidebar-menu -->

        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
   
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
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
