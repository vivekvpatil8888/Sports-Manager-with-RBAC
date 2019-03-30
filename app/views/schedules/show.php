<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Schedules</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Post
      </a>
    </div>
  </div>
  <?php foreach($data['schedules'] as $schedule) : ?>
    <div class="card card-body mb-3">
      <h1 class="card-title"><?php echo $schedule->scheduled; ?></h1>
      <h1 class="card-title"><?php echo $schedule->completed; ?></h1>
    </div>
  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>