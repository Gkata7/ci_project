<br>
<h2><?= $title; ?></h2>
<br>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
  <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  <div class="form-group" id="creating">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title']; ?>">
  </div>
  <div class="form-group" id="creating">
    <label>Body</label>
    <textarea rows="8" cols="50" class="form-control" name="body" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
