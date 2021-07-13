<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/brand.php' ?>
<?php
$brand=new brand();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $brand_Name=$_POST['brand_Name'];

    $insertBrand=$brand->insert_brand($brand_Name);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm thương hiệu mới</h2>
                
               <div class="block copyblock"> 
                <?php
                if(isset($insertBrand)){
                    echo $insertBrand;
                }
                ?>
                 <form action="brandadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brand_Name" placeholder="Nhập tên thương hiệu sản phẩm ..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>