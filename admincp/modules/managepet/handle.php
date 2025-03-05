<?php
    include('../../config/config.php');
    $petid = $_POST['petid'];
    $petname = $_POST['petname'];
    $price = $_POST['price'];
    $numerical = $_POST['numerical'];
    //img handled
    $img = $_FILES['img']['name'];
    $img_tmp = $_FILES['img']['tmp_name'];
    $img_time = time().'_'.$img;
    $petstatus = $_POST['petstatus'];
    $petlist = $_POST['petlist'];

    
    if (isset($_POST['addpet'])) {

        $petname = $_POST['petname'];

        $check_query = "SELECT * FROM tbl_pet WHERE petname = '$petname'";
        $check_result = mysqli_query($mysqli, $check_query);
    
        if (mysqli_num_rows($check_result) > 0) {
            
            echo "Tên '$petname' đã tồn tại!";
        } else {
            $sql_add = "INSERT INTO tbl_pet(petid, petname, price, numerical, img, petstatus, id_petlist) VALUES ('$petid', '$petname', '$price', '$numerical', '$img', '$petstatus', '$petlist')";
            $result = mysqli_query($mysqli, $sql_add);
            if (!$result) {
                echo "Error: " . mysqli_error($mysqli);
            } else {
                $_SESSION['tentrung'] = mysqli_insert_id($mysqli);
                move_uploaded_file($img_tmp, 'uploads/' . $img);
                header('Location:../../index.php?action=managepet&query=add');
                exit(); 
            }
        }
    }
    















    /* if(isset($_POST['addpet'])){
        $sql_add = "INSERT INTO tbl_pet(petid,petname,price,numerical,img,petstatus,id_petlist) VALUES ('".$petid."','".$petname."','".$price."','".$numerical."','".$img."','".$petstatus."','".$petlist."')";
        mysqli_query($mysqli,$sql_add);
        $_SESSION['tentrung'] = mysqli_insert_id($mysqli);
        if (!$result) {
            echo "Error: " . mysqli_error($mysqli);
        }
        move_uploaded_file($img_tmp,'uploads/'.$img);
        header('Location:../../index.php?action=managepet&query=add');
    } */elseif(isset($_POST['editpet'])){
        if($img!=''){
            move_uploaded_file($img_tmp,'uploads/'.$img_time);
           
            $sql_edit = "UPDATE tbl_pet SET petid='".$petid."',petname='".$petname."',price='".$price."',numerical='".$numerical."',img='".$img_time."',petstatus='".$petstatus."',id_petlist='".$petlist."' WHERE stt ='$_GET[id]'";
            $sql = "SELECT * FROM tbl_pet WHERE stt='$id' LIMIT 1";
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['img']);
            }
        }else{
            $sql_edit = "UPDATE tbl_pet SET petid='".$petid."',petname='".$petname."',price='".$price."',numerical='".$numerical."',petstatus='".$petstatus."',id_petlist='".$petlist."' WHERE stt ='$_GET[id]'";
        }
        mysqli_query($mysqli,$sql_edit);
        header('Location:../../index.php?action=managepet&query=add');
    }else
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_pet WHERE stt='$id' LIMIT 1";
        $query = mysqli_query($mysqli,$sql);
        while($row = mysqli_fetch_array($query)){
            unlink('uploads/'.$row['img']);
        }
        $sql_delete = "DELETE FROM tbl_pet WHERE stt='".$id."'";
        mysqli_query($mysqli,$sql_delete);
        header('Location:../../index.php?action=managepet&query=add');
    }
?>