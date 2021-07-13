<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/format.php';?>
<?php include_once '../classes/admin/cart.php';?>
<?php
$ct=new cart();
if(isset($_GET['shiftId'])){
	$id=$_GET['shiftId'];
	$time=$_GET['time'];
	$price=$_GET['price'];
	$shifted=$ct->shifted($id,$time,$price);
}

if(isset($_GET['delId'])){
	$id=$_GET['delId'];
	$time=$_GET['time'];
	$price=$_GET['price'];
	$del_shifted=$ct->del_shift($id,$time,$price);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Order Time</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Customer ID</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
					
					$fm=new Format();
					$get_inbox_cart=$ct->get_inbox_cart();
					if($get_inbox_cart){
						$i=0;
						while($result=$get_inbox_cart->fetch_assoc()){
							$i++;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $fm->formatDate($result['date_order']) ?></td>
							<td><?php echo $result['product_Name'] ?></td>
							<td><?php echo $result['quantity'] ?></td>
							<td><?php echo $result['price'].' '.'VND' ?></td>
							<td><?php echo $result['customer_id'] ?></td>
							<td><a href="customer.php?customerId=<?php echo $result['customer_id']?>">View Customer</a></td>
							<td>
							<?php
							if($result['status']==0){
							?>

							<a href="?shiftId=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Đang xử lý</a>

							<?php
							}elseif($result['status']==1){
							echo 'Đang vận chuyển';
							}elseif($result['status']==2){
							?>

							<a href="?delId=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xóa</a>

							<?php
							}
							?>
							</td>
						</tr>
					<?php
					}
					}
					?>	
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
