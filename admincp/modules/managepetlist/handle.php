<?php
    include('../../config/config.php');
    $namepetlist = $_POST['namepetlist'];
    $note = $_POST['note'];
    if(isset($_POST['addpetlist'])){
        $sql_add = "INSERT INTO tbl_petlist(namepetlist,note) VALUES ('".$namepetlist."','".$note."')";
        mysqli_query($mysqli,$sql_add);
        header('Location:../../index.php?action=managepetlist&query=add');
    }elseif(isset($_POST['editpetlist'])){

        $sql_edit = "UPDATE tbl_petlist SET namepetlist='".$namepetlist."',note='".$note."' WHERE id ='$_GET[id]'";
        mysqli_query($mysqli,$sql_edit);
        header('Location:../../index.php?action=managepetlist&query=add');
    }else
    {
        $id = $_GET['id'];
        $sql_delete = "DELETE FROM tbl_petlist WHERE id='".$id."'";
        mysqli_query($mysqli,$sql_delete);
        header('Location:../../index.php?action=managepetlist&query=add');
    }
?>