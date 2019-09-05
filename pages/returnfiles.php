<?php 
 session_start();
 include("connection.php");
 $sql="SELECT * FROM issue_details INNER JOIN rec_record_master ON issue_details.file=rec_record_master.id INNER JOIN rec_person ON rec_record_master.personid=rec_person.id";
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
                    <h3 class="box-title">Issued Records</h3>
                </div>  
                <!-- box-body -->
                <div class="box-body">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <!-- form -->
                            <form method="post" action="">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>File ID</th>
                                            <th>File Number</th>
                                            <th>Subject</th>
                                            <th>Issued To</th>
                                            <th>Issued At</th>
                                            <th>Returned At</th>
                                            <th>Return</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $result=$conn->query($sql);
                                            if ($result->num_rows>0){
                                                while($row=$result->fetch_assoc()){
                                                    echo "<tr id='".$row['file']."'><td>".$row['file']."</td><td>".$row['filenumber']."</td><td>".$row['subject']."-".$row['name']."</td><td>".$row['issued_to']."</td><td>".$row['issued_at']."</td><td>".$row['returned_at']."</td>";
                                                    if(!$row['returned_at']){
                                                        echo "<td><a href='returnfile.php?id=".$row['file']."&issued_to=".$row['issued_to']."' id='return' value='".$row['id']."'>return</a></td></tr>";
                                                        
                                                    }else{
                                                        echo "<td>returned <i class='fa fa-check'></i></td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                            <!-- /form -->
                        </div>
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
    <script>
        $("#return").click(function(){
            console.log($(this).val());
        });
    </script>
    <?php
    //clossiing else of isset session
    }
    ?>
</body>
</html>    