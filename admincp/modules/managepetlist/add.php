<!-- Modal -->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Pet List</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form or input fields for data entry -->
        <!-- Example: -->
        <form action="modules/managepetlist/handle.php" method="POST">
          <!-- Your input fields here -->
          <div class="mb-3">
            <label for="" class="form-label">Name Pet List</label>
            <input type="text" class="form-control" id="namepetlist" name="namepetlist" placeholder="Text Here" required>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Note</label>
            <input type="text" class="form-control" id="note" name="note" placeholder="Text Here">
          </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addpetlist" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
