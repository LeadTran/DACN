<?php
    $sql_listed = "SELECT * FROM tbl_cart, tbl_dangky WHERE tbl_cart.id_khachhang = tbl_dangky.id_dangky ORDER BY tbl_cart.id_cart DESC";
    $query_listed = mysqli_query($mysqli,$sql_listed);
?>
<link href="css/styleadmincp.css" rel="stylesheet" type="text/css" />


<div class="container">
    <table class="table table-hover text-center table-striped" style="vertical-align: middle;">
        <thead class="table-dark">
            <tr>
                <th scope="col">
                    Id
                </th>
                <th scope="col">
                    Code Orders
                </th>
                <th scope="col">
                    Customer
                </th>
                <th scope="col">
                    Address
                </th>
                <th scope="col">
                    Email
                </th>
                <th scope="col">
                    Phone Number
                </th>
                <th scope="col">
                    Status
                </th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while($row = mysqli_fetch_array($query_listed)){
                $i++;
            ?>
            <tr>
                <td>
                    <?php echo $i ?>
                </td>
                <td>
                    <?php echo $row['code_cart'] ?>
                </td>
                <td>
                    <?php echo $row['username'] ?>
                </td>
                <td>
                    <?php echo $row['diachi'] ?>
                </td>
                <td>
                    <?php echo $row['email'] ?>
                </td>
                <td>
                    <?php echo $row['dienthoai'] ?>
                </td>
                <td>
                    <?php if($row['cart_status']==1){
                        echo '<a href="modules/ordermanagerment/handle.php?code='.$row['code_cart'].'">New</a>';
                    }
                    else{
                        echo 'Have Seen';}?>
                </td>
                <td>
                    <a href="index.php?action=orderdetails&query=details&code=<?php echo $row['code_cart'] ?>" class="btn btn-outline-danger">Details</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>         
    </table>
</div>

