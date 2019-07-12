<?php
session_start();
require_once("config/database.php");
//require_once("dbconn.php");
if(isset($_SESSION['username']))
$username = $_SESSION['username'];
if(isset($_SESSION['password']))
$password = $_SESSION['password'];

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


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
                        <h1>Add Product</h1>
                    </div>
                </div>
            </div>
			
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Add Product</li>
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
                            
                      
                      <div class="card-body card-block">
					  <?php 
						
						// include('dbconn.php');
						if(!isset($_GET['id']))
							{


				
{ ?>
					<form method="post"  enctype="multipart/form-data" class="form-horizontal" name="myForm" id="myForm" onSubmit="return(validate());">
            <div class="row form-group">
              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"><span></span>Product Code</label>
              </div>
              <div class="col-md-6">
                <input type="text" name="pcode" id="pcode" placeholder="Enter Product Code" class="form-control" value="">
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"><span style="color: red;"></span>Product Type/Unit</label>
              </div>
              <div class="col-md-6">
                <select class="form-control" name="ptype" required="required">
                  <option value="0">Select</option>
                  <?php
                  $qry = "SELECT * FROM p_category";
                  $res = mysqli_query($conn, $qry);
                  while ($row = mysqli_fetch_assoc($res)) {
                ?>
                  <option value="<?=$row['p_unit'];?>"><?=$row['p_unit'];?></option>
                  <?php } ?>
                </select>
                <!-- <input type="text" name="ptype" id="ptype" placeholder="Enter Product Unit" class="form-control" value=""> -->
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"><span style="color: red;"></span>Product Name</label>
              </div>
              <div class="col-md-6">
                <input type="text" name="product" id="product" placeholder="Enter Product Name" class="form-control" value="">
              </div>
            </div>
            <div class="row form-group">
              <div class="col col-md-3"><label for="textarea-input" class=" form-control-label"><span style="color: red;"></span>Product Quantity</label>
              </div>
              <div class="col-md-6">
                <input type="tel" name="quantity" id="quantity" placeholder="Enter Product Quantity" class="form-control" value="">
              </div>
            </div>
            <div class="card-footer">
              <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">
              <button type="reset" class="btn btn-danger">Reset </button>
            </div>
          </form>
					  
					  <?php
              if(isset($_POST['submit'])){
                $product_code = $_POST['pcode'];
                $product_type = $_POST['ptype'];
                $product = $_POST['product'];
                $quantity = $_POST['quantity'];
                $check = mysqli_query($conn, "SELECT * FROM products WHERE p_name = '$product'");
                $checkrow = mysqli_num_rows($check);
                if($checkrow>0)
                {
                  echo "<script>alert('Product Already Exist');</script>";
                }
                else
                {
                  $qry = "INSERT INTO products(p_code, p_type, p_name, p_quantity) VALUES('$product_code', '$product_type', '$product', '$quantity')";
                  $res = mysqli_query($conn, $qry);
                  if($res)
                    {
                      echo '<script>alert("Product Successfully Added");window.location.href ="add_product.php";</script>';
                    }
                    else
                    {
                      echo "failed";
                    }

                }
              }
             } } ?> 	
							
							<?php 
							//$sql_studid = "SELECT * FROM studentreg  WHERE email =".$_SESSION['name']." AND password =".$_SESSION['pass'] ;
							/* EDIT FUNCTIONALITY START*/
							if(isset($_GET['id']))
							{
                $id = $_GET['id'];
                $query = "SELECT * FROM products WHERE p_id = '$id'";
                $res = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($res);
                // $product = $row['p_name'];
                // $quantity = $row['p_quantity'];

							?>
							<form method="post"  enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Product Code</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="pcode" id="pcode" class="form-control" value="<?=$row['p_code'];?>">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Product type/Unit</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="ptype" id="ptype" class="form-control" value="<?=$row['p_type'];?>">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Product Name</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="product" id="product" class="form-control" value="<?=$row['p_name'];?>">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col col-md-3">
                    <label for="textarea-input" class=" form-control-label">Product Quantity</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="quantity" id="quantity" class="form-control" value="<?=$row['p_quantity'];?>">
                  </div>
                </div>
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="update" id="update" value="Update">
                  <button type="reset" class="btn btn-danger">Reset </button>
                </div>
              </form>
              <?php
              if(isset($_POST['update']))
              { 
                $product_code = $_POST['pcode'];
                $product_type = $_POST['ptype'];
                $product = $_POST['product'];
                $quantity = $_POST['quantity'];
                $res = "UPDATE products SET p_code = '$product_code', p_type = '$product_type', p_name = '$product', p_quantity = '$quantity' WHERE p_id = '$id' ";
                
                mysqli_query($conn, $res);
                echo "<script>alert('Updated Successfully');window.location.href = 'product.php';</script>";
              }
               ?>
							<?php
             
							}
							
							/*EDIT FUNCTIONALITY END*/
							
											
					 ?>
                      </div><!--card-body card-block-->
                    
                    </div><!--col-lg-12-->
                   

                </div><!--row-->


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script type="text/javascript">

        function validate()
      {
      
         if( document.myForm.qualification.value == "" )
         {
            alert( "Please provide Qualification Name!" );
            document.myForm.qualification.focus() ;
            return false;
         }
         return( true );
      }



    </script>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
<?php } 
else{ 
    echo "Access denied!<script>window.location.href('index.php');</script>";}
?>

