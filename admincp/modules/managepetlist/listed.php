<?php
    $sql_listed = "SELECT * FROM tbl_petlist ORDER BY id DESC";
    $query_listed = mysqli_query($mysqli,$sql_listed);


   
?>
<link href="css/styleadmincp.css" rel="stylesheet" type="text/css" />





<div class="container">
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add" style="margin-top: 10px;">Add</button>
    <?php include('add.php'); ?>


    <table class="table table-hover text-center table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">
                    NO
                </th>
                <th scope="col">
                    Name Pet List
                </th>
                <th scope="col">
                    Note
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
                    <?php echo $row['namepetlist'] ?>
                </td>
                <td>
                    <?php echo $row['note'] ?>
                </td>
                <td>
                    <a href="modules/managepetlist/handle.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-danger">Delete</a> | <a href="?action=managepetlist&query=edit&id=<?php echo $row['id'] ?>" role="button" class="btn btn-outline-primary">Edit</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>         
    </table>
</div>

