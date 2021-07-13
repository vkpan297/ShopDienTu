<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/admin/slider.php' ?>
<?php
$slider=new slider();
if(!isset($_GET['id']) && $_GET['id'] != null){
    echo "<script>window.location='sliderlist.php'</script>";
}else{
    $sliderId=$_GET['id'];
}
if($_SERVER['REQUEST_METHOD'] === 'POST'  &&  isset($_POST['submit'])){
    $updateSlider=$slider->update_slider($_POST,$_FILES,$sliderId);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Slider</h2>
    <div class="block"> 
        <?php
        if(isset($updateSlider)){
            echo $updateSlider;
        }
        ?>     
        <?php
        $get_slider_by_id=$slider->getSliderById($sliderId);
        if($get_slider_by_id){
            while($result_slider = $get_slider_by_id->fetch_assoc()){
        ?>        
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="slider_Name" value="<?php echo $result_slider['slider_Name'] ?>" placeholder="Enter Slider Title..." class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="upload/<?php echo $result_slider['image']; ?>" alt="" width="150px"><br>
                        <input type="file" name="image"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Type</label>
                    </td>
                    <td>
                    <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if($result_slider['type']==0){
                            ?>
                            <option value="1">On</option>
                            <option selected value="0">Off</option>
                            <?php
                            }else{
                            ?>
                            <option selected value="1">On</option>
                            <option value="0">Off</option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
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