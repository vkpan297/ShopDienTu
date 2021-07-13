<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/category.php' ?>
<?php
$cat=new category();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cate_Name=$_POST['cate_Name'];

    $insertCat=$cat->insert_category($cate_Name);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục mới</h2>
                
               <div class="block copyblock"> 
                <?php
                if(isset($insertCat)){
                    echo $insertCat;
                }
                ?>
                 <form action="catadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cate_Name" placeholder="Nhập tên danh mục sản phẩm ..." class="medium" />
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