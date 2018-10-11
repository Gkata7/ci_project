<br>
<h2><?php echo $post['title']; ?></h2>
<br>

<small class ="post-date">Posted On: <?php echo $post['created_at']; ?></small>
<img class="image-photo" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
<div class="post-body">
  <?php echo $post['body']; ?>
</div>

<?php if($this->session->userdata('user_id') == $post['user_id']) : ?>
  <a class="btn btn-primary float-left" href ="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
  <?php echo form_open('/posts/delete/'.$post['id']); ?>
    <input type="submit" value="Delete" class="btn btn-danger">
  </form>
  <hr>
<?php endif; ?>
