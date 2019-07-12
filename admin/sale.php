<?php
session_start();
require_once("config/database.php");
//require_once("dbconn.php");
if(isset($_SESSION['username']))
$username = $_SESSION['username'];
if(isset($_SESSION['password']))
$password = $_SESSION['password'];

date_default_timezone_set('Asia/kolkata');
/*----------------------------------Getting system date------------------------------------*/
$todayDate = date('Y-n-j H:i');

//include 'dbconn.php'; //connect the connection page
	//require_once("function.php");
//if($_SESSION['id']==1)
?>
<?php
//if(!isset($_GET['studid']))
if(!isset($_SESSION['username']))
{ 
?>
<script>alert('Please Fill Basic Registration Form.');
window.location.href="index.php";</script>
<?php }?>
<?php
    if(isset($_SESSION['username']))
{
?>



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->
<?php require('leftpanel.php');?>
   <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->
 
    <div id="right-panel" class="right-panel">
        <?php include('header.php');?>
		
        <!-- Header-->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Allot Product</h1>
                    </div>
                </div>
            </div>
			
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Allot Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
			    <div class="row">                 
                  
                  <div class="col-lg-12">
                      <div class="card">
                        <?php 
                        if(!isset($_GET['name']))
                        {

                         ?>
                            
                      
            <div class="card-body card-block">
					<form method="post"  enctype="multipart/form-data" class="form-horizontal" name="myForm" id="myForm" onSubmit="return(validate());">
            <div class="row form-group">
              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"><span></span>Agent Name</label>
              </div>
              <div class="col-md-6">
                <select name="aname" class="form-control">
                  <option>Select</option>
                  <?php 
                  $q = "SELECT * FROM agents";
                  $result = mysqli_query($conn, $q);
                  while ($row = mysqli_fetch_assoc($result)) {
  
                  ?>
                  <option value="<?=$row['name'];?>"><?=$row['name'];?></option>
                 <?php 
                 } ?>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"><span></span>Product Name</label>
              </div>
              <div class="col-md-6">
                <select name="product[]" multiple="multiple" class="form-control">
                  <!-- <option>Select Product</option> -->
                  <?php 
                  $res = mysqli_query($conn, "SELECT * FROM products");
                  while($r = mysqli_fetch_assoc($res)) {
                   ?>
                   <option value="<?=$r['p_name'];?>"><?=$r['p_name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="card-footer">
              <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Add">
              <button type="reset" class="btn btn-danger">Reset </button>
            </div>
          </form>
					  
					  <?php
            
                if(isset($_POST['submit'])){
                $aname = $_POST['aname'];
                $product = implode(',', $_POST['product']);
                $qry = "INSERT INTO p_receive(agent_name, product_name, date) VALUES('$aname', '$product', '$todayDate')";
                $res = mysqli_query($conn, $qry);
                if($res)
                {
                  echo "<script>alert('Successfully Added');window.location.href='agentDetails.php?name=$aname';</script>";
                  
                }
                else{
                  echo "failed";
                }
              }}
             ?> 	
							
                      </div><!--card-body card-block-->
                      <?php 
                      if(isset($_GET['name']))
                      {
                        $name = $_GET['name'];
                       ?>
                       <div class="card-body card-block">
          <form method="post"  enctype="multipart/form-data" class="form-horizontal" name="myForm" id="myForm" onSubmit="return(validate());">
            <div class="row form-group">
              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"><span></span>Agent Name</label>
              </div>
              <div class="col-md-6">
                <select name="aname" class="form-control">
                  <option>Select</option>
                  <?php 
                  $q = "SELECT * FROM agents";
                  $result = mysqli_query($conn, $q);
                  while ($row = mysqli_fetch_assoc($result)) {
  
                  ?>
                  <option value="<?=$row['name'];?>"<?php if($row['name'] == '<?=$row["name"];?>') { ?> selected="selected"<?php } ?>><?=$row['name'];?></option>
                  <!-- <option value="1"<?php if($user['country'] == '1') { ?> selected="selected"<?php } ?>>1</option> -->
                 <?php 
                 } ?>
                </select>
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"><span></span>Product Name</label>
              </div>
              <div class="col-md-6">
                <select name="product[]" multiple="multiple" class="form-control">
                  <!-- <option>Select Product</option> -->
                  <?php 
                  $res = mysqli_query($conn, "SELECT * FROM products");
                  while($r = mysqli_fetch_assoc($res)) {
                   ?>
                   <option value="<?=$r['p_name'];?>"<?php if($r['p_name'] == '<?=$r["p_name"];?>') { ?> selected="selected"<?php } ?>><?=$r['p_name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="card-footer">
              <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Add">
              <button type="reset" class="btn btn-danger">Reset </button>
            </div>
          </form>
            
            <?php
            
                if(isset($_POST['submit'])){
                $aname = $_POST['aname'];
                $product = implode(',', $_POST['product']);
                $qry = "INSERT INTO p_receive(agent_name, product_name, date) VALUES('$aname', '$product', '$todayDate')";
                $res = mysqli_query($conn, $qry);
                if($res)
                {
                  echo "<script>alert('Successfully Added');window.location.href='agentDetails.php?name=$aname';</script>";
                  
                }
                else{
                  echo "failed";
                }
              }
             ?>
           <?php } ?>
           </div><!--card-body card-block-->
                    
                    </div><!--col-lg-12-->
                   

                </div><!--row-->


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script type="text/javascript">
      
      $(".form-control").chosen();
    </script>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
<?php } 
else
{ 
  echo "Access denied!<script>window.location.href('index.php');</script>";
}
?>

