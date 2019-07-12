<?php 

require_once('database.php');

if (isset($_POST['ajax_sub'])) {

	$id = $_POST['id'];
	$qry ="SELECT * from p_receive where id = $id";
	$res = mysqli_query($conn, $qry);
	$row = mysqli_fetch_assoc($res);
	$pr_name = explode(',', $row['product_name']);

	?>
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
       	<input type="hidden" name="id" value="<?=$row['id'];?>" >
       	<input type="hidden" name="agent_name" value="<?=$row['agent_name'];?>" >
       	<input type="hidden" name="total_prodcuts" value="<?=$row['product_name'];?>">
       				<table>
       					<thead>
       						<tr>
       							<th>Products</th>
       							<th>Sale</th>
       						</tr>
       					</thead>
       					<tbody>
       					<?php 
       					$i = 1;
       		foreach ($pr_name as $pname) { ?>
       						<tr>
       							<td><?=$pname;?></td>
       							<td>
       								<input type="checkbox" name="r[]" value="<?=$pname;?>">
       								

       							</td>
       						</tr>
       					       					
       		<?php $i++; } ?>
       					</tbody>
       				</table>
       		<br>
       		<input type="submit" name="submit">
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
  </script>

	<?php
}

 ?>