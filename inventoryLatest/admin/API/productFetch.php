<?php
header('Content-Type: application/json');

include('../config/database.php');

//fetching the temp_cart table data from database

      $sel = mysqli_query($conn,"select * from p_receive ");
      $num = mysqli_num_rows($sel);
      if($num>0)
      {
       $json = ['success' => true, 'count' => $num];
        while($arr = mysqli_fetch_assoc($sel))
        {
          $id = $arr['id'];
          $agent_name = $arr['agent_name'];
          $product_name = $arr['product_name'];
          $date = $arr['date'];

          // $sel2 = mysqli_query($conn,"select * from products where product_id = '$productID' ");
          // $n = mysqli_num_rows($sel2);
          // $arr2 = mysqli_fetch_assoc($sel2);
          // $pname = $arr2['pname'];
          // $balance = $arr2['quantity'];
          // $dCharge = $arr2['dCharge'];
          // $image = $arr2['image'];
          $count = count($product_name);

          $json['Receive'][] = ['agent_name'=>$agent_name, 'product_name' => $product_name, 'date'=>$date];

          }
          echo json_encode($json);
         }
          else
         {
          $json = ['success' => false, 'message' => 'There is No Item'];
          echo json_encode($json);
         }
//end of fetching data from temp_cart table
?>