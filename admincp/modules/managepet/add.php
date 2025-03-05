<!-- Modal -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Pet</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form or input fields for data entry -->
        <!-- Example: -->
        <form action="modules/managepet/handle.php" method="POST" enctype="multipart/form-data">
          <!-- Your input fields here -->
          <div class="mb-3">
            <label for="" class="form-label">Pet Id</label>
            <input type="text" class="form-control" id="petid" name="petid" placeholder="Text Here" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Pet Name</label>

              <input type="text" class="form-control" id="petname" name="petname" placeholder="Text Here" required>

            
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Text Here" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Numerical</label>
            <input type="text" class="form-control" id="numerical" name="numerical" placeholder="Text Here" required>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Default file input</label>
            <input class="form-control" type="file" id="img" name="img" required>
          </div>
          <div class="mb-3">
            <select class="form-select" name="petstatus" id="petstatus" required>
              <option selected>Status</option>
              <option value="1">Available</option>
              <option value="2">Non-Available</option>
            </select>
          </div>
          <div class="mb-3">
            <select class="form-select" name="petlist" id="petlist" required>
              <option selected>Pet List</option>
              <?php
              $sql_petlist = "SELECT * FROM tbl_petlist ORDER BY id DESC";
              $query_petlist = mysqli_query($mysqli,$sql_petlist) or die( mysqli_error($mysqli));
              while($row_petlist = mysqli_fetch_array($query_petlist)){
              ?>             
              <option value="<?php echo $row_petlist['id']?>"><?php echo $row_petlist['namepetlist'] ?></option>
              <?php } ?>
            </select>
          </div>           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addpet" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
