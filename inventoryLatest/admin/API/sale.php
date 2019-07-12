<?php 
 /*-----------------------------------AppDetailsAPI-------------------------------------------*/
 header('Content-Type: application/json');
/*----------------------------------Database Connection--------------------------------------*/
include('../config/database.php');
/*-----------------------------------TimeZone Setting--------------------------------------*/
date_default_timezone_set('Asia/kolkata');
/*----------------------------------Getting system date------------------------------------*/
$todayDate = date('Y-n-j H:i');
/*--------------------CHECKING THE KEYS----------------------*/
if(isset($_POST['aname']))
{
  $aname = $_POST['aname'];
  $receive_product = $_POST['receive_product'];
  $return_product = $_POST['return_product'];
  $sold_product = $_POST['sold_product'];
  $date = $_POST['date'];
  $count = substr_count($receive_product, ",") +1;
  // $arr = json_decode($products,true);
  // $array = $arr['product_data'];
  $json = ['success'=>true,'message'=>'Successfully Saved to Sales', 'Agent Name'=>$aname, 'Received Product'=>$receive_product, 'Quantity'=>$count, 'Returned Product'=>$return_product, 'Sold Product'=>$sold_product,'Date'=>$date];
      // $product_name = $array[$i]['product_name'];
  if(mysqli_query($conn, "INSERT INTO sales(agent_name, p_received, p_returned, p_sold, date) values('$aname','$receive_product', '$return_product', '$sold_product', '$date')"))
  {
    echo json_encode($json);
  }
  else
  {
      $json = ['success' => false];
      echo json_encode($json);
  }
}
/****************************************END OF CODE********************************************/
?>