<?php
    $sql_edit = "SELECT * FROM tbl_pet WHERE stt='$_GET[id]' LIMIT 1";
    $query_edit = mysqli_query($mysqli,$sql_edit);
?>
<?php
  while($row = mysqli_fetch_array($query_edit)){
?>
<form action="modules/managepet/handle.php?id=<?php echo $row['stt']?>" method="POST" enctype="multipart/form-data">
  <div class="row g-3">
    <div class="col-md-6">
      <label for="petid" class="form-label">Pet Id</label>
      <input type="text" class="form-control" id="petid" value="<?php echo $row['petid'] ?>" name="petid" required>
    </div>
    <div class="col-md-6">
      <label for="petname" class="form-label">Pet Name</label>
      <input type="text" class="form-control" id="petname" value="<?php echo $row['petname'] ?>" name="petname" required>
    </div>
    <div class="col-md-6">
      <label for="price" class="form-label">Price</label>
      <input type="text" class="form-control" id="price" value="<?php echo $row['price'] ?>" name="price" required>
    </div>
    <div class="col-md-6">
      <label for="numerical" class="form-label">Numerical</label>
      <input type="text" class="form-control" id="numerical" value="<?php echo $row['numerical'] ?>" name="numerical" required>
    </div>
    <div class="col-md-6">
      <label for="img" class="form-label">Default file input</label>
      <input class="form-control" type="file" id="img" name="img">
      <img src="modules/managepet/uploads/<?php echo $row['img']?>" width="100px">
    </div>
    <div class="col-md-6">
      <label for="petstatus" class="form-label">Status</label>
      <select class="form-select" aria-label="Default select example" name="petstatus" id="petstatus" required>
        <option selected>Status</option>
        <?php if($row['status'] == 1): ?>
          <option value="1" selected>Available</option>
          <option value="2">Non-Available</option>
        <?php else: ?>
          <option value="1">Available</option>
          <option value="2" selected>Non-Available</option>
        <?php endif; ?>
      </select>
    </div>
    <div class="col-md-6">
      <label for="petlist" class="form-label">Pet List</label>
      <select class="form-select" name="petlist" id="petlist" required>
        <option selected>Pet List</option>
        <?php
        $sql_petlist = "SELECT * FROM tbl_petlist ORDER BY id DESC";
        $query_petlist = mysqli_query($mysqli,$sql_petlist);
        while($row_petlist = mysqli_fetch_array($query_petlist)){
          if($row_petlist['id_petlist'] == $row_petlist['id_petlist']){
        ?>             
        <option selected value="<?php echo $row_petlist['id']?>"><?php echo $row_petlist['namepetlist'] ?></option>
        <?php } else { ?>
        <option value="<?php echo $row_petlist['id']?>"><?php echo $row_petlist['namepetlist'] ?></option>
        <?php } } ?>
      </select>
    </div>
  </div>
  <div class="mt-3">
    <button type="submit" name="editpet" class="btn btn-outline-primary">Save</button>
    <a href="index.php?action=managepet&query=add" role="button" class="btn btn-outline-primary" onclick="confirmDelete()">Back</a>
  </div>
</form>

<?php
    }
?>
