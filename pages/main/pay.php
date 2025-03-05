<?php
    session_start();
    include('../../admincp/config/config.php');

    /////////////////////////////////////////
    $id_khachhang = $_SESSION['id_username'];

    $code_order = rand(0,9999);
    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE ('".$id_khachhang."','".$code_order."',1)";
    $cart_query = mysqli_query($mysqli,$insert_cart);
    if($cart_query){
        //them gio hang chi tiet
        foreach($_SESSION['cart'] as $key => $value){
            $petid = $value['id'];
            $numerical = $value['numerical'];
            $insert_order_details = "INSERT INTO tbl_cart_details(petid,code_cart,numericalbought) VALUE ('".$petid."','".$code_order."','".$numerical."')";
            mysqli_query($mysqli,$insert_order_details);
        }
    }
    
    unset($_SESSION['cart']);
    header('Location:../../index.php?tocontrol=camon');
?>