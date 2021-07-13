<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>

<?php
    class category
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
        }
        public function insert_category($cate_Name){
            $cate_Name=$this->fm->validation($cate_Name);

            $cate_Name=mysqli_real_escape_string($this->db->link,$cate_Name);

            if(empty($cate_Name)){
                $alert="Category Name must be not empty";
                return $alert;
            }else{
                $query="Insert into tbl_category(cate_Name) values('$cate_Name')";
                $result=$this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Insert Category Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Insert Category Not Success</span>";
                    return $alert;
                }
            }
        }
        public function listCat(){
            $query="select * from tbl_category order by id desc";
            $result=$this->db->select($query);
            return $result;
        }
        public function getCateById($id){
            $query="select * from tbl_category where id='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        public function update_category($cate_Name,$id){
            $cate_Name=$this->fm->validation($cate_Name);

            $cate_Name=mysqli_real_escape_string($this->db->link,$cate_Name);
            $id=mysqli_real_escape_string($this->db->link,$id);

            if(empty($cate_Name)){
                $alert="Category Name must be not empty";
                return $alert;
            }else{
                $query="update tbl_category set cate_Name='$cate_Name' where id='$id'";
                $result=$this->db->update($query);
                if($result){
                    $alert="<span class='success'>Update Category Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Update Category Not Success</span>";
                    return $alert;
                }
            }
        }

        public function delete_category($id){
            $query="delete from tbl_category where id='$id'";
            $result=$this->db->delete($query);
            if($result){
                $alert="<span class='success'>Delete Category Successfully</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Delete Category Not Success</span>";
                return $alert;
            }
        }
    }
     
?>