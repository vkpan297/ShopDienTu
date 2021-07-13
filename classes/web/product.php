<?php
     include_once 'lib/database.php';
     include_once 'helpers/format.php';
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
        public function getTypeProduct(){
            $sp_tungtrang=4;
            if(!isset($_GET['index'])){
                $trang=1;
            }else{
                $trang=$_GET['index'];
            }
            $tung_trang=($trang-1)*$sp_tungtrang;
            $query="SELECT * from tbl_product where type='1' limit $tung_trang,$sp_tungtrang";
            $result=$this->db->select($query);
            return $result;
        }
        
        public function getNewProduct(){
            $sp_tungtrang=4;
            if(!isset($_GET['trang'])){
                $trang=1;
            }else{
                $trang=$_GET['trang'];
            }
            $tung_trang=($trang-1)*$sp_tungtrang;
            $query="SELECT * from tbl_product order by id desc limit $tung_trang,$sp_tungtrang";
            $result=$this->db->select($query);
            return $result;
        }

        public function get_all_product(){
            $query="SELECT * from tbl_product";
            $result=$this->db->select($query);
            return $result;
        }

        public function get_all_type_product(){
            $query="SELECT * from tbl_product where type='1'" ;
            $result=$this->db->select($query);
            return $result;
        }

        public function getDetailProduct($id){
            $query="SELECT tbl_product.*,tbl_brand.brand_Name,tbl_category.cate_Name 
            
            FROM tbl_product inner join tbl_brand on tbl_product.brand_id=tbl_brand.id 

            inner join tbl_category on tbl_product.category_id=tbl_category.id
            
            where tbl_product.id='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        public function getLatestDell(){
            $query="SELECT * from tbl_product where brand_id=6 order by id desc limit 1";
            $result=$this->db->select($query);
            return $result;
        }
        public function getLatestSamsung(){
            $query="SELECT * from tbl_product where brand_id=5 order by id desc limit 1";
            $result=$this->db->select($query);
            return $result;
        }
        public function getLatestOppo(){
            $query="SELECT * from tbl_product where brand_id=2 order by id desc limit 1";
            $result=$this->db->select($query);
            return $result;
        }
        public function getLatestHuawei(){
            $query="SELECT * from tbl_product where brand_id=3 order by id desc limit 1";
            $result=$this->db->select($query);
            return $result;
        }

        public function insertCompare($product_Id,$customerId){

            $product_Id=mysqli_real_escape_string($this->db->link,$product_Id);
            $customerId=mysqli_real_escape_string($this->db->link,$customerId);

            $query="SELECT * from tbl_product where id='$product_Id'";
            $result=$this->db->select($query)->fetch_assoc();

            $image=$result["image"];
            $product_Name=$result["product_Name"];
            $price=$result["price"];

            $checkCompare="SELECT * from tbl_compare where product_Id='$product_Id' and customer_id='$customerId'";
            $result_check=$this->db->select($checkCompare);
            if($result_check){
                $message="Product already added to Compare";
                return $message;
            }else{
                $query_compare="INSERT into tbl_compare(product_Id,product_Name,customer_id,price,image) values('$product_Id','$product_Name','$customerId','$price','$image')";
                $result_compare=$this->db->insert($query_compare);
                if($result_compare){
                    $alert="<span class='error'>Added Compare Product Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Added Compare Product Not Success</span>";
                    return $alert;
                }
            }
        }
        public function list_compare($customerId){
            $query="SELECT * from tbl_compare where customer_id='$customerId'";
            $result=$this->db->select($query);
            return $result;
        }

        public function delete_compare($compareId){
            $query="DELETE from tbl_compare where id='$compareId'";
            $result=$this->db->delete($query);
            return $result;
        }

        public function insertWishList($product_Id,$customerId){
            $product_Id=mysqli_real_escape_string($this->db->link,$product_Id);
            $customerId=mysqli_real_escape_string($this->db->link,$customerId);

            $query="SELECT * from tbl_product where id='$product_Id'";
            $result=$this->db->select($query)->fetch_assoc();

            $image=$result["image"];
            $product_Name=$result["product_Name"];
            $price=$result["price"];

            $checkCompare="SELECT * from tbl_wishlist where product_Id='$product_Id' and customer_id='$customerId'";
            $result_check=$this->db->select($checkCompare);
            if($result_check){
                $message="Product already added to WishList";
                return $message;
            }else{
                $query_compare="INSERT into tbl_wishlist(product_Id,product_Name,customer_id,price,image) values('$product_Id','$product_Name','$customerId','$price','$image')";
                $result_compare=$this->db->insert($query_compare);
                if($result_compare){
                    $alert="<span class='error'>Added WishList Product Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Added WishList Product Not Success</span>";
                    return $alert;
                }
            }
        }

        public function delete_wishlist($wishListId){
            $query="DELETE from tbl_wishlist where id='$wishListId'";
            $result=$this->db->delete($query);
            return $result;
        }

        public function show_wishList($customerId){
            $query="SELECT * from tbl_wishlist where customer_id='$customerId'";
            $result=$this->db->select($query);
            return $result;
        }
        public function getSlider(){
            $query="SELECT * from tbl_slider";
            $result=$this->db->select($query);
            return $result;
        }

        public function search_product($tukhoa){
			$tukhoa = $this->fm->validation($tukhoa);
			$query = "SELECT * FROM tbl_product WHERE product_Name LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;

		}
        
    }
     
?>