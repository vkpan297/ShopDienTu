<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>

<?php
    class customer
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
        }
        public function show_customer($id){
            $query="SELECT * from tbl_customer where id='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        
    }
     
?>