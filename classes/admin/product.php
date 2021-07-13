<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>

<?php
    class product
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
        }
        public function insert_product($data,$files){

            $product_Name=mysqli_real_escape_string($this->db->link,$data['product_Name']);
            $category=mysqli_real_escape_string($this->db->link,$data['category']);
            $brand=mysqli_real_escape_string($this->db->link,$data['brand']);
            $product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $price=mysqli_real_escape_string($this->db->link,$data['price']);
            $type=mysqli_real_escape_string($this->db->link,$data['type']);
            
            //kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited=array('jpg','jpeg','png','gif');
            $file_name=$_FILES['image']['name'];
            $file_size=$_FILES['image']['size'];
            $file_temp=$_FILES['image']['tmp_name'];

            $div=explode('.',$file_name);
            $file_ext=strtolower(end($div));
            $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image="upload/".$unique_image;

            if($product_Name=="" || $category=="" || $brand=="" || $product_desc=="" || $price=="" || $type=="" || $file_name==""){
                $alert="<span class='error'>Fields must be not empty</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query="INSERT into tbl_product(product_Name,category_id,brand_id,product_desc,type,price,image) values('$product_Name','$category','$brand','$product_desc','$type','$price','$unique_image')";
                $result=$this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Insert Product Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Insert Product Not Success</span>";
                    return $alert;
                }
            }
        }
        public function listProduct(){
            $query="SELECT tbl_product.*,tbl_brand.brand_Name,tbl_category.cate_Name 
            
            FROM tbl_product inner join tbl_brand on tbl_product.brand_id=tbl_brand.id 

            inner join tbl_category on tbl_product.category_id=tbl_category.id
            
            order by id desc";
            $result=$this->db->select($query);
            return $result;
        }
        public function getProductById($id){
            $query="select * from tbl_product where id='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        public function update_product($data,$files,$id){
            $product_Name=mysqli_real_escape_string($this->db->link,$data['product_Name']);
            $category=mysqli_real_escape_string($this->db->link,$data['category']);
            $brand=mysqli_real_escape_string($this->db->link,$data['brand']);
            $product_desc=mysqli_real_escape_string($this->db->link,$data['product_desc']);
            $price=mysqli_real_escape_string($this->db->link,$data['price']);
            $type=mysqli_real_escape_string($this->db->link,$data['type']);
            
            //kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited=array('jpg','jpeg','png','gif','webp');
            $file_name=$_FILES['image']['name'];
            $file_size=$_FILES['image']['size'];
            $file_temp=$_FILES['image']['tmp_name'];

            $div=explode('.',$file_name);
            $file_ext=strtolower(end($div));
            $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image="upload/".$unique_image;

            if($product_Name=="" || $category=="" || $brand=="" || $product_desc=="" || $price=="" || $type==""){
                $alert="<span class='error'>Fields must be not empty</span>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //Nếu chọn ảnh
                    if(in_array($file_ext,$permited) === false){
                        $alert = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                        return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query="UPDATE tbl_product set 
                        product_Name='$product_Name',
                        category_id='$category',
                        brand_id='$brand',
                        product_desc='$product_desc',
                        price='$price', 
                        image='$unique_image',
                        type='$type' 
                        where id='$id'";
                }else{
                    //Nếu k chọn ảnh
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query="UPDATE tbl_product set 
                        product_Name='$product_Name',
                        category_id='$category',
                        brand_id='$brand',
                        product_desc='$product_desc',
                        price='$price',
                        type='$type' 
                        where id='$id'";
                }
                $result=$this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Update Product Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Update Product Not Success</span>";
                    return $alert;
                }
            }
            
        }

        public function delete_product($id){
            $query="delete from tbl_product where id='$id'";
            $result=$this->db->delete($query);
            if($result){
                $alert="<span class='success'>Delete Product Successfully</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Delete Product Not Success</span>";
                return $alert;
            }
        }
    }
     
?>