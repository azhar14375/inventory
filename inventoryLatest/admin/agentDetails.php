<!doctype html>
<?php 

if(!isset($_SESSION))
{
    session_start();
}

if (isset($_GET['smsg'])) {
    $msg = 'successfully saved';
}

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
                     <?php 
                     include 'config/database.php';
                     if(isset($_GET['name']))
                     {
                        $aname = $_GET['name'];
                        $qry = "SELECT * FROM agents WHERE name = '$aname' ";
                        $res = mysqli_query($conn, $qry);
                        $row = mysqli_fetch_assoc($res);
                        ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Agent Details</strong>
                            </div>
                            <div class="card-body card-block">
                                <form method="post"  enctype="multipart/form-data" class="form-horizontal" name="myForm" id="myForm" onSubmit="return(validate());">
                                    <div class="row form-group">
                                        <div class="col col-md-2">
                                            <label for="textarea-input" class=" form-control-label">Agent Name:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?=$row['name'];?></span>
                                            <!-- <input type="text" name="aname" id="aname" placeholder="Enter Agent Name" class="form-control"> -->
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-2">
                                            <label for="textarea-input" class=" form-control-label">Agent Mobile:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <span><?=$row['mobile'];?></span>
                                            <!-- <input type="tel" name="amobile" id="amobile" placeholder="Enter Agent Mobile Number" class="form-control"> -->
                                        </div>
                                    </div>
                                </form>
                            </div><!--card-body card-block-->
                        </div>
                    </div>
                <?php } ?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Product Details</strong>
                                <!-- <div class="float-right"><a href="agent_product.php" class="btn btn-primary"><b>+</b> Add More Product</a>
                                </div> -->
                            </div>
                            <div class="card-body">
                                <p class="text-success"><?=@$msg;?></p>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <!--  <th>Select</th> -->
                                            <th>#</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_GET['name']))
                                        {
                                            $aname = $_GET['name'];
                                            $a = 1;
                                            $query = "SELECT * FROM p_receive WHERE agent_name = '$aname' ";
                                            $result = mysqli_query($conn, $query);
                                            while ( $row = mysqli_fetch_assoc($result)) {
                                                $count = substr_count($row['product_name'], ',')+1;
                    
                                            ?>
                                        <tr>
                                            <td><?=$a++;?></td>
                                            <td><?=$row['product_name'];?></td>
                                            <td><?=$count;?></td>
                                            <td><?=$row['date'];?></td>
                                            <td><a href="agent_product.php?name=<?=$row['agent_name'];?>">Change Status</a></td>
                                            <td><button type="button" class="btn btn-info btn-sm change_status" id="<?=$row['id'];?>" >Change Status</button></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Modal -->
  <div id="modal_show"></div>

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


    <script>
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );


         $(document).ready(function() {
          $('.change_status').click(function(){
            var id = $(this).attr('id');
            $.ajax({
                method: "post",
                url: "config/ajax_handle.php",
                data: {id: id, ajax_sub: 'ajax_sub'},
                success: function(res){
                    $("#modal_show").html(res);
                }});
          });
        } );
    </script>


</body>
</html>
