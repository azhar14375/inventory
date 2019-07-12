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
  $receive_product = $_POST['receive_product'];
  $receive_time = $_POST['receive_time'];
  $return_product = $_POST['return_product'];
  $sold_product = $_POST['sold_product'];
  $sold_time = $_POST['sold_time'];
  $arr = json_decode($sold_product, true);
  $arr1 = $arr['sale_data'];
  $json = ['success'=>true,'message'=>'Successfully Saved to Sales', 'Agent Name'=>$aname, 'Received Product'=>$receive_product,'Receive Time'=>$receive_time, 'Returned Product'=>$return_product, 'Sale Time'=>$sold_time];
  for ($i=0; $i<count($arr1) ; $i++)
  {
    $pname[] = $arr1[$i]['pname'];
    $quantity[] = $arr1[$i]['quantity'];
  }
  @$pstr = implode(',', $pname);
  @$qstr = implode(',', $quantity);
  if ($pstr == "" && $qstr == "") {
    $pstr = "No sale";
    $qstr = "No data";

    if(mysqli_query($conn, "INSERT INTO sales(agent_name, p_received, receive_time, p_returned, p_sold, sold_quantity, sold_time, date) values('$aname','$receive_product', '$receive_time', '$return_product', '$pstr', '$qstr', '$sold_time' , '$todayDate')"))
  {
    $temp =true;
  }
   $json['sale_data'][] = ['Product Name' => $pstr, 'Quantity'=>$qstr];
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

elseif(mysqli_query($conn, "INSERT INTO sales(agent_name, p_received, receive_time, p_returned, p_sold, sold_quantity, sold_time, date) values('$aname','$receive_product', '$receive_time', '$return_product', '$pstr', '$qstr', '$sold_time' , '$todayDate')"))
  {
    $temp =true;
  }
   $json['sale_data'][] = ['Product Name' => $pstr, 'Quantity'=>$qstr];
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