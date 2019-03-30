<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Your Players</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/players/add" class="btn btn-primary pull-right">
        <i class="fa fa-plus"></i> Add Player
      </a>
    </div>
  </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Jersey Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data['players'] as $player) : ?>
    <tr>
      <td><?php echo $player->firstname ?></td>
      <td><?php echo $player->lastname ?></td>
      <td><?php echo $player->dateofbirth ?></td>
      <td><?php echo $player->jerseynumber ?></td>
      <td>
        <a href="<?php echo URLROOT; ?>/players/edit/<?php echo $player->id; ?>" class="btn btn-primary">
            <i class="fa fa-pencil"></i> Edit
        </a>
           <form class="pull-right" action="<?php echo URLROOT; ?>/players/delete/<?php echo $player->id; ?>" method="post">
            <input type="submit" value="Delete" class="btn btn-danger">
           </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>