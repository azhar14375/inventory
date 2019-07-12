<?php 

require_once('database.php');

if(isset($_POST))
{

$total_products = $_POST['total_prodcuts'];
$tr = explode(',', $total_products);
$sale1 = $_POST['r'];
$agent_name = $_POST['agent_name'];

$return1 = array_diff($tr, $sale1);

$sale = implode(',', $sale1);
$return = implode(',', $return1);


$qry = "INSERT INTO `sales` (`agent_name`, `p_received`, `p_returned`, `p_sold`, `date`) VALUES ('$agent_name', NULL, '$return', '$sale', NOW())";
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