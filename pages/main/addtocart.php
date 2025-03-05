<?php
    session_start();
    include('../../admincp/config/config.php');


    // Thay đổi logic tăng số lượng sản phẩm trong giỏ hàng
    if (isset($_GET['up'])) {
        $id = $_GET['up'];
        foreach ($_SESSION['cart'] as &$cart_item) {
            if ($cart_item['id'] == $id) {
                if ($cart_item['numerical'] < 9) {
                    $cart_item['numerical']++;
                }
            }
        }
        header('Location:../../index.php?tocontrol=cart');
        exit();
    }

    // Thay đổi logic giảm số lượng sản phẩm trong giỏ hàng
    if (isset($_GET['down'])) {
        $id = $_GET['down'];
        foreach ($_SESSION['cart'] as &$cart_item) {
            if ($cart_item['id'] == $id) {
                if ($cart_item['numerical'] > 1) {
                    $cart_item['numerical']--;
                }
            }
        }
        header('Location:../../index.php?tocontrol=cart');
        exit();
    }


    //delete
    if(isset($_SESSION['cart'])&& $_GET['delete']){
        $id = $_GET['delete'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['id']!=$id){
                $pet[] = array('petname' =>$cart_item['petname'],'id'=>$cart_item['id'], 'numerical' =>$numerical['numerical'],'price'=> $cart_item['price'],'img'=>$cart_item['img']);
            }
        $_SESSION['cart'] = $pet;
        header('Location:../../index.php?tocontrol=cart');
        }
    }

    //Reset
    if(isset($_GET['reset'])&&$_GET['reset']==1){
        unset($_SESSION['cart']);
        header('Location:../../index.php?tocontrol=cart');
    }

    //Add
    if(isset($_POST['addtocart'])){
        $id = $_GET['idpet'];
        $numerical = 1;
        $sql = "SELECT * FROM tbl_pet WHERE stt = '".$id."' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_pet = array(array('petname' =>$row['petname'],'id'=>$id, 'numerical' =>$numerical,'price'=> $row['price'],'img'=>$row['img']));
            //Kiem tra session cart ton tai
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['id']==$id){
                        //neu du lieu trung
                        $pet[] = array('petname' =>$cart_item['petname'],'id'=>$cart_item['id'], 'numerical' =>$numerical+1,'price'=> $cart_item['price'],'img'=>$cart_item['img']);
                        $found = true;
                    }else{
                        //neu du lieu khong trung
                        $pet[] = array('petname' =>$cart_item['petname'],'id'=>$cart_item['id'], 'numerical' =>$cart_item['numerical'],'price'=> $cart_item['price'],'img'=>$cart_item['img']);
                    }
                }
                if($found == false){
                    //lien ket du lieu new_pet voi pet
                    $_SESSION['cart']=array_merge($pet,$new_pet);
                }else{
                    $_SESSION['cart']=$pet;
                }
            }else{
                $_SESSION['cart'] = $new_pet;
            }
        }
        header('Location:../../index.php?tocontrol=cart');
    }
?>