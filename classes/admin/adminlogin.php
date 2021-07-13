<?php
    include '../lib/session.php';
    Session::checkLogin();
    include '../lib/database.php';
    include '../helpers/format.php';
?>

<?php
    class adminlogin
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
        }
        public function login_admin($admin_User,$admin_Pass){
            $adminUser=$this->fm->validation($admin_User);
            $adminPass=$this->fm->validation($admin_Pass);

            $adminUser=mysqli_real_escape_string($this->db->link,$admin_User);
            $adminPass=mysqli_real_escape_string($this->db->link,$admin_Pass);

            if(empty($adminPass) || empty($adminUser)){
                $alert="User and Password must be not empty";
                return $alert;
            }else{
                $query="Select * from tbl_admin where admin_User = '$adminUser' and admin_Pass = '$adminPass' limit 1";
                $result=$this->db->select($query);

                if($result != false){
                    $value=$result->fetch_assoc();
                    Session::set('adminlogin',true);
                    Session::set('adminId',$value['id']);
                    Session::set('User',$value['admin_User']);
                    Session::set('Name',$value['admin_Name']);

                    header('Location:index.php');
                }else{
                    $alert="User and Password not match";
                    return $alert;
                }
            }
        }
    }
     
?>