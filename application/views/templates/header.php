<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Blog Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="#">Blog Project</a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="/posts">Blog</a></li>
          <li class="nav-item"><a class="nav-link" href="/posts/create">Create Post</a></li>
        </ul>
        <ul class="navbar-nav pull-right">
        <?php if(!$this->session->userdata('logged_in')) : ?>
          <li class="nav-item active"><a class="nav-link" href="/users/login">Login</a></li>
          <li class="nav-item active"><a class="nav-link" href="/users/register">Register</a></li>
        <?php endif; ?>
        <?php if($this->session->userdata('logged_in')) : ?>
          <li class="nav-item active"><a class="nav-link" href="/users/logout">Logout</a></li>
        <?php endif; ?>
        </ul>
      </div>
    </nav>

    <div class="container">
      <br>
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('user_login')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_login').'</p>'; ?>
      <?php endif; ?>
      <?php if($this->session->flashdata('user_logout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logout').'</p>'; ?>
      <?php endif; ?>
