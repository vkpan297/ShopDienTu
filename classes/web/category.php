<?php
     include_once 'lib/database.php';
     include_once 'helpers/format.php';
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
        public function listCat(){
            $query="select * from tbl_category";
            $result=$this->db->select($query);
            return $result;
        }
        public function get_product_by_cat($id){
            $query="select * from tbl_product where category_id='$id' limit 8";
            $result=$this->db->select($query);
            return $result;
        }
        public function get_name_by_cat($id){
            $query="select * from tbl_category where id='$id' ";
            $result=$this->db->select($query);
            return $result;
        }
        
    }
     
?>