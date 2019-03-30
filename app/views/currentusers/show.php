<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Your Users</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/currentusers/add" class="btn btn-primary pull-right">
        <i class="fa fa-plus"></i> Add Users
      </a>
    </div>
  </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">UserName</th>
      <th scope="col">Role</th>
      <th scope="col">password</th>
      <th scope="col">team</th>
      <th scope="col">league</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data['users'] as $user) : ?>
    <tr>
      <td><?php echo $user->username ?></td>
      <td><?php echo $user->role ?></td>
      <td><?php echo $user->password ?></td>
      <td><?php echo $user->team ?></td>
      <td><?php echo $user->league ?></td>
      <td>
        <a href="<?php echo URLROOT; ?>/currentusers/edit/<?php echo $user->username; ?>" class="btn btn-primary">
            <i class="fa fa-pencil"></i> Edit
        </a>
           <form class="pull-right" action="<?php echo URLROOT; ?>/currentusers/delete/<?php echo $user->username; ?>" method="post">
            <input type="submit" value="Delete" class="btn btn-danger">
           </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>