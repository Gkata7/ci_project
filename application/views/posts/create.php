<br>
<h2><?= $title; ?></h2>
<br>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
  <div class="form-group" id="creating">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group" id="creating">
    <label>Body</label>
    <textarea rows="8" cols="50" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>
  <div class="form-group">
    <label>Upload Image</label><br>
    <input type="file" name="userfile" size="10">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
