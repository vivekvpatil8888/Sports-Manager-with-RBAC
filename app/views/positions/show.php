<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Positions</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/positions/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Position
      </a>
    </div>
  </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data['positions'] as $position) : ?>

    <tr>
      <th scope="row"><?php echo $position->id ?></th>
      <td><?php echo $position->name ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>