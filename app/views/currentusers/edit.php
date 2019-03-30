<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/currentusers/show" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add User</h2>
    <form action="<?php echo URLROOT; ?>/currentusers/edit" method="post">
      <div class="form-group">
        <label for="username">User Name : <sup>*</sup></label>
        <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
        <span class="invalid-feedback"><?php echo $data['username_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="role">Role : <sup>*</sup></label>
        <input type="text" name="role" class="form-control form-control-lg <?php echo (!empty($data['role_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['role']; ?>">
        <span class="invalid-feedback"><?php echo $data['role_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="password">password : <sup>*</sup></label>
        <input type="text" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="team">team : <sup>*</sup></label>
        <input type="text" name="team" class="form-control form-control-lg <?php echo (!empty($data['team_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['team']; ?>">
        <span class="invalid-feedback"><?php echo $data['team_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="league">league : <sup>*</sup></label>
        <input type="text" name="league" class="form-control form-control-lg <?php echo (!empty($data['league_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['league']; ?>">
        <span class="invalid-feedback"><?php echo $data['league_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>