<?php 
 session_start();
 include("connection.php");
 if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $file=$_POST['id'];
    $issued_at=$_POST['issued_at']; 
    $query="INSERT INTO  issue_details (file,issued_to,issued_at) VALUES ('$file','$name','$issued_at')";
    $sql2="UPDATE rec_record_master SET is_issued=true WHERE id='$file'";
    $result=$conn->query($query);
    $result2=$conn->query($sql2);
    if($result && $result2){
        echo "<script>window.location.href='findrecord.php'</script>";
    }
    else{
        echo "error :" .$conn->error;
    }
}
 if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT id,filenumber,subject FROM rec_record_master where id='$id'";
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
            include("include.php");
    ?>
    <!-- content-wrapper -->
    <div class="content-wrapper">
        <!-- section -->
        <section class="content-header">
            <!-- box -->
            <div class="box"  style="border-top: 3px solid #00c0ef;">
                <div class="box-header">
                    <h3 class="box-title">Issue Record</h3>
                </div>  
                <!-- box-body -->
                <div class="box-body">
                    <div class="col-sm-4">
                        <!-- form -->
                        <form method="post" action="issuerecord.php">
                        <div class="form-group">
                                <label for="name">File </label>
                                <?php
                                     $result=$conn->query($sql);
                                     if ($result->num_rows>0){
                                        $row=$result->fetch_array();
                                        echo "<input type='text' class='form-control' disabled value='".$row['id']."-".$row['subject']."'>
                                        <input type='hidden' value='".$row['id']."' name='id'>";
                                    }
                                    else{
                                        echo "error".$conn->error;
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="name">Issued To</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="date">Issued Date</label>
                                <input type="date" class="form-control" name="issued_at" id="date">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-success" value="Issue Now" style="float:right">
                            </div>
                        </form>
                        <!-- /form -->
                    </div>
                </div>
                <!-- /box-body -->
            </div>
            <!-- /box -->
        </section>
        <!-- /section -->
    </div>
    <!-- /content-wrapper-->
    <?php
    include("footer.php");
    ?>
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