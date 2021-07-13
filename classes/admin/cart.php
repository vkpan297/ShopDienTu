<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
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
        public function get_inbox_cart(){
            $query="SELECT * from tbl_order order by date_order ";
            $result=$this->db->select($query);
            return $result;
        }
        public function shifted($id,$time,$price){
            $id=mysqli_real_escape_string($this->db->link,$id);
            $time=mysqli_real_escape_string($this->db->link,$time);
            $price=mysqli_real_escape_string($this->db->link,$price);

            $query="UPDATE tbl_order set 
                        status='1'
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

        public function del_shift($id,$time,$price){
            $id=mysqli_real_escape_string($this->db->link,$id);
            $time=mysqli_real_escape_string($this->db->link,$time);
            $price=mysqli_real_escape_string($this->db->link,$price);

            $query="DELETE from tbl_order where id='$id' and price='$price' and date_order='$time'";
            $result=$this->db->delete($query);
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