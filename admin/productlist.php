<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/brand.php' ?>
<?php include '../classes/admin/category.php' ?>
<?php include '../classes/admin/product.php' ?>
<?php include_once '../helpers/format.php' ?>

<?php
$product=new product();
$fm=new Format();
if(isset($_GET['id'])){
    $productId=$_GET['id'];
	$delProduct=$product->delete_product($productId);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
				<?php
                if(isset($delProduct)){
                    echo $delProduct;
                }
                ?>   
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Image</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$showproduct=$product->listProduct();
					if($showproduct){
						$i=0;
						while($result=$showproduct->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX" style="vertical-align: middle;">
					<td style="vertical-align: middle;"><?php echo $i; ?></td>
					<td style="vertical-align: middle;"><?php echo $result['product_Name']; ?></td>
					<td style="vertical-align: middle;"><?php echo $result['price']; ?></td>
					<td style="vertical-align: middle;"><img src="upload/<?php echo $result['image']; ?>" alt="" width="150px"></td>
					<td style="vertical-align: middle;"><?php echo $result['cate_Name']; ?></td>
					<td style="vertical-align: middle;"><?php echo $result['brand_Name']; ?></td>
					<td style="vertical-align: middle;"><?php echo $fm->textShorten($result['product_desc'],50); ?></td>
					<td style="vertical-align: middle;"><?php 
						if($result['type'] == 0){
							echo "Non-Featured";
						}else{
							echo "Featured";
						}
					?></td>
					<td style="vertical-align: middle;"><a href="productedit.php?id=<?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Are you want to delete?')"
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
