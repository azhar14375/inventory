<?php
header('Content-Type: application/json');

include('../config/database.php');

//fetching data from product table

      $sel = mysqli_query($conn,"select * from products ");
      $res = mysqli_fetch_assoc($sel);
      if($res>0)
      {
       $json = ['success' => true];
        while($arr = mysqli_fetch_assoc($sel))
        {
          $pname = $arr['p_name'];

          $json['Products'][] = $pname;

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