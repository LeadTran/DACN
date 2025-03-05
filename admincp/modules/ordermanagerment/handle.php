<?php

    include('../../config/config.php');
    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $sql = "UPDATE tbl_cart SET cart_status=0 WHERE code_cart='".$code."'";
        $query = mysqli_query($mysqli,$sql);
        header('Location:../../index.php?action=ordermanagerment&query=list');
    }
?>