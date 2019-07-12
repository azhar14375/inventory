<?php 

require_once('database.php');

date_default_timezone_set('Asia/kolkata');
/*----------------------------------Getting system date------------------------------------*/
$todayDate = date('Y-n-j H:i');

if(isset($_POST))
{
$rDate = $_POST['rdate'];
$total_products = $_POST['total_prodcuts'];
$tr = explode(',', $total_products);
$sale1 = $_POST['r'];
$saleQuantity1 = $_POST['quantity'];
$qtyr = array_filter($saleQuantity1);

$j=0;
foreach($qtyr as $uqty)
{
	$pname = $sale1[$j];
	$uqry = "UPDATE `products` SET `p_quantity` = `p_quantity`-$uqty WHERE `p_name` = '$pname'";

	mysqli_query($conn, $uqry);
	$j++;
}

$saleQuantity = implode(',', $qtyr);

$agent_name = $_POST['agent_name'];
// $sQuantity = $_POST['sale_quantity'];
// $saleTime = $_POST['sale_time'];
$return1 = array_diff($tr, $sale1);
$sale = implode(',', $sale1);
$return = implode(',', $return1);
// $saleQuantity = implode(',', $sQuantity);
// print_r($_POST);
// die;

$qry = "INSERT INTO sales(agent_name, p_received, receive_time, p_returned, p_sold, sold_quantity, sold_time, date) VALUES('$agent_name','$total_products', '$rDate', '$return', '$sale', '$saleQuantity', 'saleTime', '$todayDate')";

if(mysqli_query($conn, $qry))
{
	header('location:../agentDetails.php?smsg&name='.$agent_name);
}
else
{
	header('location:../agentDetails.php?fmsg&name='.$agent_name);
}
}
?>