<br>
<h2><?= $title ?></h2>
<br>
<?php foreach($posts as $post) : ?>
  <br>
  <h3><?php echo $post['title']; ?></h3>
  <br>
  <div class="row">
    <div class="col-md-4">
      <img class ="img-thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
    </div>
    <div class="col-md-8">
      <small class ="post-date">Posted On: <?php echo $post['created_at']; ?></small><br>
      <?php echo word_limiter($post['body'], 70); ?>
      <br><br>
      <p><a class="btn btn-info" href="<?php echo site_url('/posts/' .$post['slug']); ?>">Read More</a></p>
    </div>
  </div>
<?php endforeach; ?>
