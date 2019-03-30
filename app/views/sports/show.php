<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Your sports</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/sports/add" class="btn btn-primary pull-right">
        <i class="fa fa-plus"></i> Add sport
      </a>
    </div>
  </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data['sports'] as $sport) : ?>
    <tr>
      <td><?php echo $sport->name ?></td>
      <td>
        <a href="<?php echo URLROOT; ?>/sports/edit/<?php echo $sport->id; ?>" class="btn btn-primary">
            <i class="fa fa-pencil"></i> Edit
        </a>
           <form class="pull-right" action="<?php echo URLROOT; ?>/sports/delete/<?php echo $sport->id; ?>" method="post">
            <input type="submit" value="Delete" class="btn btn-danger">
           </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>