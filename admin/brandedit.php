<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/brand.php' ?>
<?php
$brand=new brand();
if(!isset($_GET['id']) && $_GET['id'] != null){
    echo "<script>window.location='brandlist.php'</script>";
}else{
    $brandId=$_GET['id'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $brand_Name=$_POST['brand_Name'];
    $updateBrand=$brand->update_brand($brand_Name,$brandId);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa thương hiệu</h2>
                
               <div class="block copyblock"> 
                <?php
                if(isset($updateBrand)){
                    echo $updateBrand;
                }
                ?>
                <?php 
                    $get_brand_name=$brand->getBrandById($brandId);
                    if($get_brand_name){
                        while($result = $get_brand_name->fetch_assoc()){
                    
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brand_Name" value="<?php echo $result['brand_Name'] ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>