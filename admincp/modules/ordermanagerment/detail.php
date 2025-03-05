<?php
    $code = $_GET['code'];
    $sql_listed = "SELECT * FROM tbl_cart_details, tbl_pet WHERE tbl_cart_details.petid = tbl_pet.stt AND tbl_cart_details.code_cart = '".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
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
                    Pet Name
                </th>
                <th scope="col">
                    Numerical
                </th>
                <th scope="col">
                    Price
                </th>
                <th scope="col">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $total_payment = 0;
            while($row = mysqli_fetch_array($query_listed)){
                $i++;
                $total = $row['price']*$row['numericalbought'];
                $total_payment += $total;
            ?>
            <tr>
                <td>
                    <?php echo $i ?>
                </td>
                <td>
                    <?php echo $row['code_cart'] ?>
                </td>
                <td>
                    <?php echo $row['petname'] ?>
                </td>
                <td>
                    <?php echo $row['numericalbought'] ?>
                </td>
                <td>
                    <?php echo number_format($row['price'],0,',','.').'$' ?>
                </td>
                <td>
                    <?php echo number_format($total,0,',','.').'$' ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        <tr><td colspan="8">
            <p>Total Payment: <?php echo number_format($total_payment,0,',','.').'$'?></p>

        </td></tr>         
    </table>
</div>

