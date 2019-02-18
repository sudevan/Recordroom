
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
            
         
       
                  

      
            <!-- /.box-header -->
            <div class="box-body">
               




              <div id="exelform" style=" display: none;">
                <div class="box-header col-sm-12">
                 <div class=" col-sm-6">
                   <h3 class="box-title">Add Record</h3>
                 </div>
                 <div class="col-sm-4">
                 </div>
                 <div class="col-sm-2">
                     <button class="btn btn-info" onclick="document.getElementById('addform').style.display='block';document.getElementById('exelform').style.display='none'">Single Add</button>
                 </div>
         </div>
                            <form enctype="multipart/form-data" action="excelread.php" method="post">

                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

                   
                        <div class="col-sm-6 "><label for="xl"> drop excel file here :</label>
                        <input type="file" class="form-control" id="xl" name="file" accept=".xls ,.ods ,.xlsx"  />
                      </div>

                          <div class="col-sm-8" style="margin-top: 20px">
                                <div class="col-sm-4">
                                <div class="form-group">
                        <input type="submit"class="btn btn-block btn-success" value="Upload" /></div></div>

                                <div class="col-sm-4">
                                  <div class="form-group">
                                <input type="button"class="btn btn-block btn-danger" name="cancel" value="Cancel" onclick="window.location.reload();" /></div></div></div>
                 

                    </form>

        </div>













                    

               <div id="addform">
                <div class="box-header col-sm-12">
                 <div class=" col-sm-6">
                   <h3 class="box-title">Add Record</h3>
                 </div>
                 <div class="col-sm-4">
                 </div>
                 <div class="col-sm-2">
                     <button class="btn btn-info" onclick="document.getElementById('exelform').style.display='block';document.getElementById('addform').style.display='none'">Bulk Add</button>
                 </div>
         </div>
                       <form action="addrecord.php" role="form" method="post" >
                <!-- text input -->
                    <div class="col-sm-12">
                         <div class="col-sm-4" style="margin-bottom: 10px; margin-top: 10px">
                              <div class="col-sm-12"  >
                                    <label>File number</label>
                                    <input type="text" name="filenumber" class="form-control" placeholder="Enter the filenumber" >
                              </div>    
                         </div>

                        <div class="col-md-4" style="margin-bottom: 10px;margin-top: 10px">
                              <div class="col-md-12">
                                      <label>Year</label>
                                      <input type="text" name="year" class="form-control" placeholder="Enter the year">
                              </div>
                        </div>
                         <div class="col-sm-4" style="margin-bottom: 10px; margin-top: 10px">
                          <div class="col-sm-12"  >
            <label>Section</label>
              <select name="section" id="cboproduct"   class="form-control"  onchange="load_product_type(),loadcomp()"  >
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
</div>
                    </div>








  <div class="col-sm-12">

                     
             

<div class="col-sm-4" style="margin-bottom: 10px; margin-top: 10px">
                          <div class="col-sm-12"  >

                  <label>Subject</label>
                  <input type="text" name="subject" class="form-control" placeholder="Enter the subject" >
                </div>
              </div>
                <div class="col-sm-8" style="margin-bottom: 10px; margin-top: 10px">
                          <div class="col-sm-12"  >
                  <label>bundlenumber</label>
                  <input type="text" name="bundlenumber" class="form-control" placeholder="Enter your bundlenumber">
                </div></div>
             
</div>






 <div class="col-sm-12">
               <div class="col-sm-4" style="margin-bottom: 10px; margin-top: 10px">
                          <div class="col-sm-12"  >
                  <label>date</label>
                  <input type="text" name="date" class="form-control" placeholder="Enter date" >
                </div></div>
                <div class="col-md-8" style="margin-bottom: 10px;margin-top: 10px">
                          <div class="col-md-12">
                  <label>Entered by</label>
                  <input type="text" name="enteredby" class="form-control" placeholder="Enter your name">
                </div></div>
             </div>







                  






             <div class="col-sm-12">
                <div class="col-md-4" style="margin-bottom: 10px;margin-top: 10px">
                          <div class="col-md-12">
                  <label>person name</label>
                  <input type="text" name="personname" class="form-control" placeholder="Enter the person name" >
                </div></div>


                 <div class="col-sm-4" style="margin-bottom: 10px; margin-top: 10px">
                          <div class="col-sm-12"  >
                  <label>pages</label>
                  <input type="text" name="pages" class="form-control" placeholder="Enter the pages" >
                </div></div>
                 <div class="col-md-4" style="margin-bottom: 10px;margin-top: 10px">
                          <div class="col-md-12">
                  <label>category</label>
                  <input type="text" name="category" class="form-control" placeholder="Enter the category" >
                </div></div>

           </div>



           <div class="col-sm-12">

            

           </div>



          

              <div class="col-sm-12">
                  <div class="col-md-12 style="margin-bottom: 10px;margin-top: 10px">
                          <div class="col-md-12">
                  <label>tags</label>
                  <textarea class="form-control" name="tags" rows="2" placeholder="Enter the space seperated tag"  ></textarea>
                </div></div>


               
           </div>


 <div class="col-sm-12">
   <div class="col-sm-1" style="margin-bottom: 10px;">
                          <div class="col-sm-12">
              </div></div>
               <div class="col-sm-4" style="margin-bottom: 10px;">
                          <div class="col-sm-12">
               <button type="submit"  style="margin-top: 25px;" class="btn btn-block btn-success" name="save" ><b>Save Record</b></button>
              </div></div>



            <div class="col-sm-2" style="margin-bottom: 10px;">
                          <div class="col-sm-12">
              </div></div>


              <div class="col-sm-4" style="margin-bottom: 10px;">
               <div class="col-sm-12">
               <button type="button" style="margin-top: 25px;" class="btn btn-danger btn-block " onclick="window.location.href='homerecord.php'" name="cancel"><b>Cancel</b></button></div></div>
                <div class="col-sm-1" style="margin-bottom: 10px;">
                          <div class="col-sm-12">
              </div></div>
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
               
              }
              ?>
               

              </form>

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
