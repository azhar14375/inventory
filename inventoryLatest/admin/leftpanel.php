<?php
if(!isset($_SESSION))
	{
		session_start();
	}
 require_once("config/database.php");
 
//if(isset($_SESSION['username']))
$username = $_SESSION['username'];
//if(isset($_SESSION['password']))
$password = $_SESSION['password'];
//$id = $_SESSION['id'];
?>
 <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=""><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="admindash.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <!-- /.menu-title -->
                 

                   <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sliders"></i>Document</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="uploaddocs.php">Upload Document</a></li>
                            <li><i class="fa fa-puzzle-piece"></i><a href="view_doc.php">View Document</a></li>
                        </ul>
                    </li>-->
                   
					 <li class="menu-item-has-children">
                        <a href="product.php"><i class="menu-icon fa fa-sliders"></i>Manage Products</a>
                    </li>
					<li class="menu-item-has-children">
						<a href="agent.php"><i class="menu-icon fa fa-sliders"></i>Manage Agent</a>
					</li>
					<li class="menu-item-has-children">
						<a href="unit.php"><i class="menu-icon fa fa-sliders"></i>Manage Unit</a>
					</li>					
					<!--<li class="menu-item-has-children">
						<a href="manage_industry.php"><i class="menu-icon fa fa-sliders"></i>Manage Industry</a>
					</li>
					<li class="menu-item-has-children">
						<a href="manage_internshiptype.php"><i class="menu-icon fa fa-sliders"></i>Manage Internship Type</a>
					</li>
				    <li class="menu-item-has-children">
						<a href="manage_jobtype.php"><i class="menu-icon fa fa-sliders"></i>Manage Jobtype</a>
					</li>
					
					<li class="menu-item-has-children">
						<a href="manage_category.php"><i class="menu-icon fa fa-sliders"></i>Manage Category</a>
					</li>
					<li class="menu-item-has-children">
						<a href="manage_post.php"><i class="menu-icon fa fa-sliders"></i>Manage Post</a>
					</li>
					<li class="menu-item-has-children">
						<a href="manage_event.php"><i class="menu-icon fa fa-sliders"></i>Manage Event</a>
					</li>
					<li class="menu-item-has-children">
						<a href="change_password.php"><i class="menu-icon fa fa-sliders"></i>Change Password</a>
					</li>
					<li class="menu-item-has-children">
						<a href="manage_event_staff.php"><i class="menu-icon fa fa-sliders"></i>Event Staff</a>
					</li>
					<li class="menu-item-has-children">
						<a href="admin_profile.php"><i class="menu-icon fa fa-sliders"></i>Admin Profile</a>
					</li> -->
					
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>