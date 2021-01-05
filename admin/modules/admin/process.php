<?php 
    require_once '../../../db/connect.php';
    if(isset($_POST['fix'])){
        $id = $_GET['id'];
        $id_admin = $_POST["id_admin"];
        $admin = $_POST["admin"];
        $username = $_POST["username"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $gender = $_POST["gender"];
        $sql = "UPDATE admin SET ten_admin = '$admin',tai_khoan ='$username',sdt = '$phone',email='$email',dia_chi = '$address',gioi_tinh = '$gender' where ma_admin = $id";
        mysqli_query($con,$sql);
        mysqli_close($con);
        header('location:../../index.php?manage=admin&action=list');
    }else{
        $_SESSION["error"] = "Cập nhật thất bại";
    }   
?>