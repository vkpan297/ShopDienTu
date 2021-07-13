<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
?>

<?php
    class cart
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
        }
        public function addCart($id,$quantity){
            $quantity=$this->fm->validation($quantity);

            $id=mysqli_real_escape_string($this->db->link,$id);
            $quantity=mysqli_real_escape_string($this->db->link,$quantity);
            $sId=session_id();

            $query="SELECT * from tbl_product where id='$id'";
            $result=$this->db->select($query)->fetch_assoc();

            $image=$result["image"];
            $product_Name=$result["product_Name"];
            $price=$result["price"];

            $checkCart="SELECT * from tbl_cart where sId='$sId' and product_Id='$id'";
            $result_check=$this->db->select($checkCart);
            if($result_check){
                $message="Product already added";
                return $message;
            }else{
                $query_cart="INSERT into tbl_cart(product_Id,sId,product_Name,price,quanity,image) values('$id','$sId','$product_Name','$price','$quantity','$image')";
                $result_cart=$this->db->insert($query_cart);
                if($result_cart){
                    header('Location:cart.php');
                }else{
                    header('Location:404.php');
                }
            }
        }
        public function getCart(){
            $sId=session_id();
            $query="SELECT * from tbl_cart where sId='$sId'";
            $result=$this->db->select($query);
            return $result;
        }

        public function update_quantity_cart($cartId,$quantity){
            $id=mysqli_real_escape_string($this->db->link,$cartId);
            $quantity=mysqli_real_escape_string($this->db->link,$quantity);

            $query="UPDATE tbl_cart set 
                        quanity='$quantity'
                        where id='$id'";
            $result=$this->db->update($query);
            if($result){
                header('Location:cart.php');
            }else{
                $alert="<span class='error'>Update Product Quantity Not Success</span>";
                return $alert;
            }
        }

        public function delete_cart($cartId){
            $cartId=mysqli_real_escape_string($this->db->link,$cartId);
            $query="DELETE from tbl_cart where id='$cartId'";
            $result=$this->db->delete($query);
            if($result){
                header('Location:cart.php');
            }else{
                $alert="<span class='error'>Delete Cart Not Success</span>";
                return $alert;
            }
        }
        public function check_cart(){
            $sId=session_id();
            $query="SELECT * from tbl_cart where sId='$sId'";
            $result=$this->db->select($query);
            return $result;
        }

        public function del_all_data_cart(){
            $sId=session_id();
            $query="DELETE  from tbl_cart where sId='$sId'";
            $result=$this->db->select($query);
            return $result;
        }
        public function insert_order($customerId){
            $sId=session_id();
            $query="SELECT * from tbl_cart where sId='$sId'";
            $get_product=$this->db->select($query);

            if($get_product){
                while($result=$get_product->fetch_assoc()){
                    $productId=$result['product_Id'];
                    $productName=$result['product_Name'];
                    $productQuanity=$result['quanity'];
                    $productPrice=$result['price']*$productQuanity;
                    $productImage=$result['image'];
                    $customerId=$customerId;

                    $query_order="INSERT into tbl_order(product_Id,product_Name,customer_id,quantity,price,image) values('$productId','$productName','$customerId','$productQuanity','$productPrice','$productImage')";
                    $result_order=$this->db->insert($query_order);
                }
            }
        }

        public function get_cart_order($customerId){
            $query="SELECT * from tbl_order where customer_id='$customerId'";
            $result=$this->db->select($query);
            return $result;
        }
        public function check_order(){
            $customerId=Session::get("customer_id");
            $query="SELECT * from tbl_order where customer_id='$customerId'";
            $result=$this->db->select($query);
            return $result;
        }

        public function shifted_confirm($id,$time,$price){
            $id=mysqli_real_escape_string($this->db->link,$id);
            $time=mysqli_real_escape_string($this->db->link,$time);
            $price=mysqli_real_escape_string($this->db->link,$price);

            $query="UPDATE tbl_order set 
                        status='2'
                        where id='$id' and 	price='$price' and date_order='$time'";
            $result=$this->db->update($query);
            if($result){
                $alert="<span class='error'>Update Order Successfully</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Update Order Not Success</span>";
                return $alert;
            }
        }
        
    }
     
?>