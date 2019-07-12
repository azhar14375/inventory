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
  $temp = false;
  $aname = $_POST['aname'];
  $products = $_POST['products'];
  $arr = json_decode($products,true);
  $array = $arr['product_data'];
  $json = ['success'=>true,'message'=>'Successfully Saved to Product Received','agent_name'=>$aname];
  for($i=0;$i<count($array);$i++)
  {
    $product_name = $array[$i]['product_name'];
    $date = $array[$i]['date'];
  if(mysqli_query($conn, "INSERT INTO p_receive(agent_name, product_name, date) values('$aname','$product_name', '$date')"))
  {
    $temp = true;
  }
  $json['products'][] = ['product_name'=>$product_name,'date'=>$date];
  }
  if($temp)
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