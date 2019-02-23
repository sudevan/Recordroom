<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="homerecord.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>RRM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RECORDROOM</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user2.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo "Records"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2.png" class="img-circle" alt="User Image">

                <p>
                  <?php  echo "Records"; ?>
                  <small><?php echo "records@gptcpalakkad.ac.in" ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"><?php echo $_SESSION['f_id']; ?></a>
                    <a href="#"></a>
                  </div>
                 
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">

 <!--                 <a href="login.php" class="btn btn-default btn-flat">Sign out</a>
                </div> -->
 <form action="login.php" method="post" id="frmLogout">
        <input type="submit" name="logout" value="Logout" class="btn btn-block btn-success" style="margin-top: 10px;">
        </form> 
                        </div>

              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
  
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li> 
        <li><a href="addrecord.php"><i class="fa fa-book text-red"></i> <span>Add Record</span></a></li>
        <li><a href="findrecord.php"><i class="fa fa-search text-green"></i> <span>Find Record</span></a></li>
        <li><a href="addlocation.php"><i class="fa fa-map text-yellow"></i> <span>Add Location</span></a></li>

       
        <li class="header">LABELS</li>
        <li><a href="homerecord.php"><i class="fa fa-circle-o text-red"></i> <span>Home</span></a></li>
        <li><a href="profile.php"><i class="fa fa-circle-o text-yellow"></i> <span>Contact us!</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Help</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
