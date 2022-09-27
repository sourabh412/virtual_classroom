<div class="container bg-light">
<form action="Classroom.php" method="post">
    <div class="mb-3">
        <label for="heading" class="form-label">Enter the announcement heading here :</label>
        <input type="text" name="heading" id="heading" required class="form-control">
    </div>
    <div class="mb-3">
        <label for="announcements" class="form-label">Enter the announcement here :</label>
        <textarea class="form-control" name="announcements" id="announcements" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="link" class="form-label">Enter the link here(if available) :</label>
        <input type="url" name="link" id="link" maxlength="100" class="form-control">
    </div>
    <input type="submit" value="Announce" name="announce" class="btn btn-primary">
</form>
</div>