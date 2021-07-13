<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/category.php' ?>
<?php
$cat=new category();
if(!isset($_GET['id']) && $_GET['id'] != null){
    echo "<script>window.location='catlist.php'</script>";
}else{
    $catId=$_GET['id'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $cate_Name=$_POST['cate_Name'];
    $updateCat=$cat->update_category($cate_Name,$catId);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
                
               <div class="block copyblock"> 
                <?php
                if(isset($updateCat)){
                    echo $updateCat;
                }
                ?>
                <?php 
                    $get_cate_name=$cat->getCateById($catId);
                    if($get_cate_name){
                        while($result = $get_cate_name->fetch_assoc()){
                    
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="cate_Name" value="<?php echo $result['cate_Name'] ?>" class="medium" />
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