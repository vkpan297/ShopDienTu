<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/brand.php' ?>
<?php include '../classes/admin/category.php' ?>
<?php include '../classes/admin/product.php' ?>
<?php include '../classes/admin/slider.php' ?>
<?php include_once '../helpers/format.php' ?>

<?php
$slider=new slider();
$fm=new Format();
if(isset($_GET['id'])){
    $sliderId=$_GET['id'];
	$delSlider=$slider->delete_slider($sliderId);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách slider</h2>
        <div class="block">  
				<?php
                if(isset($delSlider)){
                    echo $delSlider;
                }
                ?>   
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Slider Name</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$showSlider=$slider->listSlider();
					if($showSlider){
						$i=0;
						while($result=$showSlider->fetch_assoc()){
							$i++;
				?>
				<tr class="odd gradeX" style="vertical-align: middle;">
					<td style="vertical-align: middle;"><?php echo $i; ?></td>
					<td style="vertical-align: middle;"><?php echo $result['slider_Name']; ?></td>
					<td style="vertical-align: middle;"><img src="upload/<?php echo $result['image']; ?> " width="150px" alt="" /></td>
					<td style="vertical-align: middle;"><?php 
						if($result['type'] == 0){
							echo "Off";
						}else{
							echo "On";
						}
					?></td>
					<td style="vertical-align: middle;"><a href="slideredit.php?id=<?php echo $result['id'] ?>">Edit</a> || <a onclick="return confirm('Are you want to delete?')"
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
