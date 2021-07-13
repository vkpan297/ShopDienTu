<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/brand.php' ?>

<?php
$brand=new brand();
if(isset($_GET['id'])){
    $brandId=$_GET['id'];
	$delBrand=$brand->delete_brand($brandId);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thương hiệu sản phẩm</h2>
                <div class="block">     
				<?php
                if(isset($delBrand)){
                    echo $delBrand;
                }
                ?>   
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$show_Brand=$brand->listBrand();
							if($show_Brand){
								$i=0;
								while($result = $show_Brand->fetch_assoc()){
									$i++;
							
						?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo $result['brand_Name']; ?></td>
								<td><a href="brandedit.php?id=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('Are you want to delete?')"
								href="?id=<?php echo $result['id']; ?>">Delete</a></td>
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

