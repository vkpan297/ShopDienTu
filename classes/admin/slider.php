<?php
    include_once '../lib/database.php';
    include_once '../helpers/format.php';
?>

<?php
    class slider
    {
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db=new Database();
            $this->fm=new Format();
        }

        public function insert_slider($data,$files){
            $slider_Name=mysqli_real_escape_string($this->db->link,$data['slider_Name']);
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

            if($slider_Name=="" || $type=="" || $file_name==""){
                $alert="<span class='error'>Fields must be not empty</span>";
                return $alert;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query="INSERT into tbl_slider(slider_Name,image,type) values('$slider_Name','$unique_image','$type')";
                $result=$this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Insert Slider Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Insert Slider Not Success</span>";
                    return $alert;
                }
            }
        }

        public function delete_slider($sliderId){
            $query="delete from tbl_slider where id='$sliderId'";
            $result=$this->db->delete($query);
            if($result){
                $alert="<span class='success'>Delete Slider Successfully</span>";
                return $alert;
            }else{
                $alert="<span class='error'>Delete Slider Not Success</span>";
                return $alert;
            }
        }

        public function listSlider(){
            $query="SELECT * from tbl_slider order by id desc";
            $result=$this->db->select($query);
            return $result;
        }

        public function update_slider($data,$files,$id){
            $slider_Name=mysqli_real_escape_string($this->db->link,$data['slider_Name']);
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

            if($slider_Name=="" || $type==""){
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
                    $query="UPDATE tbl_slider set 
                        slider_Name='$slider_Name', 
                        image='$unique_image',
                        type='$type' 
                        where id='$id'";
                }else{
                    //Nếu k chọn ảnh
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query="UPDATE tbl_product set 
                        product_Name='$slider_Name',
                        type='$type'
                        where id='$id'";
                }
                $result=$this->db->insert($query);
                if($result){
                    $alert="<span class='success'>Update Slider Successfully</span>";
                    return $alert;
                }else{
                    $alert="<span class='error'>Update Slider Not Success</span>";
                    return $alert;
                }
            }
        }
        public function getSliderById($sliderId){
            $query="SELECT * from tbl_slider where id='$sliderId'";
            $result=$this->db->select($query);
            return $result;
        }
    }
     
?>