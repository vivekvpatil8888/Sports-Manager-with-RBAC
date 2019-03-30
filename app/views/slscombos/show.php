<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h2>Your Sport-League-Season Combinations: </h2>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/slscombos/add" class="btn btn-primary pull-right">
        <i class="fa fa-plus"></i> Add slscombo
      </a>
    </div>
  </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">sport</th>
      <th scope="col">league</th>
      <th scope="col">season</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data['slscombos'] as $slscombo) : ?>
    <tr>
      <td><?php echo $slscombo->sport ?></td>
      <td><?php echo $slscombo->league ?></td>
      <td><?php echo $slscombo->season ?></td>
      <td>
        <a href="<?php echo URLROOT; ?>/slscombos/edit/<?php echo $slscombo->id; ?>" class="btn btn-primary">
            <i class="fa fa-pencil"></i> Edit
        </a>
           <form class="pull-right" action="<?php echo URLROOT; ?>/slscombos/delete/<?php echo $slscombo->id; ?>" method="post">
            <input type="submit" value="Delete" class="btn btn-danger">
           </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>