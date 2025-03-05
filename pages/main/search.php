<?php 
    if(isset($_POST['search'])){
        $key_word = $_POST['key_word'];
    }
    $sql_pro = "SELECT * FROM tbl_pet, tbl_petlist WHERE tbl_pet.id_petlist = tbl_petlist.id AND tbl_pet.petname LIKE '%" . $key_word . "%' ";
    $query_pro = mysqli_query($mysqli,$sql_pro);

?>
<h3>SEARCH KEYWORDS: <?php echo $_POST['key_word']?></h3>
          <ul class="product_list">
            <?php
              while($row = mysqli_fetch_array($query_pro)){
            ?>
            <li>
              <a href="index.php?tocontrol=pet&id=<?php echo $row['stt']?>" class="no-default">
                <img src="admincp/modules/managepet/uploads/<?php echo $row['img']?>">
                <p class="pet_name">PetName: <?php echo $row['petname']?></p>
                <p class="price">Price: <?php echo number_format($row['price'],0,',','.').'$'?></p>
                <p style="text-align: center; color:#9A7151">Petlist: <?php echo $row['namepetlist']?></p>
              </a>      
            </li>
            <?php
              }
            ?>
          </ul>