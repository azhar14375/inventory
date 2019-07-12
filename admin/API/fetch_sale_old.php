<?php
header('Content-Type: application/json');

include('../config/database.php');

//fetching the temp_cart table data from database
      $sel = mysqli_query($conn,"select * from sales");
      $num = mysqli_num_rows($sel);
      if($num>0)
      {
       $json = ['success' => true,];
        while($arr = mysqli_fetch_assoc($sel))
        {
          $aName = $arr['agent_name'];
          $pReceive = $arr['p_received'];
          $rTime = $arr['receive_time'];
          $pReturn = $arr['p_returned'];
          $pSale = $arr['p_sold'];
          $pSaleQauntity = $arr['sold_quantity'];
          $pSaleTime = $arr['sold_time'];
          // $count = count($product_name);
          // print_r($productSaleData);
          // die;
          // $json['SaleProduct'][] = ['Name'=>$pSale, 'Quantity'=>$pSaleQauntity]
          // $productSaleData = $json['SaleProduct'];
          // print_r($productSaleData);
          // die;
          $jsonn['SaleProduct'] = ['Name'=>$pSale, 'Quantity'=>$pSaleQauntity];
          $productSaleData = $jsonn['SaleProduct'];
          $expData = explode(",", $productSaleData);
          print_r($expData);
          die;
          $json['Sale'][] = array(['Agent Name'=>$aName, 'Product Receive' =>$pReceive, 'Receive Time'=>$rTime, 'Product Return'=>$pReturn,'SaleProduct'=>$productSaleData]);

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