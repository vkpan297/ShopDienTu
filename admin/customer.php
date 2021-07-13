<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../helpers/format.php';?>
<?php include '../classes/admin/category.php' ?>
<?php include_once '../classes/admin/customer.php';?>
<?php
$cs=new customer();

if(!isset($_GET['customerId']) && $_GET['customerId'] == null){
    echo "<script>window.location='inbox.php'</script>";
}else{
    $customerId=$_GET['customerId'];
}

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $cate_Name=$_POST['cate_Name'];
//     $updateCat=$cat->update_category($cate_Name,$catId);
// }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Detail Customer</h2>
                
               <div class="block copyblock"> 
                <?php 
                    $get_customer=$cs->show_customer($customerId);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){
                    
                ?>
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" name="cate_Name" value="<?php echo $result['name'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" name="cate_Name" value="<?php echo $result['address'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" name="cate_Name" value="<?php echo $result['country'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" name="cate_Name" value="<?php echo $result['city'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" name="cate_Name" value="<?php echo $result['zipcode'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" name="cate_Name" value="<?php echo $result['phone'] ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" name="cate_Name" value="<?php echo $result['email'] ?>" class="medium" />
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