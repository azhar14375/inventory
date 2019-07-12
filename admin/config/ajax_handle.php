<?php 

require_once('database.php');

if (isset($_POST['ajax_sub'])) {

  $id = $_POST['id'];
  $qry ="SELECT * from p_receive where id = $id";
  $res = mysqli_query($conn, $qry);
  $row = mysqli_fetch_assoc($res);
  $pr_name = explode(',', $row['product_name']);
  // print_r($row);
  // die;

  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- Button trigger modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form action="config/function.php" method="post">
        <!-- <input type="hidden" name="id" value="<?=$row['id'];?>" > -->
        <input type="hidden" name="agent_name" value="<?=$row['agent_name'];?>" >
        <input type="hidden" name="total_prodcuts" value="<?=$row['product_name'];?>">
        <input type="hidden" name="rdate" value="<?=$row['date'];?>">
              <table width="100%">
                <thead>
                  <tr>
                    <th>Products</th>
                    <th>Sale &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Quantity</th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>
                <?php 
                $i = 1;
          foreach ($pr_name as $pname) { ?>
                  <tr>
                    <td><?=$pname;?></td>
                      <span class="test">
                      <td style="width: 200px;">
                      <input type="checkbox" class="checkc" name="r[]" value="<?=$pname;?>">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="number" class="qtyc" style="display: none;" name="quantity[]" min="1" max="5">
                    </td>
                    
                      <td>
                    </td>
                    </span>
                  </tr>
                                
          <?php $i++; } ?>
                </tbody>
              </table>
          <br>
          <input type="submit" name="submit" class="btn btn-success" value="Sale">
       </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

  <script>
    $('#myModal').modal('show');
    $('.checkc').on('click', function () {
      if($(this). prop("checked") == true){
        $(this).siblings('.qtyc').show();
      }
      else
      {
        $(this).siblings('.qtyc').hide();
      }
      });
  </script>



  <?php
}

 ?>