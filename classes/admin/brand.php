<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>

<?php
    class brand
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
        }
        public function insert_brand($brand_Name){
            $brand_Name=$this->fm->validation($brand_Name);

            $brand_Name=mysqli_real_escape_string($this->db->link,$brand_Name);

            if(empty($brand_Name)){
                $alert="Brand Name must be not empty";
                return $alert;
            }else{
                $query="Insert into tbl_brand(brand_Name) values('$brand_Name')";
                $result=$this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Insert Brand Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Insert Brand Not Success</span>";
                    return $alert;
                }
            }
        }
        public function listBrand(){
            $query="select * from tbl_brand order by id desc";
            $result=$this->db->select($query);
            return $result;
        }
        public function getBrandById($id){
            $query="select * from tbl_brand where id='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        public function update_brand($brand_Name,$id){
            $brand_Name=$this->fm->validation($brand_Name);

            $brand_Name=mysqli_real_escape_string($this->db->link,$brand_Name);
            $id=mysqli_real_escape_string($this->db->link,$id);

            if(empty($brand_Name)){
                $alert="Brand Name must be not empty";
                return $alert;
            }else{
                $query="update tbl_brand set brand_Name='$brand_Name' where id='$id'";
                $result=$this->db->update($query);
                if($result){
                    $alert="<span class='success'>Update Brand Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Update Brand Not Success</span>";
                    return $alert;
                }
            }
        }

        public function delete_brand($id){
            $query="delete from tbl_brand where id='$id'";
            $result=$this->db->delete($query);
            if($result){
                $alert="<span class='success'>Delete Brand Successfully</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Delete Brand Not Success</span>";
                return $alert;
            }
        }
    }
     
?>