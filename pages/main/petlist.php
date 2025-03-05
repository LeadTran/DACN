<?php 
  $sql_pro = "SELECT * FROM tbl_pet WHERE tbl_pet.id_petlist='$_GET[id]' ORDER BY stt DESC";
  $query_pro = mysqli_query($mysqli,$sql_pro);

  $sql_cate = "SELECT * FROM tbl_petlist WHERE tbl_petlist.id='$_GET[id]' LIMIT 1";
  $query_cate = mysqli_query($mysqli,$sql_cate);

  $row_title = mysqli_fetch_array($query_cate);

?>
<h3>Pet List : <?php echo $row_title['namepetlist']?></h3>
        <ul class="product_list">
          <?php
            while($row_pro = mysqli_fetch_array($query_pro)){
          ?>
            <li>
              <a href="index.php?tocontrol=pet&id=<?php echo $row_pro['stt']?>" class="no-default">
                <img src="admincp/modules/managepet/uploads/<?php echo $row_pro['img']?>">
                <p class="pet_name">PetName: <?php echo $row_pro['petname']?></p>
                <p class="price">Price: <?php echo number_format($row_pro['price']).'$'?></p>
              </a>
            </li>
          <?php
            }
          ?>
        </ul>