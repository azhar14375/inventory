<!doctype html>
<?php 

if(!isset($_SESSION))
 {
session_start();
}
$username = $_SESSION['username'];
$password = $_SESSION['password'];
?>
<?php 
require_once("config/database.php");

?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
        <!-- Left Panel -->

   <?php require('leftpanel.php');?>
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
         <?php include('header.php');?>
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agent Profile</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Agent Details</strong>

                            <div class="float-right" style="margin-left: 5px; "> <a href="agent_product.php" class="btn btn-success"><b>+</b> Allot Product to Agent</a>
                            </div>
                            
                            <div class="float-right" style="margin-left: 5px; "> <a href="sale.php" class="btn btn-success"><b>+</b> Sale Product</a>
                            </div>
                            <div class="float-right"> <a href="add_agent.php" class="btn btn-primary"><b>+</b> Add Agent</a>
                            </div>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                       <!--  <th>Select</th> -->
                        <th>#</th>
                        <th>Agent Name</th>
                        <th>Mobile</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        include('config/database.php');

                        $sql="SELECT * FROM agents";
						$res = mysqli_query($conn, $sql);
						$a=1;
						if($res)
						while($row = mysqli_fetch_assoc($res))
						{
						//print_r($row);
						?>
						<tr>
                            <!-- <td><input name="checkbox[]" type="checkbox" value="<?php echo $row['p_id']; ?>"></td> -->
							<td><?= $a++;?></td>
                            <td><?= $row['name'];?></td>
                            <td><?= $row['mobile'];?></td>
							<td>
							<a href="add_agent.php?id=<?php echo $row['a_id'];?>" class="btn btn-link" ><i class="fa fa-edit"></i></a><!--<a href="student-reg.php?sid=<?=$row['sid'];?>" class="btn btn-link"><i class="fa fa-eye"></i></a>-->
                            <a href="agent.php?delid=<?php echo $row['a_id'];?>" class="btn btn-link" onclick = "return confirm('Are You Sure to Delete <?=$row['name'];?> ');"><i class="fa fa-trash" style="color: red"></i></a>
                            <a href="agentDetails.php?name=<?php echo $row['name'];?>" class="btn btn-link">Details</a>
							<!--<a href="student-reg.php?sid=<?=$row['studid'];?>" class="btn btn_link"><i class="fa fa-eye"></i></a>-->
							</td>
                            <?php 
                            if(isset($_GET['delid']))
                            {
                                $id = $_GET['delid'];
                                $query = "DELETE FROM agents WHERE a_id = '$id' ";
                                mysqli_query($conn, $query);
                                echo "<script>alert('Deleted Successfully');window.location.href = 'agent.php';</script>";
                            }


                             ?>

						</tr>
						<?php 	
						}
						?>                     </tbody>
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
