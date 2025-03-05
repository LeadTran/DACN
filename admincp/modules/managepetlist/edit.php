<?php
    $sql_edit = "SELECT * FROM tbl_petlist WHERE id='$_GET[id]' LIMIT 1";
    $query_edit = mysqli_query($mysqli,$sql_edit);
?>
<form action="modules/managepetlist/handle.php?id=<?php echo $_GET['id']?>" method="POST">
  <?php
    while($row = mysqli_fetch_array($query_edit)){
  ?>
  <div class="mb-3">
    <label for="" class="form-label">Name Pet List</label>
    <input type="text" class="form-control" id="namepetlist" value="<?php echo $row['namepetlist'] ?>" name="namepetlist" required>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Note</label>
    <input type="text" class="form-control" id="note" name="note" value="<?php echo $row['note'] ?>">
  </div>
  <button type="submit" name="editpetlist" class="btn btn-outline-primary">Save</button>
  <a href="index.php?action=managepetlist&query=add" role="button" class="btn btn-outline-primary">Back</a>
  <?php
    }
  ?>
</form>
