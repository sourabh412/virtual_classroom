
<div class="container bg-light">
<form action="Fassignments.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="heading" class="form-label">Enter the assignment heading here :</label>
        <input type="text" name="heading" id="heading" required class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Enter the description here :</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="attachments" class="form-label">Upload the attachments here(if available) in .pdf :</label>
        <input type="file" name="attachments" id="attachments" class="form-control">
    </div>
    <div class="mb-3">
        <label or="ouput-text" class="form-label">Enter the expected output here :</label>
        <textarea class="form-control" name="ouput-text" id="ouput-text" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="output-img" class="form-label">Upload the output image(if available) :</label>
        <input type="url" name="output-img" id="output-img"class="form-control">
    </div>
    <div class="mb-3">
        <label for="due" class="form-label">Enter the due time here :</label>
        <input type="datetime-local" name="due" id="due"class="form-control" required>
    </div>
    <input type="submit" name="postassign" value="Post Assignment" class="btn btn-primary">
</form>
</div>