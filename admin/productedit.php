<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/brand.php' ?>
<?php include '../classes/admin/category.php' ?>
<?php include '../classes/admin/product.php' ?>

<?php
$product=new product();
if(!isset($_GET['id']) && $_GET['id'] != null){
    echo "<script>window.location='productlist.php'</script>";
}else{
    $productId=$_GET['id'];
}
if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['submit'])){
    $updateProduct=$product->update_product($_POST,$_FILES,$productId);
}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Cập nhật sản phẩm</h2>
        <div class="block">   
        <?php
        if(isset($updateProduct)){
            echo $updateProduct;
        }
        ?>        

        <?php
        $get_product_by_id=$product->getProductById($productId);
        if($get_product_by_id){
            while($result_product = $get_product_by_id->fetch_assoc()){
        ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="product_Name" value="<?php echo $result_product['product_Name'] ?>" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
                
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="product_desc">
                            <?php echo $result_product['product_desc']; ?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" value="<?php echo $result_product['price']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_product['image']; ?>" alt="" width="150px"><br>
                        <input type="file" name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if($result_product['type']==0){
                            ?>
                            <option value="1">Featured</option>
                            <option selected value="0">Non-Featured</option>
                            <?php
                            }else{
                            ?>
                            <option selected value="1">Featured</option>
                            <option value="0">Non-Featured</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>------Select Category------</option>
                            <?php
                                $cat=new category();
                                $catList=$cat->listCat();
                                if($catList){
                                    while($result = $catList->fetch_assoc()){
                                
                            ?>
                            <option 
                            <?php
                            if($result['id'] == $result_product['category_id']){  echo 'selected';   }
                            ?>
                            value="<?php echo $result['id'] ?>"><?php echo $result['cate_Name'] ?></option>

                            <?php
                                }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>------Select Brand------</option>
                            <?php
                                $brand=new brand();
                                $brandList=$brand->listBrand();
                                if($brandList){
                                    while($result = $brandList->fetch_assoc()){
                                
                            ?>
                            <option 
                            <?php
                            if($result['id'] == $result_product['brand_id']){  echo 'selected';   }
                            ?>
                            value="<?php echo $result['id'] ?>"><?php echo $result['brand_Name'] ?></option>
                            <?php
                                }
                                }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td></td>
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


