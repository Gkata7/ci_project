<?php echo form_open('users/login'); ?>
<div class="row">
  <div class="col-md-4 offset-md-4">
    <h2 class ="text-center"><?= $title; ?></h2>
    <br>
    <div class="form-group">
      <input type="text" name="username" class="form-control" placeholder="Username">
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="Password">
    </div>
      <button type="submit" class="btn btn-success btn-block">Login</button>
  </div>
</div>
<?php echo form_close(); ?>
