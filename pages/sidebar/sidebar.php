<div class="sidebar">
        <ul class="list_sidebar">
        <?php
          $sql_petlist = "SELECT * FROM tbl_petlist ORDER BY id DESC";
          $query_petlist = mysqli_query($mysqli,$sql_petlist) or die( mysqli_error($mysqli));
          while($row = mysqli_fetch_array($query_petlist)){
        ?>
          <li>
            <a href="index.php?tocontrol=petlist&id=<?php echo $row['id']?>"><?php echo $row['namepetlist']?></a>
          </li>
        <?php } 
        
        ?>
        </ul>
      </div>