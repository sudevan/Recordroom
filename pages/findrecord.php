<?php 
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AddRecord</title>
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
include("connection.php");
 include("include.php");
 ?>
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
           
             <div class="box"  style="border-top: 3px solid #00c0ef;overflow:scroll;height:80vh" >
            
         
       
                  

      
            <!-- /.box-header -->
            <div class="box-body">
               




                   <!-- excel form here -->
                       <div id="search">
                        <div class="box-header">
              <h3 class="box-title">Find Record</h3>
               
            </div>
                    

   <form action="findrecord.php" method="post">
        
         <div class="col-md-12">
        <div class="col-md-4">
        <!-- <div class="form-group"> -->
            <label>Section</label>
              <select name="section" id="cboproduct"   class="form-control"  onchange="load_product_type(),loadcomp()" >
                <option value="0" >Select a section</option>
<?php 
$sql="SELECT distinct section from view_loc";
$result=$conn->query($sql); if ($result->num_rows > 0) {
            
            
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  foreach($row as $key=>$value)
                  {  
                     
                echo "<option value='$value' >$value</option>";
                     }
                  
                }
              }
 ?>
              </select>
              
        </div> 
      
        

        <div class="col-md-4">
        <div class="form-group">
            <label>Filenumber</label>
            <input type="text" name="filenumber" id="filenumber" value="" class="form-control" onkeypress="return numeric(event)"/>
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-3"-->
        </div>


        <div class="col-md-12">

        <div class="col-md-4">
        <div class="form-group">
            <label>subject</label>
            <input type="text" name="subject" id="subject" value="" class="form-control"/>
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-"-->
          <div class="col-md-4">
        <div class="form-group">
          <label>Category</label>
              <select name="category" id="cboproduct"   class="form-control"  onchange="load_product_type(),loadcomp()" >
                <option value="0" >Select a category</option>
               <?php 
$sql="SELECT distinct category from view_loc";
$result=$conn->query($sql); if ($result->num_rows > 0) {
            
            
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  foreach($row as $key=>$value)
                  {  
                     
                echo "<option value='$value' >$value</option>";
                     }
                  
                }
              }
 ?></select>
            </div></div>
</div>



     <div class="col-md-12">

       <div class="col-md-4">
        <div class="form-group">
            <label>person</label>
            <input type="text" name="person" id="person" value="" class="form-control"/>
        </div> <!--div class="form-group"-->
          </div>

                  <div class="col-md-4">
        <div class="form-group">
            <label>Year</label>
            <input type="text" name="year" id="year" value="" class="form-control" placeholder="" />
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-3"-->
       
</div>









        <div class="col-md-12">

 <div class="col-md-4">
        <div class="form-group">
            <label>Tags</label>
            <input type="text" name="tags" id="tags" value="" class="form-control" placeholder="space seperated tags" />
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-3"-->

 <div class="col-md-4">
        <div class="form-group">
            <label>Bundle Number</label>
            <input type="text" name="bundlenumber" id="bundlenumber" value="" class="form-control" placeholder="Enter the bundlenumber" />
        </div> <!--div class="form-group"-->
          </div>

        

</div>

<div class="col-md-4" style="margin-top: 10px">

<div class="col-md-8">
        <div class="form-group">
            <label></label>
            <input type="submit" class="btn pull-left btn-success" style="width: 100%" name="search" value="Search"  onclick="uptoallotaddRow('upto2')">
        </div> <!--div class="form-group"-->
          </div>

</div>

<div class="col-md-6" style="margin-top: 10px"  >
          <div class="col-md-5">
        <div class="form-group">
            <label></label><a href="homerecord.php">
            <input type="button" class="btn pull-right  btn-danger" style="width: 100%" name="cancel" value="Cancel" ></a>
        </div> <!--div class="form-group"-->
          </div><!--div class="col-md-3"-->
      
</div>


</form>
</div>

                   


















              <!-- <div class="box box-warning" style="padding-left: 60px;width: 50%;"> -->
           







 


<div class="table table-responsive" id="table" style="display: none;">
  <div class="box-header">
    <div class="col-md-6"><h2>Search Result</h2></div>
    <div class="col-md-6 ">
    <button type="button"  style="margin-top:20px; margin-left: 90%" class="btn-danger" name="" value="Back" onclick="window.location.href='findrecord.php';"><i class='fa fa-close'></i>Close</button>
  </div>
               
            </div>

  
<table id="example1" class="table table-bordered table-striped">


           
        <?php
         
         if (isset($_POST['search']))
          {
            echo "<script>document.getElementById('search').style.display='none';document.getElementById('table').style.display='block';</script>";
            // echo "<h3 class='box-title'>Search result</h3>";
             $field_head = array('Filenumber','Year','Section','Subject','Name','Bundlenumber','Location');
             $ar_length=count($field_head);
          $section=$_POST['section'];
          $subject=$_POST['subject'];
          $tags=$_POST['tags'];
          $person=$_POST['person'];
          $filenumber=$_POST['filenumber'];
          $bundlenumber=$_POST['bundlenumber'];
          $year=$_POST['year'];
          $category=$_POST['category'];
        $exploded=explode(" ",$tags);
        $sql="SELECT id,filenumber,year,section,subject,name,bundlenumber,location,is_issued  from view_loc  where " ;
        
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
        if (!empty($year)) {
          $sql=$sql.$conjunction."year='$year'";
          $conjunction=" and ";
        }
        if (!empty($tags)) {
          $sql=$sql.$conjunction."id in (SELECT recordid from rec_tags where tag in ('".implode("','",$exploded)."'))";
        
           $conjunction=" and ";
        }
        if (!empty($category)) {
          $sql=$sql.$conjunction." category like '%$category%'";
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
                    $fieldarray[]=$fieldinfo->name;
                  }
                for($x = 0; $x < $ar_length; $x++)
                  {
              
                    echo "<th>$field_head[$x]</th>";
                    
                  }
                  echo "<th colspan='2'>Actions</th>";

            echo "</tr>";
            echo "</thead>";
            echo " <tbody>";
            
            if ($result->num_rows > 0) {
            
            
                // output data of each row
                while($row = $result->fetch_assoc()) {
                 echo "<tr>";
                 echo "<td>".$row['filenumber']."</td><td>".$row['year']."</td><td>".$row['section']."</td><td>".$row['subject']."</td><td>".$row['name']."</td><td>".$row['bundlenumber']."</td><td>".$row['location']."</td>";
                  $id=$row['id'];
                  $filenumber=$row['filenumber'];
                  echo "<td><a href='editrecord.php?id=$id'>edit</a> </td>";
                  if(0==$row['is_issued']){
                    echo "<td><a href='issuerecord.php?id=$id'>issue </a> </td>";
                  }elseif(1==$row['is_issued']){
                    echo "<td><a href='returnfiles.php#".$row['id']."' style='color:red'>Alreday Issued</a></td>";
                  }
                  else{
                    echo $row['is_issued'];
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
                  for($x = 0; $x < $ar_length; $x++)
                  {
              
                    echo "<th>$field_head[$x]</th>";
                    
                  }
                      echo "</tr>";endl:
                      }
                ?> 
                   </tfoot>
              </table>


  </div>
  










            <!-- </div> -->
            
          
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