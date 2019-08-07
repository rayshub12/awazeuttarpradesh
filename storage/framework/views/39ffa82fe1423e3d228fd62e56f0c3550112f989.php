<div id="header"></div>

<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="<?php echo e(url('/admin')); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>AEU</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>AEU</b>Awaz E UttarPradesh</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li>
          <a href="<?php echo e(url('/')); ?>" target="_blank" title="Visit Website"><i class="fa fa-globe"></i></a>
        </li>
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="<?php echo e(url('images/frontend/images/logo-black.jpg')); ?>" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="<?php echo e(url('images/frontend/images/logo-black.jpg')); ?>" class="img-circle" alt="User Image">

              <p>
              <?php echo e(Auth::user()->name); ?>

                <small>Member since Nov. 2019</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo e(url('/admin/profile')); ?>" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo e(url('/logout')); ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        
      </ul>
    </div>
  </nav>
</header>
<?php /* /home/brj9ibrcb139/resources/views/layouts/adminLayouts/admin_header.blade.php */ ?>