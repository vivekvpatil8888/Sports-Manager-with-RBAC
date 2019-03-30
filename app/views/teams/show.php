<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Teams</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/teams/add" class="btn btn-primary pull-right">
        <i class="fa fa-plus"></i> Add Team
      </a>
    </div>
  </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">name</th>
      <th scope="col">mascot</th>
      <th scope="col">sport</th>
      <th scope="col">league</th>
      <th scope="col">season</th>
      <th scope="col">picture</th>
      <th scope="col">homecolor</th>
      <th scope="col">awaycolor</th>
      <th scope="col">maxplayers</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data['teams'] as $team) : ?>
    <tr>
      <td><?php echo $team->name ?></td>
      <td><?php echo $team->mascot ?></td>
      <td><?php echo $team->sport ?></td>
      <td><?php echo $team->league ?></td>
      <td><?php echo $team->season ?></td>
      <td><?php echo $team->picture ?></td>
      <td><?php echo $team->homecolor ?></td>
      <td><?php echo $team->awaycolor ?></td>
      <td><?php echo $team->maxplayers ?></td>
      
      <td>
        <a href="<?php echo URLROOT; ?>/teams/edit/<?php echo $team->id; ?>" class="btn btn-primary">
            <i class="fa fa-pencil"></i> Edit
        </a>
           <form class="pull-right" action="<?php echo URLROOT; ?>/teams/delete/<?php echo $team->id; ?>" method="post">
            <input type="submit" value="Delete" class="btn btn-danger">
           </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>