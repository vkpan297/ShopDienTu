<?php
    include_once 'lib/database.php';
    include_once 'helpers/format.php';
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
        public function insert_customer($data){
            $name=mysqli_real_escape_string($this->db->link,$data['name']);
            $city=mysqli_real_escape_string($this->db->link,$data['city']);
            $zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
            $email=mysqli_real_escape_string($this->db->link,$data['email']);
            $address=mysqli_real_escape_string($this->db->link,$data['address']);
            $country=mysqli_real_escape_string($this->db->link,$data['country']);
            $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
            $password=mysqli_real_escape_string($this->db->link,md5($data['password']));

            if($name=="" || $city=="" || $zipcode=="" || $email=="" || $address=="" || $country=="" || $phone=="" || $password==""){
                $alert="<span class='error'>Fields must be not empty</span>";
                return $alert;
            }else{
                $check_mail="SELECT * from tbl_customer where email='$email' limit 1";
                $result_check=$this->db->select($check_mail);
                if($result_check){
                    $alert="Email Already Existed ! Please Enter Another Email";
                    return $alert;
                }else{
                    $query="INSERT into tbl_customer(name,address,city,country,zipcode,phone,email,password) values('$name','$address','$city','$country','$zipcode','$phone','$email','$password')";
                    $result=$this->db->insert($query);
                    if($result){
                        $alert="<span class='success'>Insert Customer Successfully</span>";
                        return $alert;
                    }else{
                        $alert="<span class='error'>Insert Customer Not Success</span>";
                        return $alert;
                    }
                }
            }
        }

        public function login_customer($data){
            $email=mysqli_real_escape_string($this->db->link,$data['email']);
            $password=mysqli_real_escape_string($this->db->link,md5($data['password']));
            if($email=="" || $password==""){
                $alert="<span class='error'>Fields must be not empty</span>";
                return $alert;
            }else{
                $check_mail="SELECT * from tbl_customer where email='$email' and password='$password' limit 1";
                $result_check=$this->db->select($check_mail);
                if($result_check != false){
                    $value=$result_check->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['id']);
                    Session::set('customer_name',$value['name']);
                    header('Location:index.php');
                }else{
                    $alert="Email Or Password doesn't match";
                    return $alert;
                }
            }
        }

        public function show_customer($id){
            $query="SELECT * from tbl_customer where id='$id'";
            $result=$this->db->select($query);
            return $result;
        }
        public function update_customer($data,$id){
            $name=mysqli_real_escape_string($this->db->link,$data['name']);
            $city=mysqli_real_escape_string($this->db->link,$data['city']);
            $zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
            $email=mysqli_real_escape_string($this->db->link,$data['email']);
            $address=mysqli_real_escape_string($this->db->link,$data['address']);
            $phone=mysqli_real_escape_string($this->db->link,$data['phone']);

            if($name=="" || $city=="" || $zipcode=="" || $email=="" || $address=="" || $phone==""){
                $alert="<span class='error'>Fields must be not empty</span>";
                return $alert;
            }else{
                    $query="UPDATE tbl_customer set name='$name',city='$city',zipcode='$zipcode',email='$email',address='$address',phone='$phone' where id='$id'";
                    $result=$this->db->update($query);
                    if($result){
                        $alert="<span class='success'>Update Customer Successfully</span>";
                        return $alert;
                    }else{
                        $alert="<span class='error'>Update Customer Not Success</span>";
                        return $alert;
                    }
            }
        }
        
    }
     
?>