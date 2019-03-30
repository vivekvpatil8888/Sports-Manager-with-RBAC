<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Your seasons</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/seasons/add" class="btn btn-primary pull-right">
        <i class="fa fa-plus"></i> Add season
      </a>
    </div>
  </div>

  <table class="table">
  <thead>
    <tr>
      <th scope="col">Year</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data['seasons'] as $season) : ?>
    <tr>
      <td><?php echo $season->year ?></td>
      <td><?php echo $season->description ?></td>
      <td>
        <a href="<?php echo URLROOT; ?>/seasons/edit/<?php echo $season->id; ?>" class="btn btn-primary">
            <i class="fa fa-pencil"></i> Edit
        </a>
           <form class="pull-right" action="<?php echo URLROOT; ?>/seasons/delete/<?php echo $season->id; ?>" method="post">
            <input type="submit" value="Delete" class="btn btn-danger">
           </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>