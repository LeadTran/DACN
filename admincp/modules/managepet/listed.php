<?php
    $sql_listed = "SELECT * FROM tbl_pet, tbl_petlist WHERE tbl_pet.id_petlist=tbl_petlist.id  ORDER BY tbl_pet.id_petlist DESC";
    $query_listed = mysqli_query($mysqli,$sql_listed);
?>
<link href="css/styleadmincp.css" rel="stylesheet" type="text/css" />





<div class="container">
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add">Add</button>
    <?php include('add.php'); ?>
    <table class="table table-hover text-center table-striped" style="vertical-align: middle;">
        <thead class="table-dark">
            <tr>
                <th scope="col">
                    NO
                </th>
                <th scope="col">
                    Pet Id
                </th>
                <th scope="col">
                    Pet Name
                </th>
                <th scope="col">
                    Price
                </th>
                <th scope="col">
                    Numerical
                </th>
                <th scope="col">
                    Img
                </th>
                <th scope="col">
                    Pet Status
                </th>
                <th scope="col">
                    Pet List
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
                    <?php echo $row['petid'] ?>
                </td>
                <td>
                    <?php echo $row['petname'] ?>
                </td>
                <td>
                    <?php echo $row['price'] ?>
                </td>
                <td>
                    <?php echo $row['numerical'] ?>
                </td>
                <td>
                    <img src="modules/managepet/uploads/<?php echo $row['img']?>" width="100px" height="100px" style="object-fit: cover; object-position: center;">
                </td>
                <td>
                    <?php if($row['petstatus']==1){
                        echo 'Available';
                    } else{
                        echo 'Non-Available';
                    }?>
                </td>
                <td>
                    <?php echo $row['namepetlist'] ?>
                </td>
                <td>
                    <a type="button" href="modules/managepet/handle.php?id=<?php echo $row['stt'] ?>" class="btn btn-outline-danger">Delete</a> | <a href="?action=managepet&query=edit&id=<?php echo $row['stt'] ?>" role="button" class="btn btn-outline-primary">Edit</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>         
    </table>
</div>

